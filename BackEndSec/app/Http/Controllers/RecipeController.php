<?php

namespace App\Http\Controllers;

use App\Models\Recipe;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\ValidationException;

class RecipeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Start with the base query builder
        $query = Recipe::query()->with('user');

        // === START: NEW SEARCH LOGIC ===
        // Check if the request has a 'search' input
        if (request('search')) {
            $searchTerm = request('search');
            
            // Add a WHERE clause to filter by title or description
            // The '%' is a wildcard: it matches any character
            $query->where('title', 'like', '%' . $searchTerm . '%')
                  ->orWhere('description', 'like', '%' . $searchTerm . '%');
        }
        // === END: NEW SEARCH LOGIC ===

        // Get the results, ordered by newest first
        $recipes = $query->latest()->get(); 

        return view('recipes.index', [
            'recipes' => $recipes
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('recipes.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'steps' => 'required|string',
            'recipeImage' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // 2. Handle the file upload
        $path = $request->file('recipeImage')->store('recipe-images', 'public');

        // 3. Create and save the new recipe
        $recipe = Recipe::create([
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'ingredients' => $validatedData['ingredients'],
            'steps' => $validatedData['steps'],
            'image_path' => $path,
            'user_id' => Auth::id(),
        ]);

        // 4. Redirect to the new recipe's detail page
        return redirect()->route('recipes.show', $recipe->id)
            ->with('success', 'Recipe created successfully!'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(Recipe $recipe) // Laravel automatically finds the recipe by its ID
    {
        $recipe->loadMissing('user');

        return view('recipes.show', [
            'recipe' => $recipe
        ]);
    }
    

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Recipe $recipe) // Changed $id to Recipe $recipe for automatic binding
    {
        return view('recipes.edit', [
            'recipe' => $recipe
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Recipe $recipe)
    {
        // 1. Validate (Notice: image is 'nullable' here, so it's optional)
        $validatedData = $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'ingredients' => 'required|string',
            'steps' => 'required|string',
            'recipeImage' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        // 2. Get all data except the image first
        $dataToUpdate = [
            'title' => $validatedData['title'],
            'description' => $validatedData['description'],
            'ingredients' => $validatedData['ingredients'],
            'steps' => $validatedData['steps'],
        ];

        // 3. Check if user uploaded a NEW image
        if ($request->hasFile('recipeImage')) {
            
            // 4. Delete the OLD image from storage
            if ($recipe->image_path) {
                Storage::delete('public/' . $recipe->image_path);
            }

            // 5. Store the NEW image
            $path = $request->file('recipeImage')->store('recipe-images', 'public');
            
            // 6. Add the new image path to the update array
            $dataToUpdate['image_path'] = $path;
        }

        // 7. Update the database record
        $recipe->update($dataToUpdate);

        // 8. Redirect back to the detail page
        return redirect()->route('recipes.show', $recipe->id)
            ->with('success', 'Recipe updated successfully!');
    }

    /**
     * Append additional content to an existing recipe.
     */
    public function append(Request $request, Recipe $recipe)
    {
        $validated = $request->validate([
            'description_append' => 'nullable|string',
            'ingredients_append' => 'nullable|string',
            'steps_append' => 'nullable|string',
        ]);

        // Ensure at least one field is provided
        if (empty(array_filter($validated))) {
            throw ValidationException::withMessages([
                'description_append' => 'Add at least one field to append to the recipe.',
            ]);
        }

        if (!empty($validated['description_append'])) {
            $recipe->description = trim($recipe->description . "\n\n" . $validated['description_append']);
        }

        if (!empty($validated['ingredients_append'])) {
            $recipe->ingredients = trim($recipe->ingredients . "\n" . $validated['ingredients_append']);
        }

        if (!empty($validated['steps_append'])) {
            $recipe->steps = trim($recipe->steps . "\n" . $validated['steps_append']);
        }

        $recipe->save();

        return redirect()->route('recipes.show', $recipe->id)
            ->with('success', 'Recipe updated with your additions!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Recipe $recipe)
    {
        $user = Auth::user();

        abort_if(is_null($user), 403, 'You must be logged in to delete recipes.');

        $isOwner = $recipe->user_id === $user->id;
        $isAdmin = $user->role === 'admin';

        abort_if(! $isOwner && ! $isAdmin, 403, 'You are not allowed to delete this recipe.');

        // Optional: Delete image when deleting recipe
        if ($recipe->image_path) {
            Storage::delete('public/' . $recipe->image_path);
        }
        
        $recipe->delete();

        return redirect()->route('recipes.index')
            ->with('success', 'Recipe deleted successfully');
    }
}