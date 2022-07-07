<?php
    if(isset($_GET['id'])){
        $id = $_GET['id'];
        //echo $id;

        require_once '../config/db_config.php';
        $sql = "SELECT * FROM post WHERE post_id = ?";
        if($stmt = mysqli_prepare($conn, $sql)){
            mysqli_stmt_bind_param($stmt, 'i', $param_id);

            $param_id = $id;

            if(mysqli_stmt_execute($stmt)){
                $result = mysqli_stmt_get_result($stmt);
                if(mysqli_num_rows($result) == 1){
                    $row = mysqli_fetch_array($result, MYSQLI_ASSOC);
                   // echo var_dump($row);
                    $postTitle = $row['post_title'];
                    $postDesc = $row['post_desc'];
                    $imagePath = $row['image_path'];
                    $imageFullPath = '../'.$imagePath;

                }
            }
        }
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Blog Post</title>
    <link rel="stylesheet" href="../css//bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col mt-3"></div>
        </div>
        <div class="row">
            <div class="col">
                <h3>Update Post Details</h3>
            </div>
        </div>

        <div class="row">
            <form class="form-control" method="POST" action="../includes/updatePost.inc.php" enctype="multipart/form-data">
                <div class="form-group">
                    <input type="hidden" name="postId" value = <?php echo $id; ?> class="form-control"/>
                    <label for="postTitle">Post title </label>
                    <input type="text" class="form-control" id="postTitle" name="postTitle"
                        placeholder="post title less than 255 characters" value="<?php echo $postTitle ?>">

                </div>
                <div class="form-group">
                    <label for="postDesc">Post Description</label>
                    <textarea class="form-control" id="postDesc" name="postDesc" rows="3" >
                        <?php echo $postDesc; ?>
                    </textarea>
                </div>

                <div class="form-group">
                    
                    <label for = "postImage">Image <?php echo $imagePath; ?> </label>
                    <input type="file" class="form-control-file" id="postImage" name="postImage"/>
                    <input type="hidden" name="imagePath" value="<?php echo $imagePath ?>">
                    <!-- <img src="<?php echo $imageFullPath ?>"  name = "postImage" height="150" width="150"/> -->
                </div>

                <button type="submit" name="updatePost" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</body>

</html>