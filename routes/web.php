<?php

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\backend\BannerController;
use App\Http\Controllers\backend\StatusController;
use App\Http\Controllers\backend\jobPostController;
use App\Http\Controllers\backend\CategoriesController;
use App\Http\Controllers\backend\ApplicationController;
use App\Http\Controllers\backend\GoogleController;
use App\Http\Controllers\backend\ProfileMangeController;
use App\Http\Controllers\backend\SubCategoriesController;
use App\Http\Controllers\backend\UserManagemetController;



//Login with Google & FACEBOOK route try
Route::get('/auth/redirect',[GoogleController::class, 'goGoogle'])->name('google.login');
Route::get('/login/redirect-home',[GoogleController::class, 'backFromGoogle'])->name('google.redirect');

//facebook
Route::get('/facebook/redirect',[GoogleController::class, 'goFacebook'])->name('facebook.login');
Route::get('/facebook/redirect-home',[GoogleController::class, 'backFromFacebook'])->name('facebook.redirect');

//Login with Google & Facebook route try

Auth::routes();


route::middleware(['auth','banuser'])->group(function(){




Route::get('/admin/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');



//Banner moto route here
Route::prefix("/admin")->name("banner.")->controller(BannerController::class)->group(function(){
    Route::get('/banner-moto', 'motoChange')->name('change');
    Route::post('/banner-moto/add', 'motoCreate')->name('create');
    Route::get('/banner-moto/delete/{slug}', 'motoDelete')->name('delete');
});


//backend profile route group here..
route::prefix("/admin")->name("profile")->controller(ProfileMangeController::class)->group(function(){

    //Profile update
    Route::get('/profile', 'profile');
    Route::get('/profile/account', 'account')->name('.account');
    Route::get('/profile/password', 'passChange')->name('.passwordChange');
    Route::put('/profile/update-info', 'updateInfo')->name('.update');
    Route::get('/profile/show-user-profile/{id}', 'showProfile')->name('.show');

    //Password reset here
    Route::post('/reset_password','resetPassword')->name(".resetPassword");

});





//Route group for login/register
route::prefix("/welcome")->name("auth.")->controller(LoginController::class)->group(function(){
    Route::get('/login', 'showLoginForm')->name('login');

});

route::prefix("/welcome")->name("auth.")->controller(RegisterController::class)->group(function(){
    Route::get('/register', 'showRegistrationForm')->name('register');
});


//All categories route group here
route::middleware("role:admin")->prefix("/admin")->name("categories.")->controller(CategoriesController::class)->group(function(){

    Route::get('/categories', 'allCategories')->name('all');
    Route::post('/categories/store', 'storeCategories')->name('store');
    Route::get('/categories/edit/{slug}', 'editCategories')->name('edit');
    Route::post('/categories/update/{slug}', 'updateCategories')->name('update');
    Route::get('/categories/delete/{slug}', 'deleteCategories')->name('delete');

});


//All SubCategories route here
route::middleware("role:admin")->prefix("/admin")->name("subCategories.")->controller(SubCategoriesController::class)->group(function(){
    Route::get('/sub-categories', 'allSubCategories')->name('all');
    Route::post('/sub-categories/store', 'storeSubCategories')->name('store');
    Route::get('/sub-categories/edit/{slug}', 'editSubCategories')->name('editbtn');
    Route::post('/sub-categories/update/{slug}', 'updateSubCategories')->name('update');
    Route::get('/sub-categories/delete/{slug}', 'deleteSubCategories')->name('delete');

});


//Job post related route here
route::prefix("/admin")->name("jobPost.")->controller(jobPostController::class)->group(function(){
    Route::get('/create-job-post', 'createJobPost')->name('create');
    Route::post('/store-job-post', 'storeJobPost')->name('store');
    Route::get('/preview-all-job-post', 'previewAllJobPost')->name('preview.allPost');
    Route::get('/edit-job-post/{slug}', 'editJobPost')->name('edit');
    Route::post('/update-job-post/{slug}', 'updateJobPost')->name('update');
    Route::get('/preview-post/{slug}', 'previewJobPost')->name('preview');
    Route::get('/delete-job-post/{id}', 'deleteJobPost')->name('delete');
    Route::get('/reject-job-post/{id}', 'rejectJobPost')->name('rejectAdmin');
    Route::get('/accept-job-post/{id}', 'acceptAdmin')->name('acceptAdmin');

});


//Status controller route here
route::prefix("/admin")->name("status.")->controller(StatusController::class)->group(function(){
    Route::get('/change-category-status/{slug}','changeCtaegoryStatus')->name('changeCtaegoryStatus');
    Route::get('/change-subcategory-status/{slug}','changeSubCtaegoryStatus')->name('changeSubCtaegoryStatus');
    Route::get('/banner-moto/status/{slug}', 'motoStatus')->name('status');
});

//Users management route here
route::middleware("role:admin")->prefix("/admin")->name("usersManagement.")->controller(UserManagemetController::class)->group(function(){
    Route::get('/users', 'allUser')->name('all');
    Route::get('/users/ban-user/{id}', 'banUser')->name('ban');

});

//all apllications route here
route::prefix("/admin")->name("appications.")->controller(ApplicationController::class)->group(function(){
    Route::get('/all-applications', 'allapplications')->name('all');
    Route::get('/delete-applications/{id}', 'deleteApply')->name('delete');

});


});