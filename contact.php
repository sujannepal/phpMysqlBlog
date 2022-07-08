<?php
include 'includes/header.php';
?>

<div class="wrapper">
    <div class="container">
        <div class="row text-center">
            <h5>Feedback Form</h5>
        </div>
        <div class="row">
            <div class="col-sm-4 offset-sm-4">
                <form method="POST" action="includes/contact.inc.php">
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="text" class="form-control" id="" name="fb_by_name" placeholder="Your name"
                            required>
                    </div>
                    <div class="form-group">
                        <label for="exampleFormControlInput1">Email address</label>
                        <input type="email" class="form-control" name="fb_by_email"
                            placeholder="(optional)">
                    </div>

                    <div class="form-group">
                        <label for="exampleFormControlTextarea1">Your Message</label>
                        <textarea class="form-control" name="fb_msg" rows="3" required></textarea>
                    </div>
                    <input type="submit" name="contactSubmit" value="Submit" class="btn btn-primary mt-3">

                </form>
            </div>
        </div>
    </div>
</div>

<?php
include 'includes/footer.php';
?>