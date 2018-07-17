<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class UserCard extends Model {
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
    protected $table = 'osc_user_cards';
    public $timestamps = false;

    public function user() {
    	return $this->belongsTo('App\Models\User', 'user_id', 'id');
  	}

  	public function country(){
  		return $this->hasOne('App\Models\User', 'country_id');
  	}
}
