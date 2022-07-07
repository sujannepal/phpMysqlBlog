<?php
include 'includes/header.php';

include 'config/db_config.php';

if(isset($_SESSION["userId"])){
    $userId = $_SESSION["userId"];
}

if(isset($_GET['id'])){
    $postId = $_GET['id'];

    $sql = "SELECT * FROM post WHERE post_id = ?";

    if($stmt = mysqli_prepare($conn, $sql)){
        mysqli_stmt_bind_param($stmt, "i", $param_id);
        $param_id = $postId;

        if(mysqli_stmt_execute($stmt)){
            $result = mysqli_stmt_get_result($stmt);
            if(mysqli_num_rows($result) == 1){
                $row = mysqli_fetch_array($result, MYSQLI_ASSOC);

                $postTitle = $row['post_title'];
                $postDesc = $row['post_desc'];
                $imagePath = $row['image_path'];
                $publishedDate = $row['created_date'];

                //$imageFullPath = '../'.$imagePath;
            }
        }
       
    }
}




?>

<div class="wrapper">
    <div class="cotainer">
        <div class="row">
            <div class="card">
                <div class="card-body">
                    <h5 class="card-title"><?php echo $postTitle ?></h5>
                    <hr>
                    <div class="row">
                        <div class="col">
                            <img src="<?php echo $imagePath ?>" height="200" width="200" />
                        </div>

                    </div>
                    <div class="row">
                        <div class="col">
                            <p class="card-text"><?php echo $postDesc ?></p>
                            <!-- <a href="blogdetail.php?id=<?php echo $row['post_id'] ?>" class="btn btn-primary">Read more ... -->
                            </a>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-muted">
                    Published Date : <?php echo $publishedDate; ?>
                </div>
            </div>
        </div>

        <div class="row">
            <label>Comments</label>
            <hr>
            


        </div>
        <div>
        <?php
           // require_once "config/db_config.php";
                    
            // Attempt select query execution
            $sql = "SELECT * FROM comment WHERE post_id = ?";
            if($stmt = mysqli_prepare($conn, $sql)){
                mysqli_stmt_bind_param($stmt, 'i', $param_id);

                $param_id = $postId;

                if(mysqli_stmt_execute($stmt)){
                    $result = mysqli_stmt_get_result($stmt);
                    if(mysqli_num_rows($result)>0){

                        while($row = mysqli_fetch_array($result)){
                            $commentDetail = $row['comment_detail'];
                           // echo $commentDetail;
                           
                           echo "
                           <div>
                            <h6>".
                             $commentDetail.
                             "
                            </h6>
                            <hr>
                            </div>
                            ";
                        }
                    }
                }
            }

        ?>
        </div>

        
        <div class="row">
            <form method="POST" action="includes/comment.inc.php">
                <input type="hidden" value="<?php echo $postId ?>" name="postId">
                <input type="hidden" value="<?php echo $userId ?>" name="userId">

                <textarea class="form-control" name="commentDteail">

                </textarea>

                <input type="submit" name="postComment" value="Post a comment" class="btn btn-primary">

            </form>

        </div>
    </div>
</div>

<?php
include 'includes/footer.php';
?>