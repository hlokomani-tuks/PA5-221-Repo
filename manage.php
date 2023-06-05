<?php
    require_once("header.php");
?>

<html>
    <head>
        <link rel="stylesheet" href="css/manage.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.0/css/all.css">
    </head>
    <body>
        
    <div class="stats">
        <div class="cards">
            <div class="card">
                <div class="box">
                    <h1>32</h1>
                    <h3>Wines</h3>
                </div>
                <div class="icon-case">
                    <img src="img/wine-bottle.svg" alt="">
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <h1>154</h1>
                    <h3>Reviews</h3>
                </div>
                <div class="icon-case">
                    <img src="img/reviews.svg" alt="">
                </div>
            </div>
            <div class="card">
                <div class="box">
                    <h1>2</h1>
                    <h3>Critics</h3>
                </div>
                <div class="icon-case">
                    <img src="img/critic.svg" alt="">
                </div>
            </div>
        </div>
    </div>

    <div class="catalogue">
        <div class="add">
            <h1>Winery Name's Wines </h1>
            <button type="submit" onclick="openPopup()">Add Wine  <i class="fa fa-plus"></i></button>
        </div>
        <div class="wines">

        </div>
    </div>
    <div class="popup" id="popup">
        <div class="elements">
            <div class="attributes">
                <div class="contactForm">
                    <form action="" method="">
                        <h2>Adding to a catalogue</h2>
                        <div class="inputBox">
                            <input type="text" id="name" name="name" required="required">
                            <span>Name of Wine</span>
                        </div>
                        
                        <div class="inputBox">
                            <input type="number" id="year" name="year" required="required">
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
                            <input type="text" id="image_url" name="image_url" required>
                            <span>Image</span>
                        </div>

                        <div class="inputBox">
                            <input type="text" id="type_id" name="type_id" required>
                            <span>Type ID</span>
                        </div>

                        <div class="inputBox">
                            <input type="text" id="winery_id" name="winery_id" required>
                            <span>Winery ID</span>
                        </div>
                </form>
            </div>
        </div>
        <button onclick="closePopup()">Add</button>
    </div>

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