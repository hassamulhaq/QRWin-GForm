<?php

use App\Http\Controllers\Admin\PermissionController;
use App\Http\Controllers\Admin\RoleController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Webhook\v1\WebhookController;
use Illuminate\Support\Facades\Route;

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
    return view('welcome');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');
});

Route::middleware(['auth', 'role:admin'])->name('admin.')
    ->prefix('admin')->group(function () {
        Route::get('/', [IndexController::class, 'index'])->name('index');
        Route::resource('/roles', RoleController::class);
        Route::post('/roles/{role}/permissions', [RoleController::class, 'givePermission'])->name('roles.permissions');
        Route::delete('/roles/{role}/permissions/{permission}', [RoleController::class, 'revokePermission'])->name('roles.permissions.revoke');
        Route::resource('/permissions', PermissionController::class);
        Route::post('/permissions/{permission}/roles', [PermissionController::class, 'assignRole'])->name('permissions.roles');
        Route::delete('/permissions/{permission}/roles/{role}', [PermissionController::class, 'removeRole'])->name('permissions.roles.remove');
        Route::get('/users', [UserController::class, 'index'])->name('users.index');
        Route::get('/users/{user}', [UserController::class, 'show'])->name('users.show');
        Route::delete('/users/{user}', [UserController::class, 'destroy'])->name('users.destroy');
        Route::post('/users/{user}/roles', [UserController::class, 'assignRole'])->name('users.roles');
        Route::delete('/users/{user}/roles/{role}', [UserController::class, 'removeRole'])->name('users.roles.remove');
        Route::post('/users/{user}/permissions', [UserController::class, 'givePermission'])->name('users.permissions');
        Route::delete('/users/{user}/permissions/{permission}', [UserController::class, 'revokePermission'])->name('users.permissions.revoke');
    });

Route::middleware(['auth'])
    ->name('admin.')
    ->prefix('admin')
    ->group(function () {
        Route::get('/documents/', [\App\Http\Controllers\DocumentController::class, 'index'])->name('documents.index');
        Route::get('/documents/create', [\App\Http\Controllers\DocumentController::class, 'create'])->name('documents.create');
        Route::get('/documents/{document}/view', [\App\Http\Controllers\DocumentController::class, 'show'])->name('documents.show');
        Route::get('/documents/{document}/edit', [\App\Http\Controllers\DocumentController::class, 'show'])->name('documents.edit');
        Route::post('/documents/', [\App\Http\Controllers\DocumentController::class, 'store'])->name('documents.store');
        Route::delete('/documents/{document}', [\App\Http\Controllers\DocumentController::class, 'destroy'])->name('documents.destroy');
        Route::get('/media/{media_item}/download/{password?}', [\App\Http\Controllers\MediaController::class, 'secureDownload'])->name('media.download');

        Route::name('qrcode.')
            ->prefix('qrcode')
            ->group(function () {
                Route::get('/', [\App\Http\Controllers\QrCodeController::class, 'index'])->name('index');
            });
    });

Route::name('qrcode.')
    ->prefix('qrcode')
    ->group(function () {
        Route::get('/scan/', [\App\Http\Controllers\QrCodeController::class, 'scan'])->name('scan');
    });

// webhook/* excluded from csrf middleware validation
Route::name('webhook.')
    ->prefix('webhook/v1')
    ->group(function () {
        Route::post('/gform/', [WebhookController::class, 'handleGoogleFormWebhook'])->name('gform');
    });
