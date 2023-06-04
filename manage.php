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
            <h2>New Wine</h2>
            <div class="attributes">
                <form action="" method="">
                    <input type="text" name="name" id="name" placeholder="Name">
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