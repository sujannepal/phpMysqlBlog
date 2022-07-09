<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>FogComputing</title>
    <link rel="stylesheet" href="../css/bootstrap.min.css?time=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/style.css?time=<?php echo time(); ?>">
    <link rel="stylesheet" href="../css/header.css?time=<?php echo time(); ?>">


    <!-- <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta2/dist/css/bootstrap.min.css"> -->
    <!-- <script src="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.0/font/bootstrap-icons.css"  crossorigin="anonymous"></script> -->

</head>

<body>
    <div class="container">
        <div class="mt-10">
            <nav class="navbar navbar-expand-lg shadow-sm px-0 fixed-top" style="background-color: #e7e7e7;">
                <div class="container">
                    <a class="navbar-brand" href="#"></a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-md-auto gap-2">

                            <li class="nav-item rounded">
                                <a class="nav-link active" aria-current="page" href="../index.php"><i
                                        class="bi bi-house-fill me-2"></i>Blog</a>
                            </li>

                            <?php

                            if(isset($_SESSION["userRole"])){
                                if($_SESSION["userRole"] == "admin"){
                                    echo '
                                    <li class="nav-item rounded">
                                        <a class="nav-link" href="index.php "><i class="bi bi-telephone-fill me-2"></i>Dashboard</a>
                                    </li>
                                    ';
                                }
                            }

                            ?>
                            <li class="nav-item rounded">
                                <a class="nav-link active" aria-current="page" href="#"><i
                                        class="bi bi-house-fill me-2"></i>
                                    <?php 
                                if(isset($_SESSION["username"])){
                                    echo 'Hello '. $_SESSION["username"];
                                } 
                                
                                ?>
                                </a>
                            </li>
                            <li class="nav-item rounded">
                                <a class="nav-link" href="../includes/logout.inc.php "><i
                                        class="bi bi-telephone-fill me-2"></i>Logout</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <hr>
            </nav>