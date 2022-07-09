<?php
    include 'includes/header.php';
    include 'config/db_config.php';

    $sql = "SELECT * FROM post";
    $result = mysqli_query($conn, $sql);

?>

<div class="wrapper">
    <div class="container">
        <?php
            if(mysqli_num_rows($result)>0){
                while($row = mysqli_fetch_array($result)){
                    ?>
                    <div class="row">
                        <div class="card rounded-0 mb-5">
                            <div class="card-body">
                                <div class="d-flex justify-content-between">
                                    <h4 class="card-title"><?php echo $row['post_title'] ?></h4>
                                    <p><small><i>Published Date : <?php echo $row['created_date'] ?></i></small></p>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?php echo $row['image_path'] ?>" height="180" width="180" />
                                    </div>
                                    <div class="col-sm-9 d-flex flex-column justify-content-center">
                                        <p class="card-text">
                                            <?php 
                                            $desc_without_tags = strip_tags($row['post_desc']); 
                                            $desc_limited = substr($desc_without_tags, 0, 250); 
                                            echo $desc_limited . "..."; 
                                            ?>
                                        </p>
                                        <div class="w-100" align="right">
                                            <a href="blogdetail.php?id=<?php echo $row['post_id']; ?>" class="btn btn-read-more">Read more ... </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="card-footer text-muted">
                                Published Date : <?php echo $row['created_date'] ?>
                            </div>
                        </div>
                    </div>
        <?php
                }
            }
        ?>


    </div>
</div>


<?php
include 'includes/footer.php';

?>