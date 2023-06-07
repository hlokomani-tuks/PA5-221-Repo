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
            <!--<div class="search-bar">
                <form>
                    <input type="search" placeholder="" id="search-wine">
                    <button type="submit">Search</button>
                </form>
            </div>-->
        </div>
    </div>

    <div class="filter-bar">
        <ul>
            <div class="category">
                <li>Show All</li>
                <span><i class=""></i></span>
            </div>
            <!--<div class="category">
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
            </div>-->
            <div class="category" id="">
                <li>
                    <div class="select-box1">
                        <div class="options-container1">
                            <div class="option1">
                                <input type="radio" class="radio1" name="sort-by" id="price">
                                <label for="">Price</label>
                            </div>
                            <div class="option1">
                                <input type="radio" class="radio1" name="sort-by" id="vintage">
                                <label for="">Pinotage</label>
                            </div>
                            <div class="option1">
                                <input type="radio" class="radio1" name="sort-by" id="quality">
                                <label for="">Shiraz</label>
                            </div>
                        </div>
                        <div class="selected1" onClick="dropdown1()">Brand</div>
                    </div>
                </li>
            </div>
            <div class="category" id="">
                <li>
                    <div class="select-box2">
                        <div class="options-container2">
                            <div class="option2">
                                <input type="radio" class="radio2" name="sort-by" id="price">
                                <label for="">Red</label>
                            </div>
                            <div class="option2">
                                <input type="radio" class="radio2" name="sort-by" id="price">
                                <label for="">Rosé</label>
                            </div>
                            <div class="option2">
                                <input type="radio" class="radio2" name="sort-by" id="vintage">
                                <label for="">White</label>
                            </div>
                            <div class="option2">
                                <input type="radio" class="radio2" name="sort-by" id="quality">
                                <label for="">Sparkling</label>
                            </div>
                            <div class="option2">
                                <input type="radio" class="radio2" name="sort-by" id="quality">
                                <label for="">Desert</label>
                            </div>
                        </div>
                        <div class="selected2" onClick="dropdown2()">Style</div>
                    </div>
                </li>
            </div>
            <div class="category" id="">
                <li>
                    <div class="select-box3">
                        <div class="options-container3">
                            <div class="option3">
                                <input type="radio" class="radio3" name="sort-by" id="">
                                <label for="">2002</label>
                            </div>
                            <div class="option3">
                                <input type="radio" class="radio3" name="sort-by" id="">
                                <label for="">2001</label>
                            </div>
                            <div class="option3">
                                <input type="radio" class="radio3" name="sort-by" id="">
                                <label for="">2000</label>
                            </div>
                        </div>
                        <div class="selected3" onClick="dropdown3()">Year</div>
                    </div>
                </li>
            </div>
            <div class="category" id="">
                <li>
                    <div class="select-box4">
                        <div class="options-container4">
                            <div class="option4">
                                <input type="radio" class="radio4" name="sort-by" id="">
                                <label for="">Pinot Noir</label>
                            </div>
                            <div class="option4">
                                <input type="radio" class="radio4" name="sort-by" id="">
                                <label for="">Pinotage</label>
                            </div>
                            <div class="option4">
                                <input type="radio" class="radio4" name="sort-by" id="">
                                <label for="">Shiraz</label>
                            </div>
                        </div>
                        <div class="selected4" onClick="dropdown4()">Variety</div>
                    </div>
                </li>
            </div>
            <div class="category" id="sort">
                <li>
                    <div class="select-box">
                        <div class="options-container">
                            <div class="option">
                                <input type="radio" class="radio" name="sort-by" id="">
                                <label for="">Year</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" name="sort-by" id="">
                                <label for="">Name</label>
                            </div>
                            <div class="option">
                                <input type="radio" class="radio" name="sort-by" id="">
                                <label for="">Winery</label>
                            </div>
                        </div>
                        <div class="selected" onClick="dropdown()">Sort By</div>
                    </div>
                </li>
            </div>
            <!--<div class="category">
                <li>Sort By:</li>
                <span><i class="fas fa-caret-down"></i></span>
            </div>-->
        </ul>
    </div>

    <section class="all-wines">
        <div class="filter-box">
            
        </div>
        <div class="wines-container" id="wine-container">
            <!--dynamically add wines -->
        </div>
    </section>

    <script src="js/index.js"></script>
    <?php require_once("footer.php");?>
    </body>
</html>

