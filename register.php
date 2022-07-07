<?php

include 'includes/header.php';

?>


<div class="wrapper">
    <div class="container">
        <div>
            <h1>Register</h1>
        </div>

        <div>
            <form action="includes/register.inc.php" method="post" class="form-control">
                <div>
                    <label>First Name</label>
                    <input class="form-control" type="text" name="first_name">
                </div>
                <div>
                    <label>Last Name</label>
                    <input class="form-control" type="text" name="last_name">
                </div>
                <div>
                    <label>Email</label>
                    <input class="form-control" type="email" name="user_email">
                </div>
                <div>
                    <label>Password</label>
                    <input class="form-control" type="password" name="pwd">
                </div>
                <div>
                    <label>Confirm Password</label>
                    <input class="form-control" type="password" name="c_pwd">
                </div>

                <input class="form-control btn btn-primary mt-3" type="submit" name="submit" value="submit"
                    class="btn btn-primary">
            </form>
        </div>

    </div>
</div>


<?php
include 'includes/footer.php';

?>