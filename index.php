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
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title"><?php echo $row['post_title'] ?></h5>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <img src="<?php echo $row['image_path'] ?>" height="200" width="200" />
                                    </div>
                                    <div class="col-sm-9">
                                        <p class="card-text"><?php echo $row['post_desc'] ?></p>
                                        <a href="blogdetail.php?id=<?php echo $row['post_id'] ?>" class="btn btn-primary">Read more ... </a>
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