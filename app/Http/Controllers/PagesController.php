<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use \App\Models\Project;
use \App\Models\Nav;
use \App\Models\HomeSection1;
use \App\Models\HomeSection2;
use \App\Models\HomeSection3;
use \App\Models\HomeSection4;
use \App\Models\Service;

class PagesController extends AppController {
    
    public function __construct(){
        parent::__construct();
    }

    public function home(){
        $entities = [
            '1' => HomeSection1::class,
            '2' => HomeSection2::class,
            '3' => HomeSection3::class,
            '4' => HomeSection4::class,
        ];
        $page_content = $this->core->getHomePageSections($entities);

        $section_1 = $page_content[0];
        $section_2 = $page_content[1];
        $section_3 = $page_content[2];
        $section_4 = $page_content[3];

        $services = $this->core->getServices([], 'home_services');
        $projects = $this->core->getProjects(['block' => 0], 0, 3);
        $viewmodel = compact('services', 'projects', 'section_1', 'section_2', 'section_3', 'section_4');
    	return view('pages.home', $viewmodel);
    }

    public function projects(){
        $pag = $this->helper->getPagination(Project::class, 4);
        $projects = $this->core->getProjects($pag->get('start'), $pag->get('per_page'));

        if($this->helper->check_block(Nav::class, $this->page)) return $this->return404();
        $viewmodel = [
            'projects' => $projects,
            'num_pages' => $pag->get('num_pages'),
            'cur_page' => $pag->get('cur_page')
        ];
        return view('pages.projects', $viewmodel);
    }

    public function project_item($project_id = 0){
        $project = $this->core->getProject($project_id);
        if (!$project) return $this->return404();
        $page = "project_item";

        $meta_array = array(
            'meta_title' => "Volterra | ".$this->prefix.$project->name,
            'meta_keys' => "",
            'meta_desc' => ""
        );
        $curr_nav = $this->nav->where('alias', 'projects')->first();
        if ($curr_nav) {
            $meta = $curr_nav->meta()->first();
            if ($meta){
                $meta = $meta->toArray();
                $meta_array = array(
                    'meta_title' => $meta[$this->prefix.'meta_title'],
                    'meta_keys' => $meta[$this->prefix.'meta_keys'],
                    'meta_desc' => $meta[$this->prefix.'meta_desc']
                );
            }
        }

        $stages = $project->stages()->where('block', '!=', '1')->orderBy('pos')->get();

        if($project->meta_title) $meta_array['meta_title'] = $this->prefix.$project->meta_title;
        if($project->meta_keys) $meta_array['meta_keys'] = $this->prefix.$project->meta_keys;
        if($project->meta_desc) $meta_array['meta_desc'] = $this->prefix.$project->meta_desc;
        $meta = collect($meta_array);

        $viewmodel = compact('project', 'meta', 'page', 'stages');
        return view('pages.project_item', $viewmodel);
    }

    public function invest(){
        return view('pages.invest');
    }

    public function contacts(){
    	return view('pages.contacts');
    }

    public function terms(){
        return view('pages.terms');
    }

    public function legal(){
        return view('pages.legal');
    }

}
