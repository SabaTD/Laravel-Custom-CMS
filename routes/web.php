<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();

Route::get('/', function () {
    return view('welcome');
});

Route::group(['prefix' => 'admin'], function(){

   Route::get('/', 'AdminController@index');

   Route::group(['prefix' => 'pages/edit'], function () {

      // About
 		  Route::get('/about', 'AdminController@about');
      Route::post('/about', 'AdminController@storeAbout');

      // Contact
      Route::get('/contact', 'AdminController@contact');
      Route::post('/contact', 'AdminController@storeContact');
 	});




    $routes =  function () {
       Route::get("/", 'AdminController@common');
       Route::get('/create', 'AdminController@createCommon');
       Route::post('/create', 'AdminController@storeCommon');
       Route::get('/edit/{id}', 'AdminController@editCommon');
       Route::post('/edit/{id}', 'AdminController@updateCommon');
       Route::get('/delete/{id}', 'AdminController@deleteCommon');
       Route::post('/publish', 'AdminController@publishCommon');
       Route::post('/deleteimg', 'AdminController@deleteCommonImg');
    };


    Route::group(['prefix' => 'partner'], $routes);
    Route::group(['prefix' => 'service'], $routes);
    Route::group(['prefix' => 'room'], $routes);













  // gallery
   Route::group(['prefix' => 'gallery'], function(){
     Route::get('/', 'AdminController@gallery');
     Route::get('/create', 'AdminController@createGallery');
     Route::post('/create', 'AdminController@storeGallery');
     Route::get('/edit/{gallery}', 'AdminController@editGallery');
     Route::post('/edit/{gallery}', 'AdminController@updateGallery');
     Route::get('/delete/{gallery}', 'AdminController@deleteGallery');
     Route::post('/publish', 'AdminController@publishGallery');
     Route::post('/deleteimg', 'AdminController@deleteGalleryImg');
  });

  // Video
   Route::group(['prefix' => 'video'], function(){
     Route::get('/', 'AdminController@video');
     Route::get('/create', 'AdminController@createVideo');
     Route::post('/create', 'AdminController@storeVideo');
     Route::get('/edit/{video}', 'AdminController@editVideo');
     Route::post('/edit/{video}', 'AdminController@updateVideo');
     Route::get('/delete/{video}', 'AdminController@deleteVideo');
     Route::post('/publish', 'AdminController@publishVideo');
  });


});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
