<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'api/v1'], function () use ($router) {
    $router->get('/', function () use ($router) {
            return json_encode(["message" => "Welcome to Newsletter subscription API."]);
    });

    $router->post('register', [
            'uses' => 'AuthController@register',
            'as'   => 'register',
    ]);

    $router->post('login', [
            'uses' => 'AuthController@authenticate',
            'as'   => 'login',
    ]);

    $router->post('subscription', [
            'uses' => 'SubscriptionController@subscribe',
            'as'   => 'subscribe',
    ]);

    $router->delete('subscription/{id}', [
            'uses' => 'SubscriptionController@deleteSubscription',
            'as'   => 'subscribe',
    ]);

    $router->get('confirm/subscription/{confirmationId}', [
            'uses' => 'SubscriptionController@confirmSubscription',
            'as'   => 'confirm-subscribe',
    ]);

    $router->get('newsletters', [
            'uses' => 'NewsletterController@fetchNewsletters',
            'as'   => 'fetch-newsletter',
    ]);


});


$router->group(['prefix' => 'api/v1', 'middleware' => 'admin.user'], function () use ($router) {
    
    $router->post('new/admin', [
        'uses' => 'AuthController@createAdminUser',
    ]);

    $router->post('newsletter', [
        'uses' => 'NewsletterController@createNewsletter',
    ]);

    $router->delete('newsletter/{id}', [
        'uses' => 'NewsletterController@deleteNewsletter',
    ]);
});