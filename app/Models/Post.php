<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Post extends Model
{
    //
    protected $dates = [
        'published_at', 
        //'created_at', 
        'deleted_at',
    ];
    
    protected $fillable = [
        //'category_id',
        'user_id',
        'last_user_id',
        #'slug',
        'title',
        'subtitle',
        'content',
        'description_img',
        'description_txt',
        'is_original',
        'is_draft',
        'published_at',
    ];

    public function user()
    {
        #, 'foreign_key'
        return $this->belongsTo('App\User');
    }

    public function category()
    {
        //return $this->belongsToMany('App\Models\Category', 'category_has_posts');
        return $this->belongsTo('App\Models\Category', 'category_has_posts');
    }

    public function tags()
    {
        return $this->belongsToMany('App\Models\Tag', 'post_has_tags');
    }

    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;
        
        if (!$this->exists) {
            $value = uniqid(Str::random(8));
            $this->setUniqueSlug($value, 0);
        }
    }

    public function setUniqueSlug($value, $extra)
    {
        $slug = Str::slug($value.'-'.$extra);

        if (static::where('slug', $slug)->exists()) {

            $this->setUniqueSlug($slug, (int) $extra + 1);
            return;
        }
        $this->attributes['slug'] = $slug;
    }

    public function url(Tag $tag = null)
    {
        $url = url('blog/' . $this->slug);
        if ($tag) {
            $url .= '?tag=' . urlencode($tag->tag);
        }
        return $url;
    }

}