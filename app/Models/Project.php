<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Project extends Model {
    public function __get ($property){
        try{
            if(isset($this->{PREFIX.$property})){
                return $this->toArray()[PREFIX.$property];
            }else{
                return $this->toArray()[$property];
            }
        }catch(Exception $e){
            return null;
        }
    }
    protected $table = 'osc_projects';
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    public function type() {
    	return $this->hasOne('App\Models\ProjectTypes', 'id', 'type');
    }
      
    public function stages() {
    	return $this->hasMany('App\Models\Stage', 'project_id');
  	}
}
