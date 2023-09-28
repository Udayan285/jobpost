<?php

namespace App\Http\Controllers\backend;


use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Helpers\MediaUpload;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class ProfileMangeController extends Controller
{
    use MediaUpload;
    
    function profile()  {
        return view('backend.profile');
    }

    function account(){
        return view('backend.userProfile.accountContent');
        
    }

    function passChange(){
        return view('backend.userProfile.changePassword');
    }

    function updateInfo(Request $request){

        //Validation here
        $request->validate([
            "name" => "required|string|max:15",
            'designation'=>'required|string|max:20',
            'description'=>'required|string|max:250',
            'email' =>'required|email|unique:users,email,'.auth()->user()->id,
            'phone'=>'numeric',
            'profile_pic'=>'mimes:jpeg,jpg,png',
        ]);
        
        


        $profileImg = $this->singleMideaUpload($request->profile_pic,"users");
        
        //Update profile data into database
        
        $user = User::find(auth()->user()->id);


        // Check if a previous image exists
        if ($user->profile_img) {

            // Delete the previous profile image from the file system
            $previousImage = public_path('storage/users/' . $user->profile_img);
       
            if (file_exists($previousImage)) {
                unlink($previousImage);
                
            }
        }
            
        $user->name = $request->name;
        $user->designation = $request->designation;
        $user->description = $request->description;
        $user->email = $request->email;
        $user->phone = $request->phone;
        $user->profile_url = $profileImg["fileUrl"] ?? null;
        $user->profile_img = $profileImg["fileName"] ?? null;
        $user->save();
        
        return back();
    }

    function resetPassword(Request $request) {

        $request->validate([
            "old_password" => "required|current_password:web",
            "new_password" => "required|different:old_password|min:8|confirmed",
        ]);

        //password Update here..
        $user = User::find(auth()->user()->id);

        
        $user->password = Hash::make($request->new_password); 
        $user->save();

        return redirect()->route("profile");
    }

    function showProfile($id){
        
        $user = User::where('id',$id)->first();
        // dd($user);
        return view('backend.userProfile.showUser',compact('user'));
    }
}
