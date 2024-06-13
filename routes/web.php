<?php

use Illuminate\Support\Facades\Route;

Route::redirect('/login', '/auth/login')->name('login');
Route::redirect('/', '/dashboard')->name('home');

Route::namespace('App\Livewire\Auth')
        ->prefix('auth')
        ->group(function () {
        Route::get('/login', Login::class)->name('auth.login')->middleware('guest');
        Route::get('/register', Register::class)->name('auth.register')->middleware('guest');
        Route::get('/forgot-password', ForgotPassword::class)->name('password.forgot')->middleware('guest');
        Route::get('/reset-password', ResetPassword::class)->name('password.reset')->middleware('guest');
        //Route::get('/email-verify', EmailVerify::class)->name('verification.notice')->middleware('auth');
});


Route::middleware(['auth'])
        ->namespace('App\Livewire\Tenant')
        ->group(function () {

        Route::get('/dashboard',  Dashboard\DashboardIndex::class)->name('home');
                
        Route::get('/roles', Roles\RolesIndex::class)->name('roles.index')->can('roles.index');
        Route::get('/roles/create', Roles\RolesCreate::class)->name('roles.store')->can('roles.store');
        Route::get('/roles/{role}/edit', Roles\RolesEdit::class)->name('roles.update')->can('roles.update');
        Route::get('/roles/{role}', Roles\RolesShow::class)->name('roles.show')->can('roles.show');
                
        Route::get('/users', Users\UsersIndex::class)->name('users.index')->can('users.index');
        Route::get('/users/create', Users\UsersCreate::class)->name('users.store')->can('users.store');
        Route::get('/users/{user}/edit', Users\UsersEdit::class)->name('users.update')->can('users.update');
        Route::get('/users/{user}', Users\UsersShow::class)->name('users.show')->can('users.show');
    
        Route::get('/settings', Settings\SettingsIndex::class)->name('settings.index')->can('settings');
        Route::get('/profile', Profile\ProfileIndex::class)->name('profile.index');
});


