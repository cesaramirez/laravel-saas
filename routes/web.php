<?php

Auth::routes();

$router->get('/', 'HomeController@index')->name('home');
$router->get('/dashboard', 'DashboardController@index')
      ->name('dashboard')
      ->middleware(['auth', 'subscription.active']);

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

           $router->namespace('Subscription')
                  ->as('subscription.')
                  ->prefix('subscription')
                  ->group(function ($router) {
                      $router->middleware('subscription.notcancelled')
                             ->group(function ($router) {
                                 $router->get('/cancel', 'SubscriptionCancelController@index')
                                        ->name('cancel');
                                 $router->post('/cancel', 'SubscriptionCancelController@store')
                                        ->name('cancel.store');
                             });

                      $router->middleware('subscription.cancelled')
                             ->group(function ($router) {
                                 $router->get('/resume', 'SubscriptionResumeController@index')
                                        ->name('resume');
                                 $router->post('/resume', 'SubscriptionResumeController@store')
                                        ->name('resume.store');
                             });

                      $router->middleware('subscription.notcancelled')
                             ->group(function ($router) {
                                 $router->get('/swap', 'SubscriptionSwapController@index')
                                        ->name('swap');
                             });
                      $router->middleware('subscription.customer')
                             ->group(function ($router) {
                                 $router->get('/card', 'SubscriptionCardController@index')
                                        ->name('card');
                                 $router->post('/card', 'SubscriptionCardController@store')
                                        ->name('card.store');
                             });
                  });
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

$router->namespace('Subscription')
       ->prefix('plans')
       ->as('plans.')
       ->middleware('subscription.inactive')
       ->group(function ($router) {
           $router->get('/', 'PlansController@index')->name('index');
           $router->get('/teams', 'PlanTeamsController@index')->name('teams.index');
       });

$router->namespace('Subscription')
       ->prefix('subscription')
       ->as('subscription.')
       ->middleware(['auth.register', 'subscription.inactive'])
       ->group(function ($router) {
           $router->get('/{plan?}', 'SubscriptionsController@index')->name('index');
           $router->post('/', 'SubscriptionsController@store')->name('store');
       });
