<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Blog Post</title>
    <link rel="stylesheet" href="../css//bootstrap.min.css">
</head>

<body>
    <div class="container">
        <div class="row">
            <div class="col mt-3"></div>
        </div>
        <div class="row">
            <div class="col">
                <h3>Create a new post Post</h3>
            </div>
        </div>

        <div class="row">
            <form class="form-control" method="POST" action="../includes/createPost.inc.php" enctype="multipart/form-data">
                <div class="form-group">
                    <label for="postTitle">Post title</label>
                    <input type="text" class="form-control" id="postTitle" name="postTitle"
                        placeholder="post title less than 255 characters">

                </div>
                <div class="form-group">
                    <label for="postDesc">Post Description</label>
                    <textarea class="form-control" id="postDesc" name="postDesc" rows="3"></textarea>
                </div>

                <div class="form-group">
                    <label for = "postImage">Image </label>
                    <input type="file" class="form-control-file" id="postImage" name="postImage"/>
                </div>

                <button type="submit" name="createPost" class="btn btn-primary">Submit</button>
            </form>
        </div>
    </div>

</body>

</html>