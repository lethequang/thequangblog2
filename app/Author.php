<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Author extends Model
{
    protected $table='authors';
    public function product(){
    	return $this->hasMany('App\Product','id_author','id');
	}
}
