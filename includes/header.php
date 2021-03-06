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
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <link rel="stylesheet" href="css/style.css?time=<?php echo time(); ?>">
    <link rel="stylesheet" href="css/header.css?time=<?php echo time(); ?>">

    <!-- fontawesome -->
    <link rel="stylesheet" href="css/all.min.css">
    <link rel="stylesheet" href="css/fontawesome.min.css">


</head>

<body>
    <div class="container-fluid p-0">
        <div class="mt-0">
            <nav class="navbar navbar-expand-lg shadow-sm px-0">
                <div class="container">
                    <a class="navbar-brand" href="#">FogComputing</a>
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                        aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarNav">
                        <ul class="navbar-nav ms-md-auto gap-2">
                            <li class="nav-item rounded">
                                <a class="nav-link active" aria-current="page" href="index.php"><i class="fas fa-home" style="font-size: 15px; padding-bottom:-5px;"></i>&nbsp;Home</a>
                            </li>
                           
                            <li class="nav-item rounded">
                                <a class="nav-link" href="contact.php"><i class="fas fa-envelope" style="font-size: 15px; padding-bottom:-5px;"></i>&nbsp;Contact</a>
                            </li>

                            <li class="nav-item rounded">
                                <a class="nav-link active" aria-current="page" href="#"><i
                                        class="bi bi-house-fill me-2"></i>
                                    <?php 
                                        if(isset($_SESSION["username"])){
                                            echo '<i class="fas fa-user" style="font-size: 15px; padding-bottom:-5px;"></i> '. $_SESSION["username"];
                                        } 
                                        
                                        ?>
                                </a>
                            </li>

                            <?php

                            if(isset($_SESSION["userRole"])){
                                if($_SESSION["userRole"] == "admin"){
                                    echo '
                                
                                    <li class="nav-item rounded">
                                        <a class="nav-link" href="admin/index.php "><i class="fas fa-columns" style="font-size: 15px; padding-bottom:-5px;"></i> &nbsp;Dashboard</a>
                                    </li>
                                    
                                    ';
                                }
                                
                            }

                            if(isset($_SESSION["username"])){
                                echo '
                                
                                <li class="nav-item rounded">
                                    <a class="nav-link" href="includes/logout.inc.php "><i class="fas fa-sign-out-alt" style="font-size: 15px; padding-bottom:-5px;"></i>Logout</a>
                                </li>
                                
                                ';
                            }
                            else{
                                echo '
                               
                                <li class="nav-item rounded">
                                    <a class="nav-link" href="login.php"><i class="fas fa-sign-in-alt" style="font-size: 15px; padding-bottom:-5px;"></i>&nbsp;Login</a>
                                </li>
                                <li class="nav-item rounded">
                                    <a class="nav-link" href="register.php"><i class="fas fa-user-plus" style="font-size: 15px; padding-bottom:-5px;"></i>&nbsp;Register</a>
                                </li>
                                
                                ';
                            }
                            
                            

                            ?>

                        </ul>
                    </div>
                </div>
            </nav>