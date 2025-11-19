<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

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

    public function edit()
    {
        $user = Auth::user();

        return view('editProfile', [
            'user' => $user,
        ]);
    }

    public function update(Request $request)
    {
        $user = Auth::user();

        $validated = $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'max:255', 'unique:users,email,' . $user->id],
            'bio' => ['nullable', 'string', function ($attribute, $value, $fail) {
                $wordCount = str_word_count(strip_tags($value));

                if ($wordCount > 250) {
                    $fail('The bio may not be greater than 250 words.');
                }
            }],
            'profile_photo' => ['nullable', 'image', 'max:2048'],
        ]);

        unset($validated['profile_photo']);

        if ($request->hasFile('profile_photo')) {
            if ($user->profile_photo_path) {
                Storage::disk('public')->delete($user->profile_photo_path);
            }

            $validated['profile_photo_path'] = $request->file('profile_photo')->store('profile_photos', 'public');
        }

        $user->update($validated);

        return redirect()->route('profile')->with('success', 'Profile updated successfully!');
    }
}
