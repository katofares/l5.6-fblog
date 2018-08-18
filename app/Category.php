<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    // fillable date for create
    protected $fillable = ['name', 'slug'];

    // Relation with posts
    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    /**
     * Get the route key for the model.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
