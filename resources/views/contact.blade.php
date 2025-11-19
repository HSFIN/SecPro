<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dapur Rasa - Contact</title>

    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&family=Playfair+Display:wght@700&display=swap" rel="stylesheet">

    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('css/main_page.css') }}">
    <link rel="stylesheet" href="{{ asset('css/contact_page.css') }}">

    <style>
        /* Inline styles to fix the layout immediately */
        .contact-container {
            min-height: 80vh; /* Full height minus header */
            display: flex;
            justify-content: center;
            align-items: center; /* Center vertically */
            background-color: #f9f9f9; /* Light background */
            padding: 40px 20px;
        }

        .contact-card {
            background: white;
            padding: 40px 60px;
            border-radius: 15px;
            box-shadow: 0 10px 25px rgba(0,0,0,0.05);
            text-align: center;
            max-width: 600px;
            width: 100%;
            border-top: 5px solid #e8a05e; /* Dapur Rasa Orange */
        }

        .contact-title {
            font-family: 'Playfair Display', serif;
            font-size: 2.5rem;
            color: #333;
            margin-bottom: 30px;
            position: relative;
            display: inline-block;
        }

        /* Decorative underline for title */
        .contact-title::after {
            content: '';
            display: block;
            width: 50px;
            height: 3px;
            background-color: #e8a05e;
            margin: 10px auto 0;
        }

        .contact-list {
            list-style: none;
            padding: 0;
            margin: 0;
            font-family: 'Montserrat', sans-serif;
        }

        .contact-list li {
            font-size: 1.1rem;
            color: #555;
            padding: 12px 0;
            border-bottom: 1px solid #eee;
            transition: color 0.3s;
        }

        .contact-list li:last-child {
            border-bottom: none;
        }

        .contact-list li:hover {
            color: #e8a05e;
            font-weight: 600;
        }
    </style>
</head>

<body class="contact-page-body">

    <header class="navbar">
        <img src="{{ asset('foto/logokecil.png') }}" alt="Logo Dapur Rasa" class="logo">

        <div class="right-side">
            <form action="#" method="get" class="search-form">
                <input type="text" name="q" placeholder="Cari Resep...">
                <button type="submit">
                    <img src="{{ asset('foto/search.png') }}" alt="Search Icon">
                </button>
            </form>

            <button class="profile-btn" onclick="window.location.href='{{ url("/profile") }}'">
                <img src="{{ asset('foto/logoprofile.png') }}" alt="Profile Icon">
            </button>
        </div>
    </header>

    <div class="secondary-nav-bar">
        <nav class="main-nav">
            <ul>
                <li><a href="{{ url('/mainpage') }}">Home</a></li>
                <li><a href="{{ url('/about') }}">About</a></li>
                <li><a href="{{ url('/contact') }}" class="active">Contact</a></li>
            </ul>
        </nav>
    </div>

    <main class="contact-container">
        <div class="contact-card">
            <h1 class="contact-title">Kelompok 5</h1>

            <ul class="contact-list">
                <li>Samuel Christian</li>
                <li>Sean Richard</li>
                <li>Aurelio Suhartono</li>
                <li>Andrew Emmanuel William Pakpahan</li>
                <li>Paul Abednego Hasphine</li>
                <li>Justin Raphael Joli Putra</li>
            </ul>
        </div>
    </main>

    <div id="searchModal" class="search-modal" style="display: none;">
        <div class="search-modal-content">
            <span class="modal-close">&times;</span>

            <h3 class="modal-title">Find your recipe!</h3>

            <div class="modal-grid">
                <div class="modal-card" onclick="window.location.href='/detailresep'">
                    <img src="foto/soy_fried_chicken.jpg" alt="">
                    <div class="modal-card-info">
                        <h4>Soy Fried Chicken</h4>
                        <p>Resep Soy Fried Chicken khas Indonesia dengan bumbu autentik.</p>
                    </div>
                </div>
                <div class="modal-card" onclick="window.location.href='/detailresep'">
                    <img src="foto/sateayam.jpg" alt="">
                    <div class="modal-card-info">
                        <h4>Sate Ayam</h4>
                        <p>Sate ayam dengan bumbu kacang gurih manis.</p>
                    </div>
                </div>
                </div>
        </div>
    </div>

    <script>
        const modal = document.getElementById("searchModal");
        const searchInput = document.querySelector(".search-form input");
        const closeBtn = document.querySelector(".modal-close");

        // Buka modal saat input ditekan
        searchInput.addEventListener("focus", () => {
            modal.style.display = "flex";
        });

        // Tombol close
        closeBtn.addEventListener("click", () => {
            modal.style.display = "none";
        });

        // Klik area luar modal
        window.addEventListener("click", (e) => {
            if (e.target === modal) {
                modal.style.display = "none";
            }
        });
    </script>

</body>
</html>
