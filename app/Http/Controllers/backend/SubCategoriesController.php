<?php

namespace App\Http\Controllers\backend;

use App\Models\Category;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Helpers\SlugBuilder;
use App\Http\Controllers\Controller;

class SubCategoriesController extends Controller
{
    use SlugBuilder;
    
    function allSubCategories(){
        $subCategories = Subcategory::with(['category'])->latest()->paginate(5);
        $categories = Category::all();
        return view('backend.categories.subCategories',compact('categories','subCategories'));
    
    }

    function storeSubCategories(Request $request){

        //validation
        $request->validate([
            "title" => 'required|string',
        ]);


        //store subCategories here..
        $subCategory = new Subcategory();

        $subCategory->title = $request->title;
        $subCategory->category_id = $request->category_id;
        $slug = $this->slugGenerator($request,Subcategory::class);
        $subCategory->slug = $slug;
        $subCategory->save();
        
        return back();
    }

    function editSubCategories($slug){
        $subCategory = Subcategory::where('slug',$slug)->first();
        $subCategories = Subcategory::latest()->paginate(5);
        $categories = Category::all();
        return view('backend.categories.subCategories',compact('categories','subCategory','subCategories'));
    }

    function updateSubCategories(Request $request, $slug){

        $request->validate([
            "title" => 'required|string',
        ]);

        $subCategory = Subcategory::where('slug',$slug)->first();

        $subCategory->title = $request->title;
        $slug = $this->slugGenerator($request,Subcategory::class);
        $subCategory->slug = $slug;
        $subCategory->save();
  
        return back();
    }

    function deleteSubCategories($slug) {
        
        $subCategory = Subcategory::where('slug',$slug)->first();
        $subCategory->delete();

        return redirect()->route("subCategories.all");
    }
}
