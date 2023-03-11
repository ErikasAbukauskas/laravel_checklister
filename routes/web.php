<?php

use App\Http\Controllers;
use App\Http\Controllers\User;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PageController;
use App\Http\Controllers\Admin\TaskController;
use App\Http\Controllers\Admin\UserController;
use App\Http\Controllers\Admin\ChecklistController;
use App\Http\Controllers\Admin\ChecklistGroupController;

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

Route::redirect('/', 'welcome');

Auth::routes();

Route::group(['middleware' => ['auth', 'save_last_action_timestamp']], function() {

    Route::get('welcome', [Controllers\PageController::class, 'welcome'])->name('welcome');
    Route::get('consultation', [Controllers\PageController::class, 'consultation'])->name('consultation');
    Route::get('checklists/{checklist}', [User\ChecklistController::class, 'show'])->name('users.checklists.show');

    Route::group(['prefix' => 'admin', 'as' => 'admin.', 'middleware' => 'is_admin'], function() {
        Route::resources([
            'checklist_groups'=> ChecklistGroupController::class,
            'checklist_groups.checklists'=> ChecklistController::class,
            'checklists.tasks'=> TaskController::class,
        ]);
        Route::resource('pages', PageController::class)->only(['edit', 'update']);

        Route::get('users', [UserController::class, 'index'])->name('users.index');
    });
});
