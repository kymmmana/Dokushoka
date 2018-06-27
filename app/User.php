<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password', 'bio',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    
    public function books()
    {
        return $this->belongsToMany(Book::class)->withPivot('type')->withTimestamps();
    }

    public function want_books()
    {
        return $this->books()->where('type', 'want');
    }

    public function want($itemId)
    {
        // Is the user already "want"?
        $exist = $this->is_wanting($itemId);

        if ($exist) {
            // do nothing
            return false;
        } else {
            // do "want"
            $this->books()->attach($itemId, ['type' => 'want']);
            return true;
        }
    }

    public function dont_want($itemId)
    {
        // Is the user already "want"?
        $exist = $this->is_wanting($itemId);

        if ($exist) {
            // remove "want"
            \DB::delete("DELETE FROM book_user WHERE user_id = ? AND book_id = ? AND type = 'want'", [\Auth::id(), $itemId]);
        } else {
            // do nothing
            return false;
        }
    }

    public function is_wanting($itemIdOrIsbn)
    {
        if (strlen($itemIdOrIsbn)<10) {
            $book_id_exists = $this->want_books()->where('book_id', $itemIdOrIsbn)->exists();
            return $book_id_exists;
        } else {
            $book_isbn_exists = $this->want_books()->where('isbn', $itemIdOrIsbn)->exists();
            return $book_isbn_exists;
        }
    }
    
    
      public function reviews()
    {
        return $this->hasMany(Review::class);
    }
}
