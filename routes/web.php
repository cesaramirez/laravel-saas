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
       });
