<?php

use Illuminate\Support\Facades\Route;

Route::get('/mainpage', function () {
    
    $weeklyRecipes = [
        [
            'title' => 'Double Bacon Cheeseburger',
            'image' => 'foto/double_bacon_cheeseburger.png',
            'description' => 'Nikmati sensasi daging bacon ganda dengan keju meleleh.',
            'link' => '/detailresep' 
        ],
        [
            'title' => 'Mango Shaved Ice Cream',
            'image' => 'foto/mango_shaved_ice_cream.png',
            'description' => 'Segarnya mangga dipadukan dengan es serut lembut.',
            'link' => '/detailresep'
        ]
    ];
    return view('mainPage', compact('weeklyRecipes'));
});

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/createpage', function () {
    return view('createPage');
});

Route::get('/detailresep', function () {
    return view('detailResep');
});

Route::get('/editprofile', function () {
    return view('editProfile');
});

Route::get('/forgetpass', function () {
    return view('forgetPass');
});

Route::get('/forgetpass2', function () {
    return view('forgetPass2');
});

Route::get('/login', function () {
    return view('login');
});
Route::get('/profile', function () {
    return view('profile');
});

Route::get('/register', function () {
    return view('register');
});
