<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $appends = ['parent_name'];

	function children()
	{
		return $this->hasMany(Category::class, 'parent_id');
	}

	public function allChildren()
	{
	    return $this->hasMany(Category::class, 'parent_id')->with('children');
	}

	public function parent()
	{
		return $this->belongsTo(Category::class, 'parent_id');
	}
	
    function getParentNameAttribute()
    {
    	return $this->parent ? $this->parent->name : null;
    }
}
