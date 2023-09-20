<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JobPost extends Model
{
    use HasFactory;

    function user(){
        return $this->belongsTo(User::class);
    }

    function category(){
        return $this->belongsTo(Category::class);
    }
}
