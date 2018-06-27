<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
        protected $fillable = ['title', 'isbn','author','url', 'image_url','itemCaption'];

    public function users()
    {
        return $this->belongsToMany(User::class)->withPivot('type')->withTimestamps();
    }

    public function want_users()
    {
        return $this->users()->where('type', 'want');
    }
    
     public function reviews()
    {
        return $this->hasMany(Review::class)->paginate(20);
    }
    
}
