<?php
    include 'includes/header.php';
?>
<div class="wrapper">
    <div class="container">
        <div>
            <h1 align="center" class="heading-one mb-4">Register</h1>
        </div>

        <div class="w-80 mx-auto">
            <form action="includes/register.inc.php" method="post">
                <div class="mb-3">
                    <label class="label">First Name*</label>
                    <input class="form-control input-field" type="text" name="first_name" required="required" />
                </div>
                <div class="mb-3">
                    <label class="label">Last Name*</label>
                    <input class="form-control input-field" type="text" name="last_name" required="required" />
                </div>
                <div class="mb-3">
                    <label class="label">Email*</label>
                    <input class="form-control input-field" type="email" name="user_email" required="required" />
                </div>
                <div class="mb-3">
                    <label class="label">Password*</label>
                    <input class="form-control input-field" type="password" name="pwd" required="required" />
                </div>
                <div class="mb-4">
                    <label class="label">Confirm Password*</label>
                    <input class="form-control input-field" type="password" name="c_pwd" required="required" />
                </div>
                <input class="btn custom-btn mb-5 mb" type="submit" name="submit" value="submit"
                    class="btn custom-btn">
            </form>
        </div>

    </div>
</div>


<?php
include 'includes/footer.php';

?>