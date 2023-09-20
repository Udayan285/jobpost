<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Http\Helpers\SlugBuilder;
use App\Models\Bannermoto;
use Illuminate\Http\Request;

class BannerController extends Controller
{
    use SlugBuilder;

    function motoChange(){
        $banner_motos = Bannermoto::latest()->paginate(5);
        return view('backend.bannerMoto',compact('banner_motos'));
    }

    function motoCreate(Request $request){

        $request->validate([
            "title" => "required",
        ]);

        $bannerMoto = new Bannermoto();
        $bannerMoto->title = $request->title;
        $slug = $this->slugGenerator($request,Bannermoto::class);
        $bannerMoto->slug = $slug;

        $bannerMoto->save();
        return back();
        
    }

    function motoDelete($slug){
        $moto = Bannermoto::where('slug',$slug)->first();

        $moto->delete();
        return back();
    }

   
}
