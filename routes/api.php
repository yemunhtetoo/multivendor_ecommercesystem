<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Models\CmsPage;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::namespace('App\Http\Controllers\API')->group(function(){
    //Register User for React App
    Route::post('register-user','APIController@registerUser');

    //Login user for React App
    Route::post('login-user','APIController@loginUser');

    //Update User Details/ Profile API for React App
    Route::post('update-user','APIController@updateUser');

        //CMS Pages Routes
        $cmsUrls = CmsPage::select('url')->where('status',1)->get()->pluck('url')->toArray();
        foreach($cmsUrls as $url){
            Route::get($url,'APIController@cmsPage');
        }

        //Categories menu list
        Route::get('menu','APIController@menu');

        //Listing Products
        Route::get('listing/{url}','APIController@listing');

        //Details products api
        Route::get('detail/{productid}','APIController@detail');
});