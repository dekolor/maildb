<?php

use App\Http\Controllers\CampaignController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\EmailAddressController;
use App\Http\Controllers\OnboardingController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ProjectSettingsController;
use App\Http\Controllers\ReportsController;
use App\Http\Controllers\SubscribeController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware(['auth', 'verified'])->group(function () {
    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name("dashboard");

    Route::get('/addresses', [EmailAddressController::class, 'list'])->name("address.list");
    Route::get('/addresses/add', [EmailAddressController::class, 'add'])->name("address.add");
    Route::get('/addresses/update/{address}', [EmailAddressController::class, 'update'])->name("address.update");
    Route::post('/addresses/add', [EmailAddressController::class, 'store'])->name("address.store");
    Route::patch('/addresses/patch/{address}', [EmailAddressController::class, 'patch'])->name("address.patch");
    Route::delete('/addresses/delete/{address}', [EmailAddressController::class, 'destroy'])->name("address.destroy");

    Route::get('/categories', [CategoryController::class, 'list'])->name("category.list");
    Route::get('/categories/add', [CategoryController::class, 'add'])->name("category.add");
    Route::post('/categories/add', [CategoryController::class, 'store'])->name("category.store");

    Route::get('/campaigns', [CampaignController::class, 'list'])->name("campaign.list");
    Route::get('/campaigns/add', [CampaignController::class, 'add'])->name("campaign.add");
    Route::post('/campaigns/add', [CampaignController::class, 'store'])->name("campaign.store");
    Route::get('/campaigns/send/{campaign}', [CampaignController::class, 'send'])->name("campaign.send");
    Route::delete('/campaigns/delete/{campaign}', [CampaignController::class, 'destroy'])->name("campaign.destroy");

    Route::get('/onboarding', [OnboardingController::class, 'settings'])->name("onboarding");
    Route::get('/projectsettings', [ProjectSettingsController::class, 'settings'])->name("projectsettings");
    Route::get('/reports', [ReportsController::class, 'list'])->name("reports.list");

    Route::get('/newsletter/subscribe', [SubscribeController::class, 'subscribe'])->name("subscribe");
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
