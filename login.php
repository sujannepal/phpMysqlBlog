<?php



include 'includes/header.php';

?>


<div class="wrapper">
    <div class="container">
        <div class="row">
            <div class="col-sm-4 offset-sm-4">
                <div>
                    <h5>Please enter your login details</h5>
                </div>
                <form action="includes/login.inc.php" class="form-control" method="POST">
                    <div>
                        <label>Email</label>
                        <input type="email" name="user_email" class="form-control">
                    </div>

                    <div>
                        <label>Password</label>
                        <input type="password" name="user_pwd" class="form-control">
                    </div>

                    <div class="mt-3">
                        <input type="submit" name="login" value="Login" class="btn btn-primary">
                    </div>

                </form>
            </div>

        </div>
    </div>
</div>


<?php
include 'includes/footer.php';

?>