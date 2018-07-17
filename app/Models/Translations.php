<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Translations extends Model {

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

    protected $table = 'osc_static_translations';
    public $timestamps = false;

}
