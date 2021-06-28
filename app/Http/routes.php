<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::auth();

Route::get('/home', 'HomeController@index');

// route show form open new ticket
Route::get('new_ticket','TicketsController@create');
// actual storing of the ticket in the database
Route::post('new_ticket','TicketsController@store');
// displaying user tickets
Route::get('my_tickets', 'TicketsController@userTickets');
// showing ticket
Route::get('tickets/{ticket_id}', 'TicketsController@show');
// 
Route::post('comment','CommentsController@postComment');

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function() {
    Route::get('tickets', 'TicketsController@index');
    Route::post('close_ticket/{ticket_id}', 'TicketsController@close');
});