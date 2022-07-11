<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>

<body>
    <nav class="navbar navbar-inverse">
        <div class="container-fluid">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#myNavbar">
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="#">Admin Dashboard</a>
            </div>
            <div class="collapse navbar-collapse" id="myNavbar">
                <ul class="nav navbar-nav">
                    <li class="active"><a href="../index.php">Website</a></li>
                    <li class="active"><a href="index.php">Posts</a></li>
                    <li class="active"><a href="feedback.php">Feedbacks</a></li>
                    <li class="active"><a href="comment.php">Comments</a></li>
                    <li class="active"><a href="user.php">Users</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                <li class="nav-item rounded">
                    <a href="#"><span class="glyphicon glyphicon-user"></span>
                        <?php 
                            if(isset($_SESSION["username"])){
                                echo 'Hello '. $_SESSION["username"];
                            } 
                                
                        ?>
                    </a></li>
                    <!-- <li><a href="#"><span class="glyphicon glyphicon-user"></span> Admin</a></li> -->
                    <li><a href="../includes/logout.inc.php"><span class="glyphicon glyphicon-log-in"></span> Logout</a></li>
                </ul>
            </div>
        </div>
    </nav>