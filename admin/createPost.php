<?php

    require_once "../config/db_config.php";
    include 'admin-includes/header-ad.php';

    if(isset($_SESSION["userRole"])){
        $userRole = $_SESSION["userRole"];
        
        if($userRole !== "admin"){
            header("location: ../login.php");
        }
    }
    else{
        header("location: ../login.php");
    }
    
?>

<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col mt-3"></div>
        </div>
        <div class="row">
            <div class="col">
                <h3>Create a new blog post</h3>
            </div>
        </div>

        <div class="row">
            <form class="form-control" method="POST" action="../includes/createPost.inc.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="postTitle">Post title</label>
                    <input type="text" class="form-control" id="postTitle" name="postTitle"
                        placeholder="post title less than 255 characters" required>

                </div>
                <div class="form-group">
                    <label for="postDesc">Post Description</label>
                    <textarea class="form-control" id="postDesc" name="postDesc" rows="3" required></textarea>
                </div>

                <div class="form-group mt-3">
                    <label for = "postImage">Image </label>
                    <input type="file" class="form-control" id="postImage" name="postImage" required/>
                </div>

                <button type="submit" name="createPost" class="btn btn-primary mt-3">Submit</button>
            </form>
        </div>
    </div>

</div>

<?php
    include 'admin-includes/footer-ad.php';
?>