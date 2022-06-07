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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index') ->name('home');

//categories Route

Route::middleware(['auth'])->group(function(){         //we have used middleware method by its name itself here

    Route::get('/categories/index','CategoryController@index');   // Note:- Route can be /categories_index
    Route::get('/categories/create','CategoryController@create');
    Route::post('/categories/store','CategoryController@store');
    Route::get('/categories/edit/{id}','CategoryController@edit');  // for to have optional variable we use ?
    Route::put('/categories/update','CategoryController@update');            // MISTAKE- Since we have taken id as hidden in input type hence, no need to take in curly parenthesis
    Route::delete('/categories/delete/{id}','CategoryController@destroy');
    Route::get('/categories/show/{id}','CategoryController@show');
    Route::get('/categories/soft_deletes','CategoryController@soft_deletes_categories');
    Route::get('/categories/restore/{id}','CategoryController@soft_deletes_restore');

});



//tags Route
Route::middleware(['auth'])->group(function(){

    Route::get('/tags/index','TagController@index');
    Route::get('/tags/create','TagController@create');
    Route::post('/tags/store','TagController@store');
    Route::get('/tags/edit/{id}','TagController@edit');
    Route::put('/tags/update/{id}','TagController@update');
    Route::delete('/tags/delete/{id}','TagController@destroy');
    Route::get('/tags/show/{id}','TagController@show');
    Route::get('/tags/soft_deletes','TagController@soft_deletes_tags');
    Route::get('/tags/restore/{id}','TagController@soft_deletes_restore');

});

//blogs route

Route::get('/blogs/index','BlogController@index')->name('b_index'); // for to give specific name to url we used name() method or function
Route::get('/blogs/create','BlogController@create')->name('b_create');
Route::post('/blogs/store','BlogController@store')->name('b_store');

Route::put('/blogs/update/{blog}','BlogController@update')->name('b_update');   //IMPORTANT:- taken full blog as a variable
Route::get('/blogs/edit/{blog}','BlogController@edit')->name('b_edit');                                                                    


Route::delete('/blogs/delete','BlogController@destroy')->name('b_delete');
Route::get('/blogs/soft_deleted','BlogController@soft_deletes_blogs')->name('b_soft');
Route::get('/blogs/restore/{id}','BlogController@soft_deletes_restore')->name('b_restore');

Route::get('/blogs/show/{slug}','BlogController@show')->name('b_show'); // IMPORTANT we can take variable similar to its name i,e slug

Route::get('blog/delete_image/{id}','BlogController@delete_image')->name('b_d_image');



// simple practice

Route::get('/comments/index','CommentController@index')->name('c_index');
Route::get('/comments/create','CommentController@create')->name('c_create');   // taking full blogId as a variable
Route::post('/comments/store','CommentController@store')->name('c_store');
Route::get('/comments/edit/{id}','CommentController@edit')->name('c_edit');    // mistake of id not passed as variable i,e {} stating TOO FEW ARGUMENTS PASSED
Route::put('/comments/update','CommentController@update')->name('c_update');
Route::delete('/comments/delete/{id}','CommentController@destroy')->name('c_delete');   // mistake of destroy vs delete in controller
Route::get('/comments/show/{id}','CommentController@show')->name('c_show');   

//cmnt which is cmnts in migration
Route::get('/cmnts/index','CmntController@index')->name('cmnt_index');
Route::get('/cmnts/create','CmntController@create')->name('cmnt_create');
Route::post('/cmnts/store','CmntController@store')->name('cmnt_store');
Route::get('/cmnts/edit/{id}','CmntController@edit')->name('cmnt_edit');
Route::put('/cmnts/update/{id}','CmntController@update')->name('cmnt_update');
Route::delete('/cmnts/delete/{id}','CmntController@destroy')->name('cmnt_delete');
Route::get('/cmnts/show/{slug}','CmntController@show')->name('cmnt_show');


Route::get('/mytask1','Task1@create');
Route::get('/mytask1map','Task1@show');