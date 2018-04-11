<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slide extends Model {
    protected $table = 'osc_slides';
    const CREATED_AT = 'created';
    const UPDATED_AT = 'modified';

}
