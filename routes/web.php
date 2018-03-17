<?php

Auth::routes();

$router->get('/', 'HomeController@index')->name('home');
$router->get('/dashboard', 'DashboardController@index')->name('dashboard');
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
