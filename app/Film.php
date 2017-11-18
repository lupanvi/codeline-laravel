<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    protected $guarded = [];

    public function getRouteKeyName(){
        return 'slug';
    }

    public function genres(){
    	return $this->belongstoMany(Genre::class)->withTimestamps();
    }

    public function addComment($comment){
    	return $this->comments()->create($comment);
    }

    public function comments(){
    	return $this->hasMany(Comment::class, 'film_id');
    }

}
