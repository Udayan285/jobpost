<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class UserManagemetController extends Controller
{
    function allUser(){

        $users = User::all();
        return view('backend.users.users', compact('users'));
        
    }

    function banUser($id){
        $user = User::find($id);

        if($user->ban_user == false){
            $user->ban_user = true;
            $user->save();
            return back();
        }else{
            $user->ban_user = false;
            $user->save();
            return back();
        }
        
    }
}
