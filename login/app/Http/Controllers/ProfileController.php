<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function show()
    {
        $user = Auth::user();
        $recipes = $user?->recipes()->latest()->get() ?? collect();

        return view('profile', [
            'user' => $user,
            'recipes' => $recipes,
        ]);
    }
}
