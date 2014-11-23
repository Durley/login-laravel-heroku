<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

//Route::get('/', 'HomeController@showWelcome');

Route::get('/', array('before' => 'auth' ,function()
{
    $user = User::find(Auth::id());
    return Redirect::route('admin.users.show', array($user->id));
}));

Route::get('/login', function()
{
    return View::make('login');
});

Route::post('/login', function()
{
    // Validation? Not in my quickstart!
    // No, but really, I'm a bad person for leaving that out
    Auth::attempt( array('email' => Input::get('email'), 'password' => Input::get('password')) );

    return Redirect::to('/');
});
Route::resource('admin/users', 'Admin_UsersController');
Route::get('/logout', function()
{
    Auth::logout();
    Session::flush();
    return Redirect::to('/login');
})->before('auth.basic');