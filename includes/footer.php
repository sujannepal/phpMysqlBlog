<?php 
    require_once("config/db_config.php");
?>
</div>
</div>
    <footer class="bg-light py-4">
        <div class="container">
            <div class="row">
                <div class="col-md-4 p-4">
                    <h5 class="mb-4 footer-header">FogComputing</h5>
                    <p>Fog Computing is tech blogging site where you can get all the latest blogs on technology.</p>
                    <p>Fog Computing &copy; <?php echo date("Y"); ?></p>
                </div>
                <div class="col-md-4 p-4">
                    <h5 class="mb-4 footer-header">Quick Links</h5>
                    <ul class="nav flex-column p-0 m-0 align-items-start">
                        <li class="nav-item mb-0">
                            <a href="index.php" class="nav-link mb-0" style="text-decoration: underline;">Home</a>
                        </li>
                        <li class="nav-item">
                            <a href="contact.php" class="nav-link mb-0" style="text-decoration: underline;">Contact</a>
                        </li>
                    </ul>
                </div>
                <div class="col-md-4 p-4">
                    <h5 class="mb-4 footer-header">Latest Blogs</h5>
                    <div class="px-2">
                        <?php 
                            $query = "SELECT * FROM post ORDER BY post_id DESC LIMIT 3";
                            $result = mysqli_query($conn, $query);  
                            if(mysqli_num_rows($result) > 0){
                                // echo '<ul>';
                                while($row = mysqli_fetch_assoc($result)){
                                    echo '     
                                        <a class="nav-link p-0 mb-3" style="text-decoration: underline;color: black;font-weight: 500;" href="blogdetail.php?id='.$row['post_id'].'">'.$row['post_title'].'</a>  
                                    ';
                                }
                                // echo '</ul>';
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </footer>

</body>

</html>