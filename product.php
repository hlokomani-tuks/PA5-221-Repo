<?php require_once('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.0/css/all.css">
    <script defer src="https://code.jquery.com/jquery-3.7.0.min.js" integrity="sha256-2Pmvv0kuTBOenSvLm6bvfBSSHrUJ+3A7x6P5Ebd07/g=" crossorigin="anonymous"></script>
    <script defer src="js/product.js"></script>
    <title>Product</title>
</head>
<body>

    <div class="container flex">
        <div class="left">
            <div class="main-img">
                <p><img id="wine-image" alt=""></p>
            </div>
            <div class="details-left">
                <div class="info">
                    <h5 class="year">Year</h5>
                    <p id="year-data"></p>
                </div>
                <div class="info">
                    <h5 class="sweetness">Sweetness</h5>
                    <p id="sweetness-data"></p>
                </div>
                <div class="info">
                    <h5 class="tannin">Tannin</h5>
                    <p id="tannin-data"></p>
                </div>
                <div class="info">
                    <h5 class="winery">Winery</h5>
                    <p id="winery-data"></p>
                </div>
                <div class="info">
                    <h5 class="variety">Variety</h5>
                    <p id="variety-data"></p>
                </div>
                <div class="info">
                    <h5 class="pairing">Food pairing</h5>
                    <p id="pairing-data"></p>
                </div>
            </div>
        </div>
        <div class="right">
            <h1 class="wine-brand" id="wine-data"></h1>
            <hr>
            <h3 id="location-data"></h3>
            <div class="rating">
                <p><i class="fa fa-star checked"></i> User rating <span class="ss-rating" id="user-rating-data"></span>/10 <span class="num-ratings"></span></p>
                <p class="c-rating"><i class="fa fa-star checked"></i> Critic rating <span class="critic-rating" id="critic-rating-data"></span>/10</p>
            </div>
            <div class="details">
                <p class="description" id="description-data"></p>
                <form action="" method="post" id="review">
                    <div class="review-section">
                        <input type="text" name="review" id="" placeholder="Describe your experience...">
                        <label for="rating">Rating</label>
                        <input type="number" min="0" max="10" name="rating" id="" required>
                        <button type="button" class="review-btn">Review</button>
                    </div>
                </form>
                
            </div>
            
        </div>
    </div>
    <?php require_once('footer.php') ?>
</body>
</html>