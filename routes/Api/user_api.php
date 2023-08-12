<?php

use Illuminate\Support\Facades\Route;

Route::group(['prefix' => 'user', 'namespace' => 'User'], function () {

    /* ---------------------- Authentication -------------------*/
    Route::post('login','AuthController@login');
    Route::post('register', 'AuthController@register');

    /* ---------------------- Home -------------------*/
    Route::get('slider','HomeController@slider');
    Route::get('all_categories', 'HomeController@all_categories');
    Route::get('category_search', 'HomeController@category_search');

    /* ---------------------- Doctors -------------------*/
    Route::get('doctors','DoctorController@index');
    Route::get('one_doctor', 'DoctorController@one_doctor');

    Route::group(['middleware' => 'all_guards:user_api'], function () {
        Route::get('profile', 'AuthController@profile');
        Route::post('update_profile', 'AuthController@update_profile');
        Route::post('logout', 'AuthController@logout');


        /* ---------------------- reservations -------------------*/
        Route::post('store_reservation', 'ReservationController@store_reservation');
        Route::get('reservations', 'ReservationController@reservations');
        Route::get('chats', 'FollowingController@chats');
        Route::post('store_following', 'FollowingController@store_following')->name('store_following');
        Route::post('send_chat', 'FollowingController@send_chat')->name('send_chat');
        Route::post('store_reservation_xray', 'FollowingController@store_reservation_xray')->name('store_reservation_xray');

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
