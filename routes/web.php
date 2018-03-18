<?php

Auth::routes();

$router->get('/', 'HomeController@index')->name('home');
$router->get('/dashboard', 'DashboardController@index')->name('dashboard')->middleware('auth');
$router->namespace('Account')
       ->middleware('auth')
       ->prefix('account')
       ->as('account.')
       ->group(function ($router) {
           $router->get('/', 'AccountController@index')->name('index');

           $router->get('/profile', 'ProfileController@index')->name('profile.index');
           $router->post('/profile', 'ProfileController@store')->name('profile.store');

           $router->get('/password', 'PasswordController@index')->name('password.index');
           $router->post('/password', 'PasswordController@store')->name('password.store');
       });

$router->namespace('Auth')
       ->prefix('activation')
       ->group(function ($router) {
           $router->get('/resend', 'ActivationResendController@index')
                  ->name('activation.resend');
           $router->post('/resend', 'ActivationResendController@store')
                  ->name('activation.resend.store');
           $router->get('/{token}', 'ActivationController@activate')
                  ->name('activation.activate')
                  ->middleware('guest', 'confirmation_token.expired:/');
       });
