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

    $sql = "SELECT * FROM post";
    $result = mysqli_query($conn, $sql);

?>

<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col mt-3"></div>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <h4>Blog Posts</h4>
            </div>
            <div class="col-sm-6"></div>
            <div class="col-sm-2">
                <a href="createPost.php" class="btn btn-primary">Add New Post</a>
            </div>
        </div>
        <?php
        if($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result) > 0){
                echo '<table class="table table-bordered table-striped table-responsive">';
                    echo "<thead>";
                        echo "<tr>";
                            echo "<th>#</th>";
                            echo "<th>Title</th>";
                            echo "<th>Description</th>";
                            echo "<th>Image</th>";
                            echo "<th>Published Date</th>";
                            echo "<th>Action</th>";
                        echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    $counter = 1;
                    while($row = mysqli_fetch_array($result)){
                        
                        echo "<tr>";
                            echo "<td>" . $counter . "</td>";
                            echo "<td>" . $row['post_title'] . "</td>";
                            echo "<td>" . $row['post_desc'] . "</td>";
                            echo "<td> <img height=150 width=150 src=\"" .'../'. $row['image_path'] . "\"</img> </td>";

                            echo "<td>" . $row['created_date'] . "</td>";
                            echo "<td>";
                               // echo '<a href="read.php?id='. $row['post_id'] .'" class="mr-3" title="View Record" data-toggle="tooltip"><button class="btn btn-primary">View</button></a>';
                                echo '<a href="updatePost.php?id='. $row['post_id'] .'" title="Update Record" data-toggle="tooltip"><button class="btn btn-warning">Update</button></a>';
                                echo '<a href="../includes/delete.inc.php?id='. $row['post_id'] .'"  title="Delete Record" data-toggle="tooltip" onclick="return confirm(\'Are you sure to delete ?\');"><button class="btn btn-danger mt-3">Delete</button></a>';
                            echo "</td>";
                        echo "</tr>";
                        $counter = $counter + 1;
                    }
                    echo "</tbody>";                            
                echo "</table>";
                // Free result set
                mysqli_free_result($result);
            } else{
                echo '<div class="alert alert-danger"><em>No records were found.</em></div>';
            }
        } else{
            echo "Oops! Something went wrong. Please try again later.";
        }
        ?>
    </div>

</div>
<?php
    include 'admin-includes/footer-ad.php';
?>