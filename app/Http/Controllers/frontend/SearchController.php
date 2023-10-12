<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\JobPost;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    function search(Request $request){
        $query = $request->get('query');
        $results = JobPost::where('title', 'like', '%'.$query.'%')->get(); 

        return response()->json($results);
    }
}
