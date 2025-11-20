<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapur Rasa - Edit Recipe</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Georgia:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/create_page_styles.css') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body class="create-page-body">

    <header class="create-navbar">
        <div class="logo">Edit Recipe</div>

        <button class="create-btn" type="button" onclick="document.getElementById('recipe-form-id').submit();">
            Save Changes
        </button>
    </header>

    <main class="create-container">

        <div class="back-link">
            <button type="button" onclick="window.location.href='{{ url()->previous() }}'">
                &larr; Back
            </button>
        </div>

        <form class="recipe-form" id="recipe-form-id" action="{{ route('recipes.update', $recipe) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
            <div class="upload-column">

                <label for="recipe-file" class="file-upload-box" id="preview-box"
                    style="{{ $recipe->image_path ? 'background-image:url(' . asset('storage/' . $recipe->image_path) . '); background-size:cover; background-position:center; border:none;' : '' }}">
                    <span class="plus-icon" id="icon-plus" style="{{ $recipe->image_path ? 'display:none;' : '' }}">+</span>
                    <span class="choose-text" id="text-choose" style="{{ $recipe->image_path ? 'display:none;' : '' }}">Choose a file</span>
                </label>

                <input
                    type="file"
                    id="recipe-file"
                    name="recipeImage"
                    accept="image/*"
                    onchange="if(this.files && this.files[0]) {
                        var reader = new FileReader();
                        reader.onload = function(e) {
                            document.getElementById('preview-box').style.backgroundImage = 'url('+e.target.result+')';
                            document.getElementById('preview-box').style.backgroundSize = 'cover';
                            document.getElementById('preview-box').style.border = 'none';
                            document.getElementById('icon-plus').style.display = 'none';
                            document.getElementById('text-choose').style.display = 'none';
                        };
                        reader.readAsDataURL(this.files[0]);
                    }"
                >

                <small style="display:block; margin-top:8px; color:#666;">Upload a new image to replace the current one (optional).</small>
                @error('recipeImage')
                    <span style="color: red; font-size: 0.8rem; margin-top: 5px; display: block;">{{ $message }}</span>
                @enderror
            </div>

            <div class="input-column">

                <label for="recipe-title">Add a title</label>
                <input type="text" id="recipe-title" name="title" value="{{ old('title', $recipe->title) }}" required>
                @error('title')
                    <span style="color: red; font-size: 0.8rem;">{{ $message }}</span>
                @enderror

                <label for="recipe-description">Description</label>
                <textarea id="recipe-description" name="description" rows="3" required>{{ old('description', $recipe->description) }}</textarea>
                @error('description')
                    <span style="color: red; font-size: 0.8rem;">{{ $message }}</span>
                @enderror

                <label for="recipe-resep">Resep</label>
                <textarea id="recipe-resep" name="ingredients" rows="5" required>{{ old('ingredients', $recipe->ingredients) }}</textarea>
                @error('ingredients')
                    <span style="color: red; font-size: 0.8rem;">{{ $message }}</span>
                @enderror

                <label for="recipe-langkah">Langkah-langkah</label>
                <textarea id="recipe-langkah" name="steps" rows="6" required>{{ old('steps', $recipe->steps) }}</textarea>
                @error('steps')
                    <span style="color: red; font-size: 0.8rem;">{{ $message }}</span>
                @enderror

            </div>

        </form>
    </main>

</body>
</html>
