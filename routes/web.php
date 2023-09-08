<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\LiveChatController;
use App\Http\Controllers\MediaController;
use App\Http\Controllers\MessageController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\TemplateController;
use Illuminate\Support\Facades\Route;


Route::get('test', [CampaignController::class, 'message']);
Route::get('fb_incoming', [MessageController::class, 'incoming_verify']);
Route::post('fb_incoming', [MessageController::class, 'incoming_message']);
Route::middleware('auth')->group(function () {
    Route::view('/', 'pages.home')->name('dashboard');
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::group(['prefix' => 'template', 'as' => 'template.'], function () {
        Route::view('create', 'pages.templates.create')->name('create');
        Route::post('store', [TemplateController::class, 'store'])->name('store');
        Route::get('/', [TemplateController::class, 'index'])->name('index');
    });
    Route::group(['prefix' => 'campaign', 'as' => 'campaign.'], function () {
        Route::get('create', [CampaignController::class, 'create'])->name('create');
        Route::post('store', [CampaignController::class, 'store'])->name('store');
        Route::get('/', [CampaignController::class, 'index'])->name('index');
    });
    Route::group(['prefix' => 'media', 'as' => 'media.'], function () {
        Route::post('store', [MediaController::class, 'store'])->name('store');
        Route::post('recent/media/upload/get', [MediaController::class, 'getMedia'])->name('recent.uploaded');
        Route::post('all/media/upload/get', [MediaController::class, 'getMediaAll'])->name('all.uploaded');
        Route::post('ajax/delete', [MediaController::class, 'deleteMedia'])->name('ajax.delete');
    });
    Route::post('/template/store', [TemplateController::class, 'store'])->name('template.store');
    Route::get('/template/get_data', [TemplateController::class, 'getTemplate'])->name('template.get');
    Route::prefix('liveChat')->group(function () {
        Route::get('/index', [LiveChatController::class, 'index'])->name('liveChat.index');
    });
});

require __DIR__ . '/auth.php';
