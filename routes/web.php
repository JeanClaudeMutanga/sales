<?php

use Illuminate\Support\Facades\Route;

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
    return view('auth.login');
});

Auth::routes();

//Admin Routes
Route::get('/admin/opportunity/total','AdminController@index');

Route::get('/admin/opportunity/open','AdminController@open');

Route::get('/admin/opportunity/closed','AdminController@closed');

Route::get('/admin/opportunity/{id}','AdminController@show');

Route::post('/admin/opportunity/update/{id}','AdminController@update');


Route::get('/admin/events','EventsController@admin');

Route::get('/admin/events/edit','EventsController@edit');

Route::post('/admin/events/create','EventsController@admin_store');

Route::get('/admin/redheart','AdminController@redheart');

Route::get('/admin/fibre','AdminController@fibre');

Route::get('/admin/team','AdminController@team');


Route::get('/admin/redheart/{id}','AdminController@red');

Route::get('/admin/fibre/{id}','AdminController@fib');

Route::get('/admin/my/times','AdminController@mytime');

Route::get('/admin/clock/in','AdminController@clockin');

Route::get('/admin/clock/out','AdminController@checkout');


Route::get('/admin/outstanding/receivecof','AdminController@Receivecof');

Route::get('/admin/outstanding/cof2client','AdminController@cof2client');

Route::get('/admin/outstanding/followups','AdminController@followups');

Route::get('/admin/outstanding/cof2admin','AdminController@cof2admin');

Route::get('/admin/outstanding/inform','AdminController@inform');


Route::get('/event/edit/{id}','AdminController@edit_event');

Route::get('/event/delete/{id}','AdminController@delete');

Route::post('/event/update/{id}' ,'AdminController@update_event');




//agent routes

Route::get('/calender/open','EventsController@agent');

Route::get('/calender/create','EventsController@agent_store');

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/opportunity/create', 'OpportunityController@create')->name('home');

Route::get('/opportunity/total', 'OpportunityController@main')->name('total');

Route::get('/opportunity/{id}','OpportunityController@show')->name('single');

Route::get('/current/outstanding/receivecof','OpportunityController@receivecof');

Route::get('/current/outstanding/cof2client','OpportunityController@cof2client');

Route::get('/current/outstanding/followups','OpportunityController@followups');

Route::get('/current/outstanding/cof2admin','OpportunityController@cof2admin');

Route::get('/current/outstanding/inform','OpportunityController@inform');


Route::get('/events/edit','EventsController@edit_agent');

Route::get('/agent/event/edit/{id}','AdminController@edit_event_agent');

Route::post('/agent/event/update/{id}' ,'AdminController@update_event');

//new red heart
Route::get('/redheart','RedHeartController@create');
Route::post('/redheart/create','RedHeartController@store');
Route::get('/total/redheart','RedHeartController@index');
Route::get('/school/{id}','RedHeartController@show');
Route::post('/attachments/redheart/{id}','RedHeartController@docs');

//Fibre 
Route::get('/fibre','FibreController@create');
Route::post('/fibre/create','FibreController@store');
Route::get('/total/fibre','FibreController@index');
Route::get('/fibre/{id}','FibreController@show');
Route::post('/attachments/fibre/{id}','FibreController@docs');

Route::post('/comment/fibre/{id}','FibreController@comment');

Route::post('/account/fibre/{id}','FibreController@account');

Route::get('/fibre/open/{id}','FibreController@open');

Route::get('/fibre/close/{id}','FibreController@close');


//Update Tasks Status

Route::post('/task/update/status/receivecof','TasksController@receivecof');

Route::post('/task/update/status/Cof2Client','TasksController@Cof2Client');

Route::post('/task/update/status/FollowUp','TasksController@FollowUp');

Route::post('/task/update/status/Cof2Admin','TasksController@Cof2Admin');

Route::post('/task/update/status/InformClient','TasksController@InformClient');


//Management Reporting
Route::get('/reporting/outstanding/receivecof','ManageController@Receivecof');

Route::get('/reporting/outstanding/cof2client','ManageController@cof2client');

Route::get('/reporting/outstanding/followups','ManageController@followups');

Route::get('/reporting/outstanding/cof2admin','ManageController@cof2admin');

Route::get('/reporting/outstanding/inform','ManageController@inform');



Route::get('/opportunity/reporting/redheart','ManageController@redheart');

Route::get('/opportunity/reporting/fibre','ManageController@fibre');

Route::get('/reporting/school/{id}','ManageController@school');

Route::get('/reporting/team/times','ClokingController@management');

//appointments

Route::get('/events/create','EventsController@store');

Route::get('/events/total','EventsController@index');




//Team Reporting
Route::get('/reporting/team/total','ManageController@team');

Route::get('/reporting/agent/opportunities/{id}','ManageController@agent');

Route::get('/reporting/opportunity/{id}','ManageController@show');

Route::get('/reporting/total/filter','ManageController@report');

//clocking times
Route::get('/checkIn','ClokingController@create');
Route::get('/clock/in','ClokingController@store');
Route::get('/clock/out','ClokingController@update');