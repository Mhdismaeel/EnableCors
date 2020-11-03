<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;
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
//Auth::routes(['verify' => true]);

Route::group(['middleware' => ['auth:api','HttpLog','cors']], function() {

    Route::post('userregister', 'UsersController@store')->middleware('check_owner');
    Route::post('StoreProject', 'ProjectController@store')->middleware('check_owner');
    Route::post('StoreType', 'TicketTypeController@store')->middleware('check_owner');
    Route::post('StorePriority', 'TicketPriorityController@store')->middleware('check_owner');
    Route::get('DeleteType/{slug}', 'TicketTypeController@destroy')->middleware('check_owner');
    Route::get('DeletePriority/{slug}', 'TicketPriorityController@destroy')->middleware('check_owner');
    Route::post('UpdateType/{slug}', 'TicketTypeController@update')->middleware('check_owner');
    Route::post('UpdatePriority/{slug}', 'TicketPriorityController@update')->middleware('check_owner');
    //**teams routes */
    Route::get('GetTeams', 'TeamController@index')->middleware('check_owner');
    Route::get('GetTeam/{slug}', 'TeamController@show')->middleware('check_owner');
    Route::get('getusersteam/{teamid}', 'TeamUserController@show')->middleware('check_owner');
    Route::get('GetTeamProject/{slug}', 'TeamController@GetTeamProject')->middleware('check_owner');

});


Route::group(['middleware' => ['auth:api','HttpLog','cors']], function() {
Route::get('deleteBoard/{slug}', 'BoardController@destroy')->middleware('CheckSystemPermission');
Route::get('deleteColumn/{slug}', 'ColumnController@destroy')->middleware('CheckSystemPermission');
Route::get('DeleteProject/{id}', 'ProjectController@destroy')->middleware('CheckSystemPermission');
Route::get('DeleteTicket/{slug}', 'TicketController@destroy')->middleware('CheckSystemPermission');
//********************project*/
Route::get('GetAllProject', 'ProjectController@index');
Route::get('GetProjectBoards/{id}', 'ProjectController@GetProjectBoards')->middleware('CheckSystemPermission');
Route::get('GetProject/{id}', 'ProjectController@show')->middleware('CheckSystemPermission');
Route::post('UpdateProject/{id}', 'ProjectController@update')->middleware('CheckSystemPermission');
//******************board */
Route::post('StoreBoard', 'BoardController@store')->middleware('CheckSystemPermission');
Route::post('UpdateBoard/{slug}', 'BoardController@update')->middleware('CheckSystemPermission');
Route::get('GetBoardDetails/{slug}', 'BoardController@show')->middleware('CheckSystemPermission');
//****************column */
Route::get('GetColumnsBoard/{boaredid}', 'ColumnController@GetColumnsBoard')->middleware('CheckSystemPermission');
Route::post('StoreColumn', 'ColumnController@store')->middleware('CheckSystemPermission');
Route::get('GetColumn/{slug}', 'ColumnController@show')->middleware('CheckSystemPermission');
Route::post('UpdateColumn/{slug}', 'ColumnController@update')->middleware('CheckSystemPermission');
//**********************ticket */
Route::post('StoreTicket', 'TicketController@store')->middleware('CheckSystemPermission');
Route::get('GetTicket/{slug}', 'TicketController@show')->middleware('CheckSystemPermission');
Route::post('UpdateTicket/{slug}', 'TicketController@update')->middleware('CheckSystemPermission');
Route::get('GetAllTicket', 'TicketController@index');
Route::get('GetArchiveTicket', 'TicketController@GetArchiveTicket');
Route::get('ArchiveTicket/{slug}', 'TicketController@ArchiveTicket');

//************************************permissions+user */
Route::post('UpdatePermissions', 'UsersController@AddUserPermissions')->middleware('CheckSystemPermission');
Route::post('UpdateUserRole/{userid}','UsersController@UpdateUserRole')->middleware('CheckSystemPermission');
Route::get('DeleteUser/{userid}','UsersController@destroy')->middleware('CheckSystemPermission');
//************************team */
Route::post('UpdateTeam/{slug}', 'TeamController@update')->middleware('CheckSystemPermission');
Route::get('deleteTeam/{slug}', 'TeamController@destroy')->middleware('CheckSystemPermission');
Route::post('StoreNewTeam', 'TeamController@store')->middleware('CheckSystemPermission');
Route::post('UpdateUserTeam/{teamid}', 'TeamUserController@update')->middleware('CheckSystemPermission');
//*****************************log */

});


Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::group(['middleware' => ['auth:api','cors']], function() {

    Route::get('GetUserProfilr','UsersController@GetUserProfile');
    Route::get('GetHttlog', 'LogController@index')->middleware('CheckSystemPermission');
    Route::get('GetAllActivitylog', 'LogController@GetActivities')->middleware('CheckSystemPermission');
    Route::post('logout', 'Auth\LoginController@logout')->middleware('HttpLog');


});

Auth::routes();
Auth::routes(['verify' => true]);
//**************************users routing

Route::post('login', 'Auth\LoginController@login')->middleware(['HttpLog','cors']);
Route::get('UserVirification/{email}','UsersController@VerificationUser')->middleware(['HttpLog','cors']);;

Route::get('GetAllType', 'TicketTypeController@index')->middleware(['HttpLog','cors']);
Route::get('GetType/{slug}', 'TicketTypeController@show')->middleware(['HttpLog','cors']);
//********************************Ticket Priority */
Route::get('GetAllPriority', 'TicketPriorityController@index')->middleware(['HttpLog','cors']);
Route::get('GetPriority/{slug}', 'TicketPriorityController@show')->middleware(['HttpLog','cors']);
//*****************//*/
Route::get('ProjectActivityLog/{projectid}', 'LogController@GetProjectAllActivity')->middleware(['HttpLog','cors']);
Route::post('ForgetPassword', 'Auth\ForgotPasswordController@sendResetLinkEmail')->middleware(['HttpLog','cors']);
Route::post('ResetPassword', 'Auth\ResetPasswordController@reset')->middleware(['HttpLog','cors']);

