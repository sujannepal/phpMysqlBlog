<?php
    include 'includes/header.php';

    include 'config/db_config.php';

    if(isset($_GET['id'])){
        $postId = $_GET['id'];
        $sql = "SELECT * FROM post WHERE post_id = ?";

        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, "i", $param_id);
            $param_id = $postId;

            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
                // if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                $postTitle = $row['post_title'];
                
                $postDesc = $row['post_desc'];
                
                $imagePath = $row['image_path'];
                
                $publishedDate = $row['created_date'];
                
                    //$imageFullPath = '../'.$imagePath;
                // }
            }
        }
    }
    else {
        header("location: index.php");
    }
?>

<div class="wrapper">
    <div class="container">
        
        <h1 align="center" class="font-weight-bold mb-5"><?php echo $postTitle ?></h1>
        <div align="center" class="mb-4">
            <img src="<?php echo $imagePath; ?>">
        </div>
        <div class="mb-5">
            <p>
                <?php 
                    echo $postDesc;
                ?>
            </p>
        </div>

        <h5>Comments</h5>
        <hr />
        <div>
        <?php
           // require_once "config/db_config.php";
                    
            // Attempt select query execution
            $sql = "SELECT * FROM comment WHERE post_id = ? ORDER BY comment_id DESC LIMIT 3";
            if($stmt = mysqli_prepare($conn, $sql)){
                mysqli_stmt_bind_param($stmt, 'i', $param_id);

                $param_id = $postId;

                if(mysqli_stmt_execute($stmt)){
                    $result = mysqli_stmt_get_result($stmt);
                    if(mysqli_num_rows($result)>0){

                        while($row = mysqli_fetch_array($result)){
                            $commentDetail = $row['comment_detail'];
                            $userId = $row['user_id'];
                            $comment_date = $row['created_date'];

                            // fetching
                            $query = "SELECT user_fname, user_lname FROM user WHERE user_id = ?";
                            $stmt1 = mysqli_prepare($conn, $query);
                            mysqli_stmt_bind_param($stmt1, 'i', $userId);
                            mysqli_stmt_execute($stmt1);
                            $result1 = mysqli_stmt_get_result($stmt1);
                            $row1 = mysqli_fetch_array($result1);

                            $fname = $row1['user_fname'];
                            $lname = $row1['user_lname'];


                           // echo $commentDetail;
                           
                           echo "
                                <div class='w-100'>
                                    <small>
                                        <small>
                                            <i>Commented on - ".$comment_date."</i>
                                        </small>
                                    </small>
                                </div>
                                <div class='d-flex mb-4 w-100 p-3' style='border: 1px solid #ccc;border-radius: 4px;'>
                                    <div style='width: 50px;' class='d-flex align-items-center justify-content-center'>
                                        <i class='fa fa-user-circle-o' style='font-size: 25px;box-shadow: 0 0 4px #f1f1f1;'></i>
                                    </div>
                                    <div>
                                        <h6 class='p-0 m-0'><small>".$fname." ".$lname."</small></h6>
                                        <p class='p-0 m-0'>".$commentDetail."</p>
                                    </div>
                                    <hr>
                                </div>
                            ";
                        }
                    }
                }
            }

        ?>
        </div>
        <form method="POST" action="includes/comment.inc.php">
            <input type="hidden" name="postId" value=<?php echo $postId; ?> />
            <textarea name="commentDetail" class="form-control input-field mb-3" placeholder="Write comment ...." required="required"></textarea>
            <input type="submit" name="postComment" class="btn custom-btn py-2" value="Add Comment" />
        </form>
    </div>
</div>

<?php
include 'includes/footer.php';
?>