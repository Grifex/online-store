<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Kalnoy\Nestedset\NodeTrait;

class Category extends Model
{
    use HasFactory, NodeTrait;

    protected $guarded = false;


    public function products()
    {
        return $this->hasMany(Product::class);
    }

    public function getPath()
    {
        return $this->ancestors()->pluck('slug')->implode('/') . '/' . $this->slug;
    }


    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    public function getRouteKeyName()
    {
        return 'slug';
    }

    public function getFullPathAttribute()
    {
        if ($this->parent) {
            return $this->parent->full_path.'/'.$this->slug;
        }

        return $this->slug;
    }

}
