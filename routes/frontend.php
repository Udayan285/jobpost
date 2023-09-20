<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\frontend\FrontendController;


//frontend route here
Route::get('/', [FrontendController::class, 'homePage'])->name('homePage');


// route::prefix->('/home')->name("home.")->controller(FrontendController::class)->group(function(){
//     Route::get('/job-listing', 'jobListing')->name('joblist');
// });

route::prefix("/home")->name("home.")->controller(FrontendController::class)->group(function(){
    Route::get('/job-listing/{id}', 'jobListing')->name('joblist');
    Route::get('/job-apply/{slug}', 'applyJob')->name('jobapply');
    Route::post('/job-apply/applied', 'submitApply')->name('submitapply');
});