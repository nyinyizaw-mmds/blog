<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    protected $table = 'tags';

    protected $fillable = ['name'];

    public function posts()
    {
        return $this->belongsToMany('App\Post');
    }

     /**
     * Set the tags
     *
     */
    // public function setTagIdAttribute($value)
    // {
    //     $this->attributes['id'] = json_encode($value);
    // }
  
    /**
     * Get the tags
     *
     */
    // public function getTagNameAttribute($value)
    // {
    //     return $this->attributes['name'] = json_decode($value);
    // }
}
