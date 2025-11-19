<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthManager;
use App\Http\Controllers\RecipeController;
use App\Http\Controllers\CommentController;

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

Route::get('/forgetpass', function () {
    return view('forgetPass');
});

Route::get('/forgetpass2', function () {
    return view('forgetPass2');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/profile', function () {
    return view('profile');
});

Route::get('/contact', function () {
    return view('contact');
});

Route::get('/mainpage', function () {
    return view('mainPage');
})->name('mainpage');

Route::get('/login', [AuthManager::class,'login'])->name('login');
Route::post('/login', [AuthManager::class,'loginPost'])->name('login.post');
Route::get('/registration', [AuthManager::class,'registration'])->name('registration');
Route::post('/registration', [AuthManager::class,'registrationPost'])->name('registration.post');
Route::get('/logout', [AuthManager::class, 'logout'])->name('logout');
Route::resource('recipes', RecipeController::class);
Route::get('/recipes/create', [RecipeController::class, 'create'])->name('recipes.create');

Route::post('/recipes/{recipe}/comments', [CommentController::class, 'store'])
    ->name('comments.store')
    ->middleware('auth');

Route::delete('/comments/{comment}', [CommentController::class, 'destroy'])
    ->name('comments.destroy')
    ->middleware('auth');

// Route::get('/mainpage', function () {
    
//     $weeklyRecipes = [
//         [
//             'title' => 'Double Bacon Cheeseburger',
//             'image' => 'foto/double_bacon_cheeseburger.png',
//             'description' => 'Nikmati sensasi daging bacon ganda dengan keju meleleh.',
//             'link' => '/detailresep' 
//         ],
//         [
//             'title' => 'Mango Shaved Ice Cream',
//             'image' => 'foto/mango_shaved_ice_cream.png',
//             'description' => 'Segarnya mangga dipadukan dengan es serut lembut.',
//             'link' => '/detailresep'
//         ]
//     ];
//     return view('mainPage', compact('weeklyRecipes'));
// });

// Route::put('/editprofile', function (Request $request) {
//     $user = Auth::user();


//     $request->validate([
        
        
//         'email' => 'required|email|max:255|unique:users,email,' . $user->id,
//         'phone' => 'nullable|string|max:15', 
//     ]);

  
//     $user->name = $request->name;
//     $user->email = $request->email;
    
//     $user->save();
//     return back()->with('success', 'Profile updated successfully!');
// })->name('profile.update');