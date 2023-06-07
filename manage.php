<?php
    require_once("header.php");
?>

<html>
    <head>
        <link rel="stylesheet" href="css/manage.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.0/css/all.css">
        <script defer src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
        <script defer src="js/manages.js"></script>
    </head>
    <body>
        
    <div class="stats">
        <div class="cards">
            <div class="card">
                <div class="box">
                    <h1 id="num-wines">16</h1>
                    <h3>Wines</h3>
                </div>
                <div class="icon-case">
                    <img src="img/wine-bottle.svg" alt="">
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <h1 id="num-reviews">19</h1>
                    <h3>Reviews</h3>
                </div>
                <div class="icon-case">
                    <img src="img/reviews.svg" alt="">
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <h1 id="rating">6.9</h1>
                    <h3>User Rating</h3>
                </div>
                <div class="icon-case">
                    <img src="img/critic.svg" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="catalogue">
        <div class="add">
            <h1 id="winery-name">Château Margaux Wines </h1>
            <button type="submit" onclick="openPopup()">Add Wine  <i class="fa fa-plus"></i></button>
        </div>
        <div class="wines-container">

        </div>
    </div>

    <div class="popup" id="popup">
        <div class="contactForm">
            <form action="" method="">
                <h2>Adding to catalogue</h2>
                <div class="inputBox">
                    <input type="text" id="name" name="name" required="required">
                    <span>Name of Wine</span>
                </div>        
                        
                <div class="inputBox">
                    <input type="number" min="1800" max="2023" id="year" name="year" required="required">
                    <span>Year</span>
                </div>

                <div class="inputBox">
                    <textarea id="description" name="description" rows="5" cols="30" required="required"></textarea>
                    <span>Type the description...</span>
                </div>

                <div class="inputBox">
                    <input type="text" id="food_pairing" name="food_pairing" required>
                    <span>Food Pairing</span>
                </div>

                <div class="inputBox">
                    <input type="text" id="grape_variety" name="grape_variety" required>
                    <span>Grape Variety</span>
                </div>

                <div class="inputBox dropdown">
                <label for="tannin">Body</label>
                    <select class="select" name="tannin" id="tannin" required>
                        <option value="">Light</option>
                        <option value="">Light-Dry</option>
                        <option value="">Medium-Dry</option>
                        <option value="">Full</option>
                    </select>
                </div>

                <div class="inputBox dropdown">
                <label for="tannin">Tannin</label>
                    <select class="select" name="tannin" id="tannin" required>
                        <option value="">Low</option>
                        <option value="">Medium</option>
                        <option value="">Medium-High</option>
                        <option value="">High</option>
                    </select>
                </div>

                <div class="inputBox dropdown">
                    <label for="sweetness">Sweetness</label>
                    <select class="select" name="sweetness" id="sweetness" required>
                        <option value="">Dry</option>
                        <option value="">Sweet</option>
                        <option value="">Semi-Sweet</option>
                    </select>
                </div>

                <div class="inputBox dropdown">
                    <label for="type">Type</label>
                    <select class="select" name="type" id="type" required>
                        <option value="">Red</option>
                        <option value="">White</option>
                        <option value="">Sparkling</option>
                        <option value="">Desert</option>
                        <option value="">Rosé</option>
                    </select>
                </div>

                <div class="inputBox">
                    <input type="file" id="image_url" name="image_url" required>
                    <label for="image_url" class="add-file"><i class="fa fa-upload"></i> Upload Image</label>
                    <p class="file-added">No file chosen</p>
                </div>
                <div class="add-btn">
                    <button type="button" onclick="closePopup()">Cancel</button>
                    <button type="button" onclick="addWine()">Add</button>
                </div>
            </form>
        </div>        
    </div>

    <script src="js/manages.js"></script>
    <!-- <script src="js/popup.js"></script> -->
    <script>
        const popup = document.getElementById('popup');
        
        function openPopup() {
            popup.classList.add('open-popup');
        }        
        
        function closePopup() {
            popup.classList.remove('open-popup');
        }        
        
    </script>

    </body>
</html>