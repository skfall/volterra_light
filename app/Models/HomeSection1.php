<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomeSection1 extends Model {
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
    protected $table = 'osc_page_home_1';
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';
}
