<?php
    define('ROOT', __DIR__);
    define('DB_USERS', ROOT . '/db/users.json');
    define('STORAGE', ROOT . '/storage/');

    require_once(ROOT . '/tools/dd.php');
    require_once(ROOT . '/services/authService.php');

    session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Gallery</title>

    <link rel="stylesheet" href="./styles/bootstrap.min.css"></link>
    <link rel="stylesheet" href="./styles/style.css"></link>
</head>
<body>
    <div class="container">
        <div class="row mb-4">
            <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
                <div class="container-fluid">
                    <a class="navbar-brand" href=".">Gallery</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav">
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=registration">Registration</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="index.php?page=login">Login</a>
                            </li>
                            <?php if(isLogin()):?>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?page=upload">Upload</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" href="index.php?page=gallery">Gallery</a>
                                </li>
                            <?php endif?>
                        </ul>
                    </div>
                </div>
            </nav>
        </div>

        <div class="row justify-content-center">
            <?php
                if (isset($_GET['page'])) {
                    $page = $_GET['page'];

                    switch($page) {
                        case 'registration':
                            include_once('./pages/registration.php');
                            break;
                        case 'login':
                            include_once('./pages/login.php');
                            break;
                        case 'upload':
                            include_once('./pages/upload.php');
                            break;
                        case 'gallery':
                            include_once('./pages/gallery.php');
                            break;
                    }
                }
            ?>
        </div>

    </div>



    <script src="./js/bootstrap.bundle.min.js"></script>
</body>
</html>

