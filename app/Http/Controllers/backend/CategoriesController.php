<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Helpers\SlugBuilder;
use App\Models\Category;
use Illuminate\Http\Request;

class CategoriesController extends Controller


{
    use SlugBuilder;

    function allCategories(){
        $categories = Category::latest()->paginate(5);

        return view('backend.categories.mainCategories' , compact('categories'));
    }

    function storeCategories(Request $request){
        
        $request->validate([
            "title" => 'required|string',
        ]);

        $category = new Category();
        $this->storeOrUpadte($category,$request);
        
        return back();
    }

    function editCategories($slug){
        $categories = Category::latest()->paginate(5);

        $editedCategory =Category::where('slug',$slug)->first();
       

        return view('backend.categories.mainCategories' , compact('categories','editedCategory'));
    }

    function updateCategories(Request $request, $slug){
          
        $request->validate([
            "title" => 'required|string',
        ]);

        $category = Category::where("slug",$slug)->first();
        $this->storeOrUpadte($category,$request);
        return redirect()->route("categories.all");
    }

    private function storeOrUpadte($category,$request){
        $category->title = $request->title;
        $slug = $this->slugGenerator($request,Category::class);
        $category->slug = $slug;
        $category->save();
    }

    function deleteCategories($slug){
        
        $category = Category::where("slug",$slug)->first();
        $category->delete();

        return redirect()->route("categories.all");


    }
}
