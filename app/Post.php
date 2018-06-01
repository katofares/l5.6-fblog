<?php

namespace App;

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
     * Use Carbon on templates
     */
    protected $dates = ['created_at', 'updated_at'];

    /**
     * Date Accessor
     */
    public function getDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    /**
     * Date Scope
     * @param $query
     * @return
     */
    public function ScopeLatestFirst($query)
    {
        return $query->orderBy('created_at', 'desc');
    }

}
