<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class User extends Model {
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
  protected $table = 'osc_users';
  const CREATED_AT = 'created';
  const UPDATED_AT = 'modified';

  public function card() {
    return $this->hasOne('App\Models\UserCard', 'id');
  }
  
  public function comments() {
    return $this->hasMany('App\Models\Comment', 'user_id');
  }
}
