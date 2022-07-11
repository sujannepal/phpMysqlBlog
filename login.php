<?php
    include 'includes/header.php';
?>

<div class="container">
    <h1 class="heading-one mt-5 mb-4" align="center">Login</h1>
    <div class="w-80 mx-auto">
        <form action="includes/login.inc.php" method="POST">
            <div class="form-group mb-4">
                <label class="label">Email*</label>
                <input type="email" name="user_email" class="form-control input-field required" required />
            </div>

            <div class="form-group mb-4">
                <label class="label">Password*</label>
                <input type="password" name="user_pwd" class="form-control input-field required" required />
            </div>

            <div class="mt-3">
                <input type="submit" name="login" value="Login" class="btn custom-btn" />
            </div>
        </form>
    </div>

    <div class="row">
        <div class="col-sm-4 offset-sm-4">
        <?php if(isset($_GET["error"])){
                if($_GET["error"] =="wrongdetails" || $_GET["error"] == "loginfailed"){
                        echo '<div class="alert alert-danger" role="alert">
                        Incorrect Login Details. Please try again !
                      </div>';
                    }
                }
            ?>
        </div>
    </div>
</div>


<?php
include 'includes/footer.php';

?>