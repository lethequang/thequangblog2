<?php

namespace App;

use function foo\func;
use Illuminate\Database\Eloquent\Model;

class BillDetail extends Model
{
    protected $table='bill_detail';
	protected $fillable = [
		'id_bill', 'id_product', 'quantity', 'price'
	];
    public function product(){
    	return $this->belongsTo('App\Product','id_product','id');
	}
	public function bill(){
    	return $this->belongsTo('App\Bill','id_bill','id');
	}
}
