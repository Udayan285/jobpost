<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use App\Models\Bannermoto;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class StatusController extends Controller
{
    function changeCtaegoryStatus($slug){

        $Category= $this->statusToggler(Category::class,$slug,'category');
        return back();
 
    }

    function changeSubCtaegoryStatus($slug){
        $subcategory= $this->statusToggler(Subcategory::class,$slug,'subCategory');
        return back();
    }


    function motoStatus($slug){

        $recordToActivate = Bannermoto::where('slug', $slug)->get()->first();

        if ($recordToActivate) {
            // Activate the specific record
            $recordToActivate->update(['check' => 1]);
            Bannermoto::where('slug', '!=', $slug)->update(['check' => 0]);
            return back();
        } else {

            return back();
        
        }
    }

    private function statusToggler($model,$slug,$name){
        $name = $model::where('slug',$slug)->first();
  
        if($name->status == 0){
         $name->status = 1;
        }else{
         $name->status = 0;
        }
 
        $name->save();
        return back();
    }
}
