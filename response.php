<?php 
    include_once("includes/header.php");
    
    $error = $_GET['error'];
    $message = $_GET['message'];
    $redirect_url = $_GET['redirect'];

    if($error == "true"){
        echo '
            <div class="response-box">
                <i class="fa fa-check-circle text-danger mb-4" aria-hidden="true" style="font-size: 6rem;"></i>
                <p class="text-danger" style="font-size: 2rem;">'.$message.'</p>
            </div>        
        ';
        echo '
            <script>
                setTimeout(()=>{
                    window.location = "'.$redirect_url.'";
                },3000);
            </script>
        ';
    }
    else{
        echo '
            <div class="response-box">
                <i class="fa fa-check-circle text-success mb-4" aria-hidden="true" style="font-size: 6rem;"></i>
                <p class="text-success" style="font-size: 2.5rem;">'.$message.'</p>
            </div>        
        ';
        echo '
            <script>
                setTimeout(()=>{
                    window.location = "'.$redirect_url.'";
                },3000);
            </script>
        ';
    }

?>


<?php 
    include_once("includes/footer.php")
?>