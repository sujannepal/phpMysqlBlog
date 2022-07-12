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

    $sql = "SELECT * FROM user_feedback";
    $result = mysqli_query($conn, $sql);

?>

<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col mt-3"></div>
        </div>
        <div class="row">
            <div class="col-sm-6">
                <h4>User Feedbacks </h4>
            </div>
        </div>
        <?php
        if($result = mysqli_query($conn, $sql)){
            if(mysqli_num_rows($result) > 0){
                echo '<table class="table table-bordered table-striped table-responsive">';
                    echo "<thead>";
                        echo "<tr>";
                            echo "<th>#</th>";
                            echo "<th>Name</th>";
                            echo "<th>Email</th>";
                            echo "<th>Message</th>";
                            echo "<th>Feedback Date</th>";
                            //echo "<th>Action</th>";
                        echo "</tr>";
                    echo "</thead>";
                    echo "<tbody>";
                    $counter = 1;
                    while($row = mysqli_fetch_array($result)){
                        
                        echo "<tr>";
                            echo "<td>" . $counter . "</td>";
                            echo "<td>" . $row['fb_by_name'] . "</td>";
                            echo "<td>" . $row['fb_by_email'] . "</td>";
                            echo "<td>" . $row['fb_msg'] . "</td>";
                            echo "<td>" . $row['created_date'] . "</td>";
                            echo "<td>";
                              //  echo '<a href="../includes/delete.inc.php?id='. $row['fb_id'] .'"  title="Delete Record" data-toggle="tooltip" onclick="return confirm(\'Are you sure to delete ?\');"><button class="btn btn-danger mt-3">Delete</button></a>';
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