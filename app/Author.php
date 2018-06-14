<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;
use Cocur\Slugify\Slugify;
use SluggableTrait;
use Cviebrock\EloquentSluggable\SluggableScopeHelpers;

class Author extends Model
{
	use Sluggable;
	protected $fillable = ['name'];
	public function sluggable()
	{
		// TODO: Implement sluggable() method.
		return [
			'slug' => [
				'source' => 'name'
			]
		];
	}
    protected $table='authors';
    public function product(){
    	return $this->hasMany('App\Product','id_author','id');
	}
}
