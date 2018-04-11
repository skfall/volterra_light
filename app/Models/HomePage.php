<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class HomePage extends Model {
    protected $table = 'osc_page_home';
    const CREATED_AT = null;
    const UPDATED_AT = 'modified';

    public function slides() {
    	return $this->hasMany('App\Models\Slide', 'slider_id', 'section_slider_id');
  	}
}
