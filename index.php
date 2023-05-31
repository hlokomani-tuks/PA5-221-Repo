<?php
    require_once("header.php");
?>

<html>
    <head>  
        <link rel="stylesheet" href="css/index.css?">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.0/css/all.css">
    </head>
    <body>
    <div class="header-container">
        <div class="header-text">
            <h1>The Best Wine Catalogue</h1>
            <p>Uncork and discover! The ultimate wine journey begins here. <br> Explore a curated collected of exquisite wines from renowned vineyards across the globe. <br> Cheers to indulging in the art of wine appreciation.</p>
            <div class="search-bar">
                <form>
                    <input type="search" placeholder="" id="search-wine">
                    <button type="submit">Search</button>
                </form>
            </div>
        </div>
    </div>

    <div class="filter-bar">
        <ul>
            <div class="category">
                <li>Show All</li>
                <span><i class=""></i></span>
            </div>
            <div class="category">
                <li>Brand</li>
                <i class=""></i>
            </div>
            <div class="category">
                <li>Style</li>
                <span><i class=""></i></span>
            </div>
            <div class="category">
                <li>Sweetness</li>
                <span><i class=""></i></span>
            </div>
            <div class="category">
                <li>Year</li>
                <span><i class=""></i></span>
            </div>
            <div class="category">
                <li>Sort By:</li>
                <span><i class="fas fa-caret-down"></i></span>
            </div>
        </ul>
    </div>

    
    <?php require_once("footer.php");?>
    </body>
</html>

