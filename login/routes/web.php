<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\RecipeController;

Route::get('/', function () {
    return view('index');
});

Route::get('/about', function () {
    return view('about');
});

Route::get('/comment', function () {
    return view('comment');
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

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/login', [AuthManager::class,'login'])->name('login');
Route::post('/login', [AuthManager::class,'loginPost'])->name('login.post');
Route::get('/registration', [AuthManager::class,'registration'])->name('registration');
Route::post('/registration', [AuthManager::class,'registrationPost'])->name('registration.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');
Route::resource('recipes', RecipeController::class);
Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');