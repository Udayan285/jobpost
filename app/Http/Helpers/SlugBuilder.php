<?php

namespace App\Http\Helpers;

trait SlugBuilder{
    function slugGenerator($request,$model){
         //Slug Generator
         $oldSlug = $model::where('slug', "LIKE", '%'.str($request->title)->slug().'%')->count();
         if($oldSlug > 0){
             
             $oldSlug += 1;
             $slug = str($request->title)->slug().'-'.$oldSlug;
 
         }else{
             $slug = str($request->title)->slug();
         }

         return $slug;
    }
}