<?php

use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\Auth\AuthenticatedSessionController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\FullCalenderController;
use App\Http\Controllers\PagesController;
use App\Http\Controllers\PostsController;
use App\Models\Data;
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
//Route::get('/', function () {
//    return view('welcome');
//});
Route::get('/', [HomeController::class, 'index']);
Route::get('/login', [LoginController::class, 'showLogin']);
Route::get('/logout', [HomeController::class, 'logout']);
Route::get('/register', [LoginController::class, 'showRegister']);
Route::post('/register', [RegisterController::class, 'storeRegister']);
Route::post('/login', [AuthenticatedSessionController::class, 'store']);
Route::get('/dashboard', [HomeController::class, 'dashboard'])->name('dashboard');

//Route::get('/redirect', [LoginController::class, 'redirectToProvider']);
//Route::get('/callback', [LoginController::class, 'handleProviderCallback']);

//staffDirectory
Route::get('/staffdirectory', [HomeController::class, 'getstaff']);

//Admin
Route::get('/employees', [AdminController::class, 'employees']);
Route::get('/employee/{id}', [AdminController::class, 'viewEmployee']);
Route::post('/employee/{id}', [AdminController::class, 'updateEmployee']);
Route::get('/pending_employees', [AdminController::class, 'pendingEmployees']);
Route::get('/edit_employees', [AdminController::class, 'editEmployees']);
    Route::get('/employee/delete/{id}', [AdminController::class, 'deleteEmployee']);

//Auth::routes();

Route::get('/admin', 'AdminController@index')->name('admin')->middleware('admin');
Route::get('/secretary', 'SecretaryController@index')->name('secretary')->middleware('secretary');
Route::get('/treasurer', 'TreasurerController@index')->name('treasurer')->middleware('treasurer');
Route::get('/president', 'PresidentController@index')->name('president')->middleware('president');
Route::get('/staff', 'StaffController@index')->name('staff')->middleware('staff');

//Secretary Events
Route::get('/secretary/dashboard', [\App\Http\Controllers\SecretaryController::class, 'index']);
Route::get('/events-json', [\App\Http\Controllers\SecretaryController::class, 'getEventsJson']);
Route::post('/event/store', [\App\Http\Controllers\SecretaryController::class, 'storeEvent']);
Route::get('/events', [\App\Http\Controllers\SecretaryController::class, 'getEvents']);
Route::get('/event/{id}', [\App\Http\Controllers\SecretaryController::class, 'editEvent']);
Route::post('/event/{id}', [\App\Http\Controllers\SecretaryController::class, 'updateEvent']);
Route::get('/event/delete/{id}', [\App\Http\Controllers\SecretaryController::class, 'deleteEvent']);


Route::get('/event/{id}/expense', [\App\Http\Controllers\TreasurerController::class, 'addEventExpense']);
Route::post('/event/{id}/expense', [\App\Http\Controllers\TreasurerController::class, 'updateEventExpense']);
Route::get('/event/{id}/expenses', [\App\Http\Controllers\TreasurerController::class, 'eventExpenses']);
Route::get('/event/{id}/expense/{ex}/delete', [\App\Http\Controllers\TreasurerController::class, 'deleteEventExpense']);


//StaffRequestMeeting
Route::get('/staff/requestMeeting', [\App\Http\Controllers\StaffController::class, 'index']);
Route::get('/staff/requestMeeting', [\App\Http\Controllers\StaffController::class, 'requestMeeting']);
Route::post('/staff/requestMeeting', [\App\Http\Controllers\StaffController::class, 'storeMeeting']);
Route::get('viewMeeting', [\App\Http\Controllers\StaffController::class, 'viewMeeting']);
Route::get('/meeting/{id}', [\App\Http\Controllers\StaffController::class, 'editMeeting']);
Route::post('/meeting/{id}', [\App\Http\Controllers\StaffController::class, 'updateMeeting']);
Route::get('/meeting/delete/{id}', [\App\Http\Controllers\StaffController::class, 'deleteMeeting']);


//Profile
Route::get('profile', [\App\Http\Controllers\ProfileController::class, 'editProfile']);
Route::post('profile', [\App\Http\Controllers\ProfileController::class, 'updateProfile']);
//Media

//Blog
Route::get('/blog', [\App\Http\Controllers\PagesController::class, 'index']);
Route::resource('/blog',PostsController::class);

//BookTickets
Route::get('/tickets', [\App\Http\Controllers\TicketController::class, 'index']);
Route::get('/create-ticket', [\App\Http\Controllers\TicketController::class, 'create']);
Route::post('/create-ticket', [\App\Http\Controllers\TicketController::class, 'store']);
Route::get('/ticket/{ticket}', [\App\Http\Controllers\TicketController::class, 'edit']);
Route::post('/ticket/{ticket}', [\App\Http\Controllers\TicketController::class, 'update']);
Route::get('/ticket/{ticket}/delete', [\App\Http\Controllers\TicketController::class, 'destroy']);

Route::get('/ticket/{ticket}/book', [\App\Http\Controllers\TicketController::class, 'book']);
Route::post('/ticket/{ticket}/book', [\App\Http\Controllers\TicketController::class, 'storeBooking']);
Route::get('/ticket/{ticket}/bookings', [\App\Http\Controllers\TicketController::class, 'viewBooking']);

//MediaRepository
Route::get('/media', [\App\Http\Controllers\MediaController::class, 'index']);
Route::post('/media', [\App\Http\Controllers\MediaController::class, 'store']);
Route::get('/media/{id}/edit',[\App\Http\Controllers\MediaController::class, 'editPost']);
Route::post('/media/{id}/update',[\App\Http\Controllers\MediaController::class, 'updatePost']);
Route::post('/media/{id}/delete',[\App\Http\Controllers\MediaController::class, 'deletePost']);


//Class
Route::get('/class', [\App\Http\Controllers\SecretaryController::class, 'viewClass']);
Route::get('/create-class', [\App\Http\Controllers\SecretaryController::class, 'create_fitness']);
Route::post('/create-class', [\App\Http\Controllers\SecretaryController::class, 'store_fitness']);
Route::get('/class/{class}', [\App\Http\Controllers\SecretaryController::class, 'edit_fitness']);
Route::post('/class/{class}', [\App\Http\Controllers\SecretaryController::class, 'update_fitness']);
Route::get('/class/{class}/delete', [\App\Http\Controllers\SecretaryController::class, 'destroy_fitness']);

Route::get('/class/{class}/join', [\App\Http\Controllers\SecretaryController::class, 'join']);
Route::post('/class/{class}/join', [\App\Http\Controllers\SecretaryController::class, 'storeJoin']);
Route::get('/class/{class}/view', [\App\Http\Controllers\SecretaryController::class, 'viewJoining']);


//Poll
Route::get('/poll', [\App\Http\Controllers\PollController::class, 'index']);
Route::get('/create-poll', [\App\Http\Controllers\PollController::class, 'create']);
Route::post('/create-poll', [\App\Http\Controllers\PollController::class, 'store']);
Route::get('/polls', [\App\Http\Controllers\PollController::class, 'polls']);
Route::post('/polls', [\App\Http\Controllers\PollController::class, 'savePolls']);

Route::get('//poll/{id}/result', [\App\Http\Controllers\PollController::class, 'viewResult']);
Route::get('/poll/{poll}/delete', [\App\Http\Controllers\PollController::class, 'destroy']);

//Tournament
Route::get('/create-tournament', [\App\Http\Controllers\TournamentController::class, 'index']);
//Message
Route::get('/message', [\App\Http\Controllers\MessageController::class, 'index']);
Route::get('/message/{id}', [\App\Http\Controllers\MessageController::class, 'userMessage']);
Route::post('/message/{id}', [\App\Http\Controllers\MessageController::class, 'saveMessage']);
