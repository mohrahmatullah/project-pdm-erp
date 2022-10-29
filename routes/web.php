<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\BranchController;
use App\Http\Controllers\DepartementController;
use App\Http\Controllers\DesignationController;
use App\Http\Controllers\EmployeeController;
use App\Http\Controllers\LeaveController;
use App\Http\Controllers\LeaveTypeController;

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

// Route::get('/', function () {
//     return view('welcome');
// });

// Route::get('dashboard', [HomeController::class, 'index'])->name('home');

Route::get('/', [AuthController::class, 'index'])->name('get-auth');
Route::post('/', [AuthController::class, 'process_login'])->name('post-auth');
Route::get('logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'admin',  'middleware' => 'auth'], function()
{
    Route::get('dashboard', [HomeController::class, 'index'])->name('dashboard');

	Route::get('user', [UserController::class, 'index'])->name('list-user');
	Route::get('create-user', [UserController::class, 'create'])->name('create-user');
	Route::post('create-user', [UserController::class, 'store'])->name('save-user');
	Route::get('edit-user/{id}', [UserController::class, 'edit'])->name('edit-user');
	Route::post('edit-user/{id}', [UserController::class, 'update'])->name('update-user');
	Route::get('delete-user/{id}', [UserController::class, 'destroy'])->name('delete-user');

	Route::get('menu', [MenuController::class, 'index'])->name('list-menu');
	Route::get('create-menu', [MenuController::class, 'create'])->name('create-menu');
	Route::post('create-menu', [MenuController::class, 'store'])->name('save-menu');
	Route::get('edit-menu/{id}', [MenuController::class, 'edit'])->name('edit-menu');
	Route::post('edit-menu/{id}', [MenuController::class, 'update'])->name('update-menu');
	Route::get('delete-menu/{id}', [MenuController::class, 'destroy'])->name('delete-menu');

	Route::get('branch', [BranchController::class, 'index'])->name('list-branch');
	Route::get('create-branch', [BranchController::class, 'create'])->name('create-branch');
	Route::post('create-branch', [BranchController::class, 'store'])->name('save-branch');
	Route::get('edit-branch/{id}', [BranchController::class, 'edit'])->name('edit-branch');
	Route::post('edit-branch/{id}', [BranchController::class, 'update'])->name('update-branch');
	Route::get('delete-branch/{id}', [BranchController::class, 'destroy'])->name('delete-branch');

	Route::get('department', [DepartementController::class, 'index'])->name('list-department');
	Route::get('create-department', [DepartementController::class, 'create'])->name('create-department');
	Route::post('create-department', [DepartementController::class, 'store'])->name('save-department');
	Route::get('edit-department/{id}', [DepartementController::class, 'edit'])->name('edit-department');
	Route::post('edit-department/{id}', [DepartementController::class, 'update'])->name('update-department');
	Route::get('delete-department/{id}', [DepartementController::class, 'destroy'])->name('delete-department');

	Route::get('designation', [DesignationController::class, 'index'])->name('list-designation');
	Route::get('create-designation', [DesignationController::class, 'create'])->name('create-designation');
	Route::post('create-designation', [DesignationController::class, 'store'])->name('save-designation');
	Route::get('edit-designation/{id}', [DesignationController::class, 'edit'])->name('edit-designation');
	Route::post('edit-designation/{id}', [DesignationController::class, 'update'])->name('update-designation');
	Route::get('delete-designation/{id}', [DesignationController::class, 'destroy'])->name('delete-designation');

	Route::get('employee', [EmployeeController::class, 'index'])->name('list-employee');
	Route::get('create-employee', [EmployeeController::class, 'create'])->name('create-employee');
	Route::post('create-employee', [EmployeeController::class, 'store'])->name('save-employee');
	Route::get('edit-employee/{id}', [EmployeeController::class, 'edit'])->name('edit-employee');
	Route::post('edit-employee/{id}', [EmployeeController::class, 'update'])->name('update-employee');
	Route::get('delete-employee/{id}', [EmployeeController::class, 'destroy'])->name('delete-employee');

	Route::get('leave', [LeaveController::class, 'index'])->name('list-leave');
	Route::get('create-leave', [LeaveController::class, 'create'])->name('create-leave');
	Route::post('create-leave', [LeaveController::class, 'store'])->name('save-leave');
	Route::get('edit-leave/{id}', [LeaveController::class, 'edit'])->name('edit-leave');
	Route::post('edit-leave/{id}', [LeaveController::class, 'update'])->name('update-leave');
	Route::get('delete-leave/{id}', [LeaveController::class, 'destroy'])->name('delete-leave');	
	Route::get('show-leave/{id}', [LeaveController::class, 'show'])->name('show-leave');
	Route::post('show-leave/{id}', [LeaveController::class, 'changeaction'])->name('changeaction-leave');

	Route::get('leave-type', [LeaveTypeController::class, 'index'])->name('list-leave-type');
	Route::get('create-leave-type', [LeaveTypeController::class, 'create'])->name('create-leave-type');
	Route::post('create-leave-type', [LeaveTypeController::class, 'store'])->name('save-leave-type');
	Route::get('edit-leave-type/{id}', [LeaveTypeController::class, 'edit'])->name('edit-leave-type');
	Route::post('edit-leave-type/{id}', [LeaveTypeController::class, 'update'])->name('update-leave-type');
	Route::get('delete-leave-type/{id}', [LeaveTypeController::class, 'destroy'])->name('delete-leave-type');

	Route::get('user-activity', [HomeController::class, 'logActivityLists'])->name('user-activity');
	Route::get('error-application', [HomeController::class, 'errorApplication'])->name('error-application');

});



// Route::get('error-404', [AuthController::class, 'error404'])->name('error-404');
