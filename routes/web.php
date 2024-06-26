<?php
 
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ForgetpasswordController;
use App\Http\Controllers\NotificationController;
use App\Http\Controllers\LatestnewsController;
use App\Models\Doctor;
use App\Models\latestnews;
/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
 
Route::get('/', function () {
    return view('home', ['doctor' =>Doctor::all(), 'news' => latestnews::all()]);
})->name('home');

// Route::get('/forgetpassword',[ForgetpasswordController::class, 'forgetpassword'])->name('forgetpassword');

// Route::post('/forgetpasswordpost',[ForgetpasswordController::class, 'forgetpasswordpost'])->name('forgetpasswordpost');

// Route::get('/',[HomeController::class, 'index'])->name('home');
 
Route::get('/about', [UserController::class, 'about'])->name('about');
 
Route::controller(AuthController::class)->group(function () {
    Route::get('register', 'register')->name('register');
    Route::post('register', 'registerSave')->name('register.save');
 
    Route::get('login', 'login')->name('login');
    Route::post('login', 'loginAction')->name('login.action');
 
    Route::get('logout', 'logout')->middleware('auth')->name('logout');
});
 
//Normal Users Routes List
Route::middleware(['auth', 'user-access:user'])->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/makeappointment', [UserController::class, 'appointmentForm'])->name('makeappointment');
    Route::get('/doctor', [UserController::class, 'doctor'])->name('doctor');
    Route::get('/myappointment', [UserController::class, 'myappointment'])->name('myappointment');
    Route::get('/profile', [UserController::class, 'userprofile'])->name('profile');
    Route::get('/cancel_appoint/{id}', [UserController::class, 'cancel_appoint'])->name('cancel_appoint');
    Route::get('/appointment', [UserController::class, 'appointment'])->name('appointment');
    Route::get('/notifications/usernotification', [NotificationController::class, 'usernotification'])->name('notifications/usernotification');
   
});

Route::get('/notifications/markasread/{id}', [NotificationController::class, 'markAsRead'])->name('notifications/markAsRead');
 
//Admin Routes List
Route::middleware(['auth', 'user-access:admin'])->group(function () {
    Route::get('/admin/home', [HomeController::class, 'adminHome'])->name('admin/home');
 
    Route::get('/admin/profile', [AdminController::class, 'profilepage'])->name('admin/profile');
    Route::get('/admin/appointment', [AdminController::class, 'showappointment'])->name('admin/appointment');
    Route::get('/admin/delete_appoint/{id}', [AdminController::class, 'delete_appoint'])->name('admin/delete_appoint');
    
    Route::post('/admin/upload_doctor', [AdminController::class, 'upload'])->name('admin/upload_doctor');
    Route::get('/admin/add_doctor_view', [AdminController::class, 'addview'])->name('admin/add_doctor_view');
    Route::get('/admin/showall_doctor_view', [AdminController::class, 'alldoctorview'])->name('admin/showall_doctor_view');
    Route::get('/admin/update_doctor/{id}', [AdminController::class,'update_doctor'])->name('admin/update_doctor');
    Route::post('/admin/edit_doctor/{id}', [AdminController::class,'edit_doctor'])->name('admin/edit_doctor');
    Route::get('/admin/delete_doctor/{id}', [AdminController::class,'delete_doctor'])->name('admin/delete_doctor');

    Route::post('/admin/update_news', [LatestnewsController::class, 'updatenews'])->name('admin/update_news');
    Route::get('/admin/latestnews', [LatestnewsController::class, 'latestnews'])->name('admin/latestnews');
    Route::get('/admin/delete_news/{id}', [LatestnewsController::class, 'deletenews'])->name('admin/delete_news');

    
    Route::get('/admin/cancel_appoint/{id}', [AdminController::class, 'cancel_appoint'])->name('admin/cancel_appoint');
    Route::get('/admin/approve_appoint/{id}', [AdminController::class,'approve_appoint'])->name('admin/approve_appoint');

    
    Route::get('/notifications/adminnotification', [NotificationController::class, 'adminnotification'])->name('notifications/adminnotification');

});