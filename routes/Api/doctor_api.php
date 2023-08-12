<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'doctor', 'namespace' => 'Doctor'], function () {

    /* ---------------------- Authentication -------------------*/
    Route::post('login','AuthController@login');
    Route::get('categories', 'AuthController@categories');
    Route::get('degrees', 'AuthController@degrees');
    Route::post('register', 'AuthController@register');

    Route::group(['middleware' => 'all_guards:doctor_api'], function () {
        Route::get('profile', 'AuthController@profile');
        Route::post('update_profile', 'AuthController@update_profile');
        Route::post('logout', 'AuthController@logout');


        /* ---------------------- reservations -------------------*/
        Route::get('reservations', 'ReservationController@reservations');
        Route::get('following', 'FollowingController@following')->name('following');
        Route::get('chats', 'FollowingController@chats');
        Route::post('send_chat', 'FollowingController@send_chat')->name('send_chat');
        Route::post('store_reservation_report', 'FollowingController@store_reservation_report')->name('store_reservation_report');
        Route::get('get_reservation_xray', 'FollowingController@get_reservation_xray')->name('get_reservation_xray');

        /* ---------------------- notifications -------------------*/
        Route::get('notifications', 'NotificationController@notifications');
        Route::get('getNotificationsCount', 'NotificationController@getNotificationsCount');

        /* ---------------------- favourites -------------------*/
        Route::post('add_delete_favourite', 'FavouriteController@add_delete_favourite');
        Route::get('favourites', 'FavouriteController@index');

        /* ---------------------- contact -------------------*/
        Route::post('contact_with_user','ContactController@contact_with_user');




    });
});
