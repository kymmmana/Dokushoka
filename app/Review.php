<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
     protected $fillable = ['title','content', 'user_id','book_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
     public function book()
    {
        return $this->belongsTo(Book::class);
    }
}
