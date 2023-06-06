<?php require_once('header.php'); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/product.css">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.15.0/css/all.css">
    <title>Product</title>
</head>
<body>

    <div class="container flex">
        <div class="left">
            <div class="main-img">
                <p><img src="data:image/jpeg;base64,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" alt=""></p>
            </div>
            <div class="details-left">
                <div class="info">
                    <h5>Year</h5>
                    <p class="year">2000</p>
                </div>
                <div class="info">
                    <h5>Sweetness</h5>
                    <p  class="sweetness">Dry</p>
                </div>
                <div class="info">
                    <h5>Tannin</h5>
                    <p class="tannin">Low</p>
                </div>
                <div class="info">
                    <h5>Farm</h5>
                    <p class="farm">Minecraft</p>
                </div>
                <div class="info">
                    <h5>Food pairing</h5>
                    <p class="food-pairing">Speckled Eggs</p>
                </div>
            </div>
        </div>
        <div class="right">
            <h1 class="wine-brand">Fancy Wine Name</h1>
            <hr>
            <h3 class="region">France, Rome</h3>
            <div class="rating">
                <p><i class="fa fa-star checked"></i> SS rating 7/10</p>
                <p class="crtitc rating"><i class="fa fa-star checked"></i> Critic rating 6.2/10</p>
            </div>
            <div class="details">
                <p class="description">This wine is a nice and tasty wine that smells good too. It was made in a vineyard and belongs to a certain winery somewhere in the world</p>
                <form action="" method="post" id="review">
                    <div class="review-section">
                        <input type="text" name="" id="" placeholder="Describe your experience...">
                        <button type="button" class="review-btn">Review</button>
                    </div>
                </form>
                
            </div>
            
        </div>
    </div>
    <?php require_once('footer.php') ?>
    <script src="js/product.js"></script>
</body>
</html>