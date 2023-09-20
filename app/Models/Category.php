<?php

namespace App\Models;

use App\Models\Subcategory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    function subCategories(){
        
        return $this->hasMany(Subcategory::class);
    }

    function jobPosts(){
        
        return $this->hasMany(JobPost::class);
    }
}
// with('user')->get()
