<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapur Rasa - {{ $recipe->title }}</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Georgia:wght@400;700&display=swap" rel="stylesheet">
    
    <link rel="stylesheet" href="{{ asset('css/style.css') }}"> 
    <link rel="stylesheet" href="{{ asset('css/detail_resep_styles.css') }}"> 
</head>
<body class="detail-page-body">

    @if(session('success'))
        <div style="background: #e6ffed; color: #155724; padding: 10px 15px; margin: 10px; border: 1px solid #c3e6cb; border-radius: 4px;">
            {{ session('success') }}
        </div>
    @endif

    @if($errors->any())
        <div style="background: #fff3cd; color: #856404; padding: 10px 15px; margin: 10px; border: 1px solid #ffeeba; border-radius: 4px;">
            <ul style="margin: 0; padding-left: 18px;">
                @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <header class="navbar">
    <img src="{{ asset('foto/logokecil.png') }}" alt="Logo Dapur Rasa" class="logo">

    <div class="right-side">
        
        @include('partials.search-bar')

        <button class="profile-btn" onclick="window.location.href='#'">
            <img src="{{ asset('foto/logoprofile.png') }}" alt="Profile Icon">
        </button>
    </div>
</header>

    <main class="recipe-detail-container">
        
        <div class="image-column">
            <img src="{{ asset('storage/' . $recipe->image_path) }}" alt="{{ $recipe->title }}" class="recipe-image">
            
            <div class="gradient-area">
                <button class="back-btn" onclick="history.back()">
                    &larr; Back
                </button>
            </div>
        </div>

        <div class="content-column">
            
            <h1 class="recipe-title">{{ $recipe->title }}</h1>
            
            <p class="recipe-description">
                {{ $recipe->description }}
            </p>
            
            <section class="ingredients-section">
                <h2>Resep:</h2>
                <div class="ingredients-list">
                    {!! nl2br(e($recipe->ingredients)) !!}
                </div>
            </section>
            
            <section class="steps-section">
                <h2>Langkah-langkah:</h2>
                <div class="steps-content">
                    {!! nl2br(e($recipe->steps)) !!}
                </div>
            </section>

            <section class="steps-section">
                <h2>Tambahkan Catatan Baru</h2>
                <form action="{{ route('recipes.append', $recipe->id) }}" method="POST" class="append-form" style="display: grid; gap: 10px;">
                    @csrf
                    <label for="description_append">Tambahan Deskripsi</label>
                    <textarea id="description_append" name="description_append" rows="2" placeholder="Tambahkan deskripsi baru"></textarea>

                    <label for="ingredients_append">Tambahan Resep</label>
                    <textarea id="ingredients_append" name="ingredients_append" rows="3" placeholder="Tambahkan bahan baru atau catatan"></textarea>

                    <label for="steps_append">Tambahan Langkah</label>
                    <textarea id="steps_append" name="steps_append" rows="3" placeholder="Tambahkan langkah baru"></textarea>

                    <button type="submit" style="padding: 10px 15px; background-color: #007bff; color: #fff; border: none; border-radius: 6px; cursor: pointer; width: fit-content;">
                        Simpan Tambahan
                    </button>
                </form>
            </section>

            <form action="{{ route('recipes.destroy', $recipe->id) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this recipe?');" style="margin-top: 20px;">
                @csrf
                @method('DELETE')
                <button type="submit" style="padding: 10px 15px; background-color: #dc3545; color: #fff; border: none; border-radius: 6px; cursor: pointer;">
                    Delete Recipe
                </button>
            </form>

        </div>
    </main>

</body>
</html>