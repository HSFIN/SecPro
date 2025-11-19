<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapur Rasa - Fried Chicken</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Georgia:wght@400;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/detail_resep_styles.css') }}">
</head>
<body class="detail-page-body">

    <header class="navbar">
        <img src="{{ asset('foto/logokecil.png') }}" alt="Logo Dapur Rasa" class="logo">

        <div class="right-side">
            <form action="{{ url('/search') }}" method="get" class="search-form">
                <input type="text" name="q" placeholder="Cari Resep...">
                <button type="submit">
                    <img src="{{ asset('foto/search.png') }}" alt="Search Icon">
                </button>
            </form>

            <button class="profile-btn" onclick='window.location.href="{{ url("/profile") }}"'>
                <img src="{{ asset('foto/logoprofile.png') }}" alt="Profile Icon">
            </button>
        </div>
    </header>

    <main class="recipe-detail-container">
        <div class="image-column">
            <img src="{{ asset('foto/examplefood.jpg') }}" alt="Fried Chicken" class="recipe-image">
            
            <div class="gradient-area">
                <button class="back-btn" onclick="history.back()">
                    &larr; Back
                </button>
            </div>
        </div>

        <div class="content-column">
            <h1 class="recipe-title">RECIPE EXAMPLE</h1>
            
            <p class="recipe-description">
                This recipe offers a simple yet flavorful approach to home cooking, combining easy-to-follow steps with ingredients that are accessible for everyday meals. Designed to be beginner-friendly while still delivering a comforting and satisfying taste, it provides a balanced blend of textures and aromas that make it suitable for any occasion. Whether you're experimenting in the kitchen or looking for a quick dish to enjoy, this recipe serves as a reliable and delicious choice.
            </p>
            
            <section class="ingredients-section">
                <h2>RECIPE:</h2>
                <ul class="ingredients-list">
                    <li>Chicken Thighs - 500g, cut into bite-sized pieces</li>
                    <li>Garlic Cloves - 4 cloves, finely minced</li>
                    <li>Honey - 3 tablespoons</li>
                    <li>Soy Sauce - 2 tablespoons</li>
                    <li>Cornstarch - 4 tablespoons</li>
                    <li>All-Purpose Flour - 3 tablespoons</li>
                    <li>Black Pepper - 1 teaspoon</li>
                    <li>Salt - 1 teaspoon</li>
                    <li>Cooking Oil - enough for deep frying</li>
                    <li>Sesame Seeds - 1 tablespoon, for garnish</li>
                </ul>
            </section>
            
            <section class="steps-section">
                <h2>How to Cook:</h2>
                <div class="steps-content">
                    <p>
                        A recipe is more than just a list of ingredients; it serves as a structured guide that walks you through the process of creating a dish from start to finish. Each recipe outlines the essential components you’ll need, including ingredients, quantities, and tools, ensuring that you’re fully prepared before you begin cooking. With clear and organized steps, a recipe helps both beginners and experienced cooks navigate the process with confidence. It functions as a roadmap that leads you toward a successful and flavorful result.
                    </p>
                    <p>
                        The instructions in a recipe are carefully arranged to make the cooking process easier to understand and follow. Starting from basic preparation techniques such as washing, chopping, or measuring, the steps then progress into more detailed directions for cooking, mixing, or assembling. These instructions are designed to maintain clarity, ensuring that every movement in the kitchen leads you one step closer to completing the dish as intended. By following each step in order, you minimize mistakes and ensure the dish develops the right texture, aroma, and flavor.
                    <p>
                        Recipes also play an important role in maintaining consistency. When a set of instructions is followed precisely, the dish can be recreated with the same quality every time — regardless of who prepares it. This consistency is especially important for those who want to improve their cooking skills, as it offers a reliable foundation to experiment with. Through repeated practice, cooks can understand how ingredients interact, how flavors develop, and how timing and technique influence the final result.
                    </p>
                    <p>
                       Beyond providing structure, recipes also help foster creativity in the kitchen. Once you understand the basic steps and the purpose behind each stage, you can start making small adjustments according to your preferences. Whether it’s adding more seasoning, substituting ingredients, or modifying the cooking method, a recipe gives you the freedom to personalize a dish while still maintaining its core structure. This balance between guidance and experimentation is what makes cooking both accessible and enjoyable.
                    <p>
                       Ultimately, a recipe is a tool that empowers you to create something delicious with confidence and clarity. It offers a reliable starting point for beginners while also serving as a flexible framework for more advanced cooks. By providing step-by-step instructions, consistent measurements, and helpful details, recipes make the process of preparing food more approachable and rewarding. No matter what you’re making, a well-written recipe ensures that every dish has the potential to turn out beautifully.
                </div>
            </section>
        </div>
    </main>

</body>
</html>
