<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cocur\Slugify\Slugify;
use SluggableTrait;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Product extends Model
{
	use Sluggable;
	protected $fillable = ['title'];
	public function sluggable()
	{
		// TODO: Implement sluggable() method.
		return [
			'slug' => [
				'source' => 'title'
			]
		];
	}
    protected $table='products';
    public function category(){
    	return $this->belongsTo('App\Category','id_category','id');
    	return $this->belongsTo('App\Author','id_author','id');
	}
	public function bill_detail(){
    	return $this->hasMany('App\BillDetail','id_product','id');
	}
}
