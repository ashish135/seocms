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
    return redirect('/admin');
});

Route::resource('admin/projects', 'ProjectsController')->middleware('role:super');

Route::resource('/admin/project/categories', 'CategoryController')->middleware('role:super');

Route::resource('/admin/project/regions', 'RegionsController')->middleware('role:super');

Route::resource('/admin/project/activity', 'ActivityController')->middleware('role:super');

Route::resource('/admin/contents', 'ContentWritterController')->middleware('role:super');

Route::resource('/admin/graphics', 'GraphicdesignerController')->middleware('role:super');

Route::resource('/admin/project/lead', 'LeadsController')->middleware('role:super');

Route::resource('/admin/project/keyword', 'KeywordController')->middleware('role:super');

Route::get('/admin/website', 'WebsiteURLController@index')->middleware('role:super');

Route::post('/admin/website', 'WebsiteURLController@store')->middleware('role:super');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::post('select-ajax', ['as'=>'select-ajax','uses'=>'LeadsController@selectAjax']);

Route::post('ajaxRequest', 'TaskController@ajaxRequestPost');

Route::post('ajaxRequestnote', 'NoteController@ajaxRequestnotePost');
