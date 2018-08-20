<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    protected $table='customers';
	protected $fillable = [
		'full_name', 'email', 'address', 'phone', 'note'
	];
	public function customer(){
    	return $this->hasMany('App\Bill','id_customer','id');
	}
}
