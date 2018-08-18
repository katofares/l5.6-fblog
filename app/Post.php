<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    /**
     * Soft delete
     */
    use SoftDeletes;

    protected $fillable = ['title', 'slug', 'body', 'excerpt', 'user_id', 'category_id', 'published_at', 'image'];

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
            $directory = config('myConfig.image.directory');
            $imagePath = public_path()."/{$directory}/". $this->image;
            if(file_exists($imagePath)){
                $imageUrl = asset("/{$directory}/". $this->image);
            }
            return $imageUrl;
        }
    }

    /**
     * Image url Accessor
     */
    public function getImageThumbAttribute()
    {
        $imageUrl = "";
        if(!is_null($this->image)){
            $directory = config('myConfig.image.directory');
            $extension = substr(strrchr($this->image, '.'), 1);
            $thumbnail = str_replace(".{$extension}", "_thumb.{$extension}", $this->image);
            $imagePath = public_path()."/{$directory}/". $thumbnail;
            if(file_exists($imagePath)){
                $imageUrl = asset("/{$directory}/". $thumbnail);
            }
            return $imageUrl;
        }
    }



    /**
     * Use Carbon for specific date field
     * activate soft delete
     */
    protected $dates = ['published_at', 'deleted_at'];

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
     * Format posts created_at date
     */

    public function formattedDate($showTime = false){
        $dateFormat = ($showTime == false) ?  'd/m/y' : 'd/m/y H:i:s';
        return $this->created_at->format($dateFormat);
    }


    /**
     * Relation with category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * @param $query
     * @return mixed
     * Popular posts
     */
    public function scopePopular($query)
    {
        return $query->orderBy('view_count', 'desc');
    }

    /**
     * Status Lable
     */
    public function showStatus()
    {
        if($this->published_at == null){
            return "<span class=\"badge badge-warning\">Draft</span>" ;
        } elseif ($this->published_at && $this->published_at > Carbon::now() ){
            return "<span class=\"badge badge-info\">Scheduled</span>" ;
        } else {
            return "<span class=\"badge badge-success\">Published</span>" ;
        }
    }
    
    /** 
     *published_at
     */
    public function setPublishedAtAttribute($value)
    {
        $this->attributes['published_at'] = $value ?: NULL;
    }
}
