<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    //
    protected $dates = ['deleted_at'];
    
    protected $fillable = [
        'tag',
        'title',
        'description_txt',
    ];

    public function posts()
    {
        return $this->belongsToMany('App\Models\Post', 'post_has_tags');
    }

    public static function addNeededTags(array $tags)
    {
        if (count($tags) == 0) {
            return;
        }

        $found = static::whereIn('tag', $tags)->get()->pluck('tag')->all();

        foreach (array_diff($tags, $found) as $tag) {

            static::create([
                'tag' => $tag,
                'title' => $tag,
                'description_txt' => '',
            ]);
        }
    }
}
