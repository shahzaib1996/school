<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    //
    protected $table = 'student';
    public function parent() {
    	return $this->belongsTo('App\Parant');
    }

}
