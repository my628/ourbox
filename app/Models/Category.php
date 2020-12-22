<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $fillable = [
        //'parent_id',
        'name',
        'path',
        'description_txt'
    ];

    public function post()
    {
        //return $this->belongsToMany('App\Models\Post', 'category_has_posts', 'category_id', 'post_id');
        return $this->hasMany('App\Models\Post', 'category_has_posts', 'category_id', 'post_id');
    }
}
