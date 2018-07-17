<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Config extends Model {
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
	const UPDATED_AT = 'modified';
	protected $table = 'osc_settings';
}
