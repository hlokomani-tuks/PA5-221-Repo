<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sauvignon Syndicate</title>
    <link rel="stylesheet" href="css/header.css">
    <script defer src="js/header.js"></script>
</head>
<body>

   <header>
        <nav>
            <h1 id="logo"><a href="index.php" style="color: rgb(193, 44, 44)">Sauvignon Syndicate</a></h1>
            <div class="nav-links">
                <ul>
                    <li><a href="index.php">Home</a></li>
                    <li><a href="about.php">Our Story</a></li>
                    <?php if(isset($_SESSION["logged_in"])): ?>
                        <?php if((bool) $_SESSION["is_manager"]): ?>
                            <li><a href="manage.php">Manage</a></li>
                        <?php endif; ?>
                        <li><a onclick="logout()">Logout</a></li>
                    <?php else: ?>    
                        <li><a href="signup.php">Sign Up</a></li>
                        <li><a href="login.php">Login</a></li>
                    <?php endif; ?>
                    <li><button id="contact"><a href="contact.php">Contact Us</a></button></li>
                </ul>
            </div>
        </nav>
   </header>

   
    
</body>
</html>