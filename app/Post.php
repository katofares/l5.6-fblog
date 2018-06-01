<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    // Relation with users

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Image url Accessor
     */
    public function getImageUrlAttribute()
    {
        $imageUrl = "";
        if(!is_null($this->image)){
            $imagePath = public_path().'/img/'. $this->image;
            if(file_exists($imagePath)){
                $imageUrl = asset('/img/'. $this->image);
            }
            return $imageUrl;
        }
    }

    /**
     * Use Carbon for specific date field
     */
    protected $dates = ['published_at'];

    /**
     * Date Accessor
     */
    public function getDateAttribute()
    {
        return $this->published_at->diffForHumans();
    }

    /**
     * Date Scopes
     * @param $query
     * @return
     */
    public function ScopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

    public function scopePublished($query)
    {
        return $query->where('published_at',"<=", Carbon::now() );
    }

    /**
     *Use slug instead of id in the url(SEO friendly url)
     * This is because of Route Model Binding(refer to route and controller)
     */
    public function getRouteKeyName()
    {
        return 'slug';
    }






}
