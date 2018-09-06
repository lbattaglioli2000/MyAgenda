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
})->name('home');

Auth::routes();

Route::name('user.')->group(function () {

    Route::get('/home', 'HomeController@index')->name('home');

    /**
     * Course CRUD
     *
     */

    // CREATE
    Route::get('/new/course', 'CourseController@index')->name('new-course');
    Route::post('/new/course', 'CourseController@post')->name('new-course.post');
    // DELETE
    Route::get('/delete/course/{course}', 'CourseController@delete')->name('delete.course');
    // GET
    Route::get('/get/course/{course}', 'CourseController@get')->name('get.course');


    /**
     * Assignment CRUD
     *
     */

    // CREATE
    Route::get('/new/assignment', 'AssignmentController@index')->name('new-assignment');
    Route::post('/new/assignment', 'AssignmentController@post')->name('new-assignment.post');
    // DELETE
    Route::get('/delete/assignment/{assignment}', 'AssignmentController@delete')->name('delete.assignment');
    // GET
    Route::get('/assignment/{assignment}', 'AssignmentController@get')->name('get.assignment');

});