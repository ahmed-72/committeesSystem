<?php

use App\Http\Controllers\userController;
use App\Http\Controllers\committeeController;
use App\Http\Controllers\sessionController;
use App\Http\Controllers\notificationController;
use App\Http\Controllers\rolesController;
use App\Http\Controllers\roleUserController;

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
    return view('welcome');
});
Route::get('/home', function () {
    return view('pages/home');
})->middleware(['auth'])->name('mainhome');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';

Route::get('/addUser',[userController::class,'create'] )->middleware('auth')->name('addUser');
Route::post('/addUser',[userController::class,'store'] )->middleware('auth')->name('addUser.store');

Route::get('/showUsers',[userController::class,'index'] )->middleware('auth')->name('showUsers');

Route::get('/userProfile/{id}',[userController::class,'show'] )->middleware('auth')->name('userProfile');


Route::get('/updateUser/{id}',[userController::class,'edit'] )->middleware('auth')->name('updateUser.edit');
Route::put('/updateUser/{id}',[userController::class,'update'] )->middleware('auth')->name('updateUser.update');


Route::middleware(['auth',])->group(function () {
    
//committee
Route::get('/allCommittees',[committeeController::class,'indexAll'] )->middleware('user.type:super-admin');

Route::get('/addCommittee',[committeeController::class,'create'] );
Route::post('/addCommittee',[committeeController::class,'store'] )->name('addCommittee.store');

Route::get('/showCommittees',[committeeController::class,'index'] )->name('showCommittee');

Route::get('/committee/{committeeID}',[committeeController::class,'show'] )->name('committee');


Route::get('/updateCommittees/{committeeID}',[committeeController::class,'edit'] )->name('updatecommittee.edit');
Route::put('/updateCommittees/{committeeID}',[committeeController::class,'update'] )->name('updatecommittee.update');

Route::get('/deleteCommittee/{committeeID}',[committeeController::class,'destroy'])->name('deletecommittee');

//sessions
Route::get('/addSession/{committeeID}',[sessionController::class,'create'] )->name('addSession.create');
Route::post('/addSession',[sessionController::class,'store'] )->name('addSession.store');

Route::get('/showSessions/{committeeID}',[sessionController::class,'index'] )->name('showSessions');


//deletes on update blade
Route::get('/deleteMember/{employeeID}/{committeeID}/{memberID}',[committeeController::class,'deleteMember'] )->name('delete.member');
Route::get('/deleteTask/{taskID}/{committeeID}',[committeeController::class,'deleteTask'] )->name('delete.task');
Route::get('/deleteRegulation/{regulationID}/{committeeID}',[committeeController::class,'deleteRegulation'] )->name('delete.regulation');

// addDiscussionTopics
Route::get('/addDiscussionTopics/{committeeID}',[committeeController::class,'createTopics'] )->name('addDiscussionTopics.create');
Route::post('/addDiscussionTopics',[committeeController::class,'storeTopics'] )->name('addDiscussionTopics.store');

Route::get('/showSessionTopics/{committeeID}/{sessionID}',[sessionController::class,'showSessionTopics'] )->name('showSessionTopics');

Route::get('/prepareSession/{committeeID}/{sessionID}',[sessionController::class,'prepareSession'] )->name('prepareSession');
//تاكيد الجلسة و ارسال اشعارات للاعضاء
Route::post('/sessionConfirmation',[sessionController::class,'sessionConfirmation'] )->name('sessionConfirmation');

//المحضر
Route::get('/sessionReport/{committeeID}/{sessionID}',[sessionController::class,'sessionReport_create'] )->name('sessionReport.create');
Route::post('/sessionReport',[sessionController::class,'sessionReport_store'] )->name('sessionReport.store'); 

// اشعارات القرارات
// [notificationController::class,'
Route::get('/notifications',[notificationController::class,'index' ])->name('notifications');
Route::get('/notification/{notificationID}',[notificationController::class,'show' ])->name('notification.show');
Route::get('/markNotificationAsRead/{notificationID}',[notificationController::class,'markAsRead'] )->name('markNotificationAsRead');

//roleeeeeees
Route::resource('roles', rolesController::class) ;

Route::resource('roleUser', roleUserController::class);// ->middleware('user.type:super-admin') ;


// Route::get('/roleUser',[rolesController::class,'role_user_create'] )->name('roleUser.create');
// Route::post('/roleUser',[rolesController::class,'role_user_store'] )->name('roleUser.store');

});



//'App\Http\Controllers\projectController@signin'

Route::get('/printReport/{sessionID}', function () {
    return view('pages/sessions/printReport');
})->name('printReport');

Route::get('/create', function () {
    return view('pages/committees/create');
});


Route::get('/committeeDetails/{committeeID}',[committeeController::class,'nawShow'] );

