<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Models\JobPost;
use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Helpers\MediaUpload;
use App\Http\Helpers\SlugBuilder;
use App\Http\Controllers\Controller;

use function PHPUnit\Framework\returnSelf;

class jobPostController extends Controller
{
    use SlugBuilder,MediaUpload;

    function createJobPost(){

        $categories = Category::all();
        return view('backend.jobPost.createPost',compact('categories'));
        
    }

    function storeJobPost(Request $request){

        //validation part here Job Post
        $request->validate([
            'title'=>'required',
            'ckeditor_details'=>'required|max:1000',
            'company_type'=>'required',
            'post_date'=>'required',
            'location'=>"required",
            'vacancy'=>'required',
            'job_nature'=>"required",
            'salary'=>"required",
            'application_date'=>"required",
            'company_name'=>"required",
            'email'=>"email",
            
        ]);

        //Job post store database here

        $post = new JobPost();
        $this->storeAndUpdate($request,$post);

        
        return back();
        
    }

    function previewJobPost($slug){
        $posts = JobPost::all();
        $getPost = $posts->where('slug',$slug)->first();
        $getPost::with(['user:id,name,profile_url,designation'])->get();
        return view('backend.jobPost.previewPost.previewPost',compact('getPost'));
    }

    function previewAllJobPost(){

        $jobPosts = JobPost::with(['user:id,name,profile_url,designation'])->get();

        return view('backend.jobPost.allJobPost',compact('jobPosts'));
    }

    function editJobPost($slug){
        $categories = Category::all();
        $specificPost = JobPost::where('slug',$slug)->first();
  
        return view("backend.jobPost.createPost",compact('categories','specificPost'));
    }

    function updateJobPost(Request $request, $slug) {
         //validation part here Job Post
         $request->validate([
            'title'=>'required',
            'ckeditor_details'=>'required|max:1000',
            'company_type'=>'required',
            'post_date'=>'required',
            'location'=>"required",
            'vacancy'=>'required',
            'job_nature'=>"required",
            'salary'=>"required",
            'application_date'=>"required",
            'company_name'=>"required",
            'email'=>"email",
            
        ]);
        
        $jobPost = JobPost::where('slug',$slug)->first();

        $this->storeAndUpdate($request,$jobPost);

        return redirect()->route('jobPost.preview.allPost');
    }


    private function storeAndUpdate($request,$model){
        $model->title=$request->title;
        $model->company_type=$request->company_type;
        $model->details=$request->ckeditor_details;
        $model->post_date=$request->post_date;
        $model->location=$request->location;
        $model->vacancy=$request->vacancy;
        $model->job_nature=$request->job_nature;
        $model->salary=$request->salary;
        $model->application_date=$request->application_date;
        $model->categori_job=$request->categori_job;
        $model->company_name=$request->company_name;
        $model->website_url=$request->website_url;
        $model->email=$request->email;
        $model->profile=$request->profile;
        // $model->check=$request->check;
        
        $slug= $this->slugGenerator($request,JobPost::class);
        
        $model->slug=$slug;

        $profileImg = $this->singleMideaUpload($request->post_img,"job-posts");
        $model->img_url = $profileImg["fileUrl"] ?? null;
        $model->post_img = $profileImg["fileName"] ?? null;
        $model->user_id = auth()->user()->id;
        $model->save();
    }

    function deleteJobPost($id) {

        $user = User::where('id',$id)->get();
        dd($user);
        return "hi";
    }

    function rejectJobPost($id){
        $post = JobPost::find($id);
        $post->delete();
        return back();
    }

    function acceptAdmin($id){
        $post = JobPost::find($id);

        if($post->check == false){
            $post->check = true;
            $post->save();
            return back();
        }else{
            $post->check = false;
            $post->save();
            return back();
        }
    }
}
