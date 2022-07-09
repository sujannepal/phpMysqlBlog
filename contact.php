<?php 
    include("includes/header.php");
?>

<div class="container">
    <h1 align="center" class="mt-5 heading-one mb-4">Contact us</h1>
    <div class="w-80 mx-auto">
        <form method="POST" action="includes/contact.inc.php">
            <div class="form-group">
                <label class="label">Name*</label>
                <input type="text" name="name" class="form-control mb-4 input-field" required="required" />
            </div>
            <div class="form-group">
                <label class="label">Email*</label>
                <input type="email" name="email" class="form-control mb-4 input-field" required="required" />
            </div>
            <!--
            <div class="form-group">
                <label class="label">Contact*</label>
                <input type="number" name="contact" class="form-control mb-4 input-field" required="required" />
            </div>
            -->
            <div class="form-group">
                <label class="label">Message*</label>
                <textarea name="message" class="form-control mb-4 input-field" rows="5" required="required"></textarea>
            </div>
            <button type="submit" name="feedbackSubmit" class="mb-5 btn custom-btn">Send Message</button>
        </form>
    </div>
</div>

<?php 
    include("includes/footer.php")
?>