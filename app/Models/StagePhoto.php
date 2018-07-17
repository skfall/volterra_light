<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class StagePhoto extends Model {
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
    protected $table = 'osc_stage_photos';
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

    public function stage() {
        return $this->belongsTo('App\Models\Stage', 'stage_id', 'id');
    }
}
