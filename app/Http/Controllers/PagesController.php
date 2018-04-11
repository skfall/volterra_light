<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Config;
use \App\Models\Project;
use \App\Models\Nav;
use \App\Models\HomePage;
use \App\Models\Service;

class PagesController extends AppController {
    
    public function __construct(){
        parent::__construct();
    }

    public function home(){
        $page_content = $this->core->getPage(HomePage::class);
        $services = $this->core->getServices([], 'home_services');
        $projects = $this->core->getProjects(['block' => 0], 0, 3);
        $viewmodel = compact('page_content', 'services', 'projects');
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
        $viewmodel = compact('project');
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
