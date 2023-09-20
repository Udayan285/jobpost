<?php

namespace App\Http\Controllers\frontend;

use App\Models\User;
use App\Models\JobPost;
use App\Models\Category;
use App\Models\Bannermoto;
use App\Models\Subcategory;
use Illuminate\Http\Request;
use App\Http\Helpers\MediaUpload;
use App\Http\Controllers\Controller;
use App\Models\frontend\Application;

class FrontendController extends Controller
{
    use MediaUpload;
    
    function homePage() {
        
        $alluser = User::all();
        $user = $alluser->where('id',1)->first();
        $banner_moto = Bannermoto::where('check', '1')->get();
        $categoriess = Category::all();

        $jobs = JobPost::where('check','1')->get();

        $categories = Category::where('status', '1')->with('subCategories')->get();
        $getSubCategories = Subcategory::where('status', '1')->get();
        
        return view('frontend.homeLayout',compact('categories','getSubCategories','banner_moto','categoriess','jobs','user','alluser'));
    }

    function jobListing($id) {

        $specificPost = JobPost::where('categori_job',$id )->where('check','1' )->get();

        //Mendatory foe all homePage
        $categori = Category::find($id);

        $categories = Category::where('status', '1')->with('subCategories')->get();
        $getSubCategories = Subcategory::where('status', '1')->get();

        return view('frontend.job_listing',compact('categories','getSubCategories','specificPost','categori'));
    }

    function applyJob($slug){
        $specificPostone = JobPost::where('slug',$slug)->get();

        // dd($specificPostone);

        //Mendatory foe all homePage
        $categories = Category::where('status', '1')->with('subCategories')->get();
        $getSubCategories = Subcategory::where('status', '1')->get();

        return view('frontend.applyjob',compact('categories','getSubCategories','specificPostone'));
    }

    function submitApply(Request $request){

        // dd($request->all());

        $request->validate([
            "name" => 'required|string|max:15',
            "Phone" => 'required|numeric',
            "email" => 'required|email',
            "Address" => 'required|string|max:70',
            "Experience" => 'required|string|max:15',
            "Expected_salary" => 'required|string|max:15',
            "message" => 'required|string',

        ]);

        // new application Object create here

        $application = new Application();

        //Application Store here
         $application->name = $request->name;
         $application->phone = $request->Phone;
         $application->email = $request->email;
         $application->address = $request->Address;
         $application->experience = $request->Experience;
         $application->salary = $request->Expected_salary;
         $application->cv = $request->message;
         $application->post_title = $request->job_title;
         // media upload here
         $profileImg = $this->unAuthsingleMideaUpload($request->applicant_img,"applications");
         $application->img_url = $profileImg["fileUrl"] ?? null;
         $application->img_name = $profileImg["fileName"] ?? null;

         $application->save();



        return back();
    }
}
