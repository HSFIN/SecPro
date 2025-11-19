<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapur Rasa - Home</title>
    <link rel="stylesheet" href="./css/style.css"> 
    <link rel="stylesheet" href="./css/main_page.css"> 
</head>
<body class="index-body">

    <header class="navbar">
        <img src="./foto/logokecil.png" alt="Logo Dapur Rasa" class="logo">

        <div class="right-side">
            <form action="./search.html" method="get" class="search-form">
                <input type="text" name="q" placeholder="Cari Resep...">
                <button type="submit">
                    <img src="./foto/search.png" alt="Search Icon">
                </button>
            </form>

            <button class="profile-btn" onclick="window.location.href='{{ url("/profile") }}'">
    <img src="/foto/logoprofile.png" alt="Profile Icon">
</button>

        </div>
    </header>
    
    

    <div class="secondary-nav-bar">
        <nav class="main-nav">
            <ul>
                <li><a href="{{ url('/') }}" class="active">Home</a></li>
<li><a href="{{ url('/about') }}">About</a></li>
<li><a href="{{ url('/contact') }}">Contact</a></li>

            </ul>
        </nav>
    </div>
    
    <main class="main-content-area">
        
        <h2 class="section-banner trending-banner">Trending Now:</h2>
        <section class="trending-now-section">
            <div class="trending-cards-container">
                
                <div class="recipe-card-wrap">
                <a href="/detailresep" class="recipe-card">
                    <img src="foto/soy_fried_chicken.jpg" alt="Soy Fried Chicken" class="card-image">
                    <div class="card-details">
                        <div class="recipe-duration">🕒 30 Minutes</div>
                        <h3>Soy Fried Chicken</h3>
                        <p class="recipe-snippet">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla mollis lectus in, lobortis qui.</p>
                        <div class="card-meta">
                            <div class="author-info">
                                <span class="author-avatar">👤</span>
                                <span>Aurelia Subantono</span>
                                <span class="date">May 18, 2024</span>
                            </div>
                            <div class="stats">
                                <span class="views"></span>
                                <span class="likes"></span>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="comment.html" class="card-comment" aria-label="Comments">💬</a>
                <div class="save-button" aria-label="Save Recipe">bookmark</div>
                </div>
                
                <div class="recipe-card-wrap">
                <a href="/detailresep" class="recipe-card">
                    <img src="foto/pepperoni_pizza.jpeg" alt="Pepperoni Pizza" class="card-image">
                    <div class="card-details">
                        <div class="recipe-duration">🕒 30 Minutes</div>
                        <h3>Pepperoni Pizza</h3>
                        <p class="recipe-snippet">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla mollis lectus in, lobortis qui.</p>
                        <div class="card-meta">
                            <div class="author-info">
                                <span class="author-avatar">👤</span>
                                <span>Aurelia Subantono</span>
                                <span class="date">May 18, 2024</span>
                            </div>
                            <div class="stats">
                                <span class="views"></span>
                                <span class="likes"></span>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="comment.html" class="card-comment" aria-label="Comments">💬</a>
                <div class="save-button" aria-label="Save Recipe">bookmark</div>
                </div>

                <div class="recipe-card-wrap">
                <a href="/detailresep" class="recipe-card">
                    <img src="foto/fried_chicken.jpg" alt="Fried Chicken" class="card-image">
                    <div class="card-details">
                        <div class="recipe-duration">🕒 30 Minutes</div>
                        <h3>Fried Chicken</h3>
                        <p class="recipe-snippet">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla mollis lectus in, lobortis qui.</p>
                        <div class="card-meta">
                            <div class="author-info">
                                <span class="author-avatar">👤</span>
                                <span>Aurelia Subantono</span>
                                <span class="date">May 18, 2024</span>
                            </div>

                            <div class="card-actions">
                                
                            <div class="stats">
                                <span class="views"></span>
                                <span class="likes"></span>
                            </div>
                            </div>
                        </div>
                    </div>
                </a>
                <a href="comment.html" class="card-comment" aria-label="Comments">💬</a>
                <div class="save-button" aria-label="Save Recipe">bookmark</div>
                </div>
                
                <a href="createpage.html" class="add-recipe-card">
                    <div class="plus-icon">+</div>
                    <p>Add your own recipe</p>
                </a>
                
            </div>
        </section>
        
        <div class="recipe-of-the-week-separator">
            <h2 class="separator-title">Recipe of the Week</h2> 
            <span class="date-indicator">18/09</span>
        </div>

        <section class="recipe-of-the-week">
            <div class="recipe-row">
                
                <div class="recipe-highlight">
                    <img src="foto/double_bacon_cheeseburger.png" alt="Double Bacon Cheeseburger" class="highlight-image">
                    <div class="highlight-info">
                        <h3>Double Bacon Cheeseburger</h3>
                        <p class="recipe-snippet">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla mollis lectus in, lobortis qui.</p>
                        <a href="/detailresep" class="read-more-button">Read More</a>
                         <!-- <a href="/detailresep" class="recipe-card"> -->
                    </div>
                </div>

                <div class="recipe-highlight">
                    <img src="foto/mango_shaved_ice_cream.png" alt="Mango Shaved Ice Cream" class="highlight-image">
                    <div class="highlight-info">
                        <h3>Mango Shaved Ice Cream</h3>
                        <p class="recipe-snippet">Lorem ipsum dolor sit amet, consectetuer adipiscing elit. Nulla mollis lectus in, lobortis qui.</p>
                        <a href="/detailresep" class="read-more-button">Read More</a>
                    </div>
                </div>

            </div>
        </section>

    </main>

    <!-- POPUP MODAL -->
<div id="searchModal" class="search-modal">
    <div class="search-modal-content">
        <span class="modal-close">&times;</span>

        <h3 class="modal-title">Find your recipe!</h3>

        <div class="modal-grid">

    <div class="modal-card" onclick="window.location.href='/detailresep'">
        <img src="foto/soy_fried_chicken.jpg" alt="">
        <div class="modal-card-info">
            <h4>Soy Fried Chicken</h4>
            <p>Resep Soy Fried Chicken khas Indonesia dengan bumbu autentik, yang enaklah pokoknya.</p>
        </div>
    </div>

    <div class="modal-card" onclick="window.location.href='/detailresep'">
        <img src="foto/sateayam.jpg" alt="">
        <div class="modal-card-info">
            <h4>Sate Ayam</h4>
            <p>Sate ayam dengan bumbu kacang gurih manis.</p>
        </div>
    </div>

   <div class="modal-card" onclick="window.location.href='/detailresep'">
        <img src="foto/pastacarbonara.jpg" alt="">
        <div class="modal-card-info">
            <h4>Pasta Carbonara</h4>
            <p>Pasta creamy dengan keju dan smoked beef.</p>
        </div>
    </div>

    <div class="modal-card" onclick="window.location.href='/detailresep'">
        <img src="foto/chickenkatsu.jpg" alt="">
        <div class="modal-card-info">
            <h4>Chicken Katsu</h4>
            <p>Daging ayam goreng tepung renyah khas Jepang.</p>
        </div>
    </div>

    <div class="modal-card" onclick="window.location.href='/detailresep'">
        <img src="foto/rendang.jpg" alt="">
        <div class="modal-card-info">
            <h4>Rendang</h4>
            <p>Daging rendang khas Padang, wangi rempah.</p>
        </div>
    </div>

    <div class="modal-card" onclick="window.location.href='/detailresep'">
        <img src="foto/icecream.jpg" alt="">
        <div class="modal-card-info">
            <h4>Ice Cream</h4>
            <p>Dessert manis dan creamy, cocok untuk semua.</p>
        </div>
    </div>

    <div class="modal-card" onclick="window.location.href='/detailresep'">
        <img src="foto/salad.jpg" alt="">
        <div class="modal-card-info">
            <h4>Salad Sayur</h4>
            <p>Sayuran segar dan dressing sehat.</p>
        </div>
    </div>

    <div class="modal-card" onclick="window.location.href='/detailresep'">
        <img src="foto/ramen.jpg" alt="">
        <div class="modal-card-info">
            <h4>Ramen</h4>
            <p>Mie kuah kaldu Jepang yang gurih.</p>
        </div>
    </div>

    <div class="modal-card" onclick="window.location.href='/detailresep'">
        <img src="foto/burger.jpg" alt="">
        <div class="modal-card-info">
            <h4>Burger</h4>
            <p>Roti isi daging juicy dan sayuran segar.</p>
        </div>
    </div>

</div>

    </div>
</div>


<script>
    const modal = document.getElementById("searchModal");
    const searchInput = document.querySelector(".search-form input");
    const closeBtn = document.querySelector(".modal-close");

    // buka modal saat input ditekan
    searchInput.addEventListener("focus", () => {
        modal.style.display = "flex";
    });

    // tombol close
    closeBtn.addEventListener("click", () => {
        modal.style.display = "none";
    });

    // klik area luar modal
    window.addEventListener("click", (e) => {
        if (e.target === modal) {
            modal.style.display = "none";
        }
    });
</script>



</body>
</html>