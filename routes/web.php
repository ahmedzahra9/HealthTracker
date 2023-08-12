<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::group(['namespace' => 'Web'], function () {
    Route::get('/', 'HomeController@index')->name('welcome');

    // ****************** authentication *****************************
    Route::get('login', 'AuthController@login')->name('login');
    Route::post('user_login', 'AuthController@user_login')->name('user_login');
    Route::get('register', 'AuthController@register')->name('register');
    Route::post('user_register', 'AuthController@user_register')->name('user_register');
    Route::post('doctor_register', 'AuthController@doctor_register')->name('doctor_register');
    Route::get('logout', 'AuthController@logout')->name('logout');

    Route::get('patient_profile/{id}','PatientController@index')->name('patient_profile');

    // ****************** contact *****************************
    Route::view('contact', 'Web.contact')->name('contact');
    Route::post('post_contact_us', 'ContactController@post_contact_us')->name('post_contact_us');

    Route::view('about', 'Web.about')->name('about');
    Route::get('doctors', 'DoctorController@index')->name('doctors');
    Route::get('doctor_profile/{id}', 'DoctorController@doctor_profile')->name('doctor_profile');
    Route::get('hospitals', 'HospitalController@index')->name('hospitals');
    Route::get('hospital_profile/{id}', 'HospitalController@hospital_profile')->name('hospital_profile');
    Route::view('pharmacy', 'Web.pharmacy')->name('pharmacy');

    Route::group(['middleware' => 'auth'], function () {
        Route::get('reservation', 'ReservationController@index')->name('reservation');
        Route::post('store_reservation', 'ReservationController@store_reservation')->name('store_reservation');
        Route::post('update_profile', 'AuthController@update_profile')->name('update_profile');
    });
    Route::group(['middleware' => 'doctor'], function () {
        Route::get('my-appointments','DoctorController@doctor_reservations')->name('my-appointments');
    });

    // ****************** contact *****************************
    Route::get('following/{id}', 'FollowingController@index')->name('following');
    Route::post('store_following', 'FollowingController@store_following')->name('store_following');
    Route::post('send_chat', 'FollowingController@send_chat')->name('send_chat');
    Route::post('store_reservation_xray', 'FollowingController@store_reservation_xray')->name('store_reservation_xray');
    Route::post('store_reservation_report', 'FollowingController@store_reservation_report')->name('store_reservation_report');


});

// ****************** web view *****************************
Route::get('terms', 'WebView\TermsController@terms')->name('terms');
Route::get('privacy', 'WebView\TermsController@privacy')->name('privacy');

Route::get('twilio_test', function (){

// Required if your environment does not handle autoloading
//    require __DIR__ . '/vendor/autoload.php';

// Your Account SID and Auth Token from console.twilio.com
    $sid = "SKcbeb38302d3b43b6f2ac4b4e09f4dd3a";
    $token = "bmAX9FvlwNDkqZx7hmOKExxtPJD26ar2";
    $client = new Twilio\Rest\Client($sid, $token);

// Use the Client to make requests to the Twilio REST API
//    $client->messages->create(
//    // The number you'd like to send the message to
//        '+201554534164',
//        [
//            // A Twilio phone number you purchased at https://console.twilio.com
//            'from' => '+201004834728',
//            // The body of the text message you'd like to send
//            'body' => "Hey Jenny! Good luck on the bar exam!"
//        ]
//    );

// Read TwiML at this URL when a call connects (hold music)
    $call = $client->calls->create(
        '00201554544764',
        // Call this number
        '00201004834728',
        // From a valid Twilio number
        [
            'url' => 'https://twimlets.com/holdmusic?Bucket=com.twilio.music.ambient'
        ]
    );
})->name('twilio_test');

