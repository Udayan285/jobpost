<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\frontend\Application;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    function allapplications(){

        $applications = Application::all();
        // dd($applications);
        return view('backend.applications.allapplications',compact('applications'));
    }

    function deleteApply($id){
        $apply = Application::find($id);

        $apply->delete();
        return back();
    }
}
