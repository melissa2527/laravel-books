<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    public function books()
    {
        return $this->belongsTo(Book::class);
        return $this->belongsTo(\App\Models\Book::class); //same
        return $this->belongsTo('App\Models\Book'); //same
    }
}
