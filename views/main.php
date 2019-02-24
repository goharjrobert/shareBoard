<?php
/**
 * Created by PhpStorm.
 * User: Gohar_2
 * Date: 2/6/2019
 * Time: 9:08 PM
 */

?>

<html>
    <head>
        <title>
            Share Board
        </title>
<!--        Bootstrap CSS-->
        <link rel="stylesheet" href="../assets/css/bootstrap.min.css">
<!--        Bootstrap Theme CSS-->
        <link rel="stylesheet" href="../assets/css/cover.css">
<!--        Custom CSS for pages-->
        <link rel="stylesheet" href="../assets/css/style.css">
<!--        Font awesome icons-->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.1/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
<!--        Custom Javascript to change active links-->
        <script type="text/javascript" src="../assets/js/addClass.js"></script>

    </head>
    <body class="text-center">
    <div class="cover-container d-flex w-100 h-100 p-3 mx-auto flex-column">
        <header class="masthead mb-auto">
            <div class="inner">
                <h3 class="masthead-brand">Share Board</h3>
                <nav class="nav nav-masthead justify-content-center">
                    <a id="home" class="nav-link" href="<?php echo ROOT_URL ?>">Home</a>
                    <a id="shares" class="nav-link" href="<?php echo ROOT_URL ?>share">Shares</a>
                    <?php if(isset($_SESSION['is_logged_in'])): ?>
                        <b class="nav-link greeting">Welcome <?php echo $_SESSION['user_data']['name'] ?></b>
                        <a class="nav-link" href="<?php echo ROOT_URL ?>user/logout">Log Out</a>
                    <?php else: ?>
                    <a id="login" class="nav-link" href="<?php echo ROOT_URL ?>user/login">Login</a>
                    <a id="register" class="nav-link" href="<?php echo ROOT_URL ?>user/register">Register</a>
                    <? endif; ?>
                </nav>
            </div>
        </header>

        <main role="main">
            <?php Messages::display(); ?>
            <?php require($view); ?>
        </main>

        <footer class="mastfoot mt-auto">
            <div class="inner"></div>
        </footer>
    </div>
    </body>

<!--    Bootstrap Javascript-->
    <script type="text/javascript" src="../assets/js/bootstrap.min.js"></script>
</html>
