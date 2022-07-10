<?php
    include 'includes/header.php';

    require_once 'config/db_config.php';
    require_once 'includes/functions.inc.php';
    
    $first_name = $last_name = $user_email = $pwd = $c_pwd ="";
    $msg_first_name = $msg_last_name = $msg_user_email = $msg_pwd= $msg_c_pwd = "";
    
    //Form Validation
    if(isset($_POST["submit"])){

        $first_name = trim($_POST["first_name"]);
        $last_name = trim($_POST["last_name"]);
        $user_email = trim($_POST["user_email"]);
        $pwd = trim($_POST["pwd"]);
        $c_pwd = trim($_POST["c_pwd"]);
        
        //Empty field check
        if(empty($first_name)){
            $msg_first_name = "Please enter first name.";
        }
        if(empty($last_name)){
            $msg_last_name = "Please enter last name.";
        }
        if(empty($user_email)){
            $msg_user_email = "Please enter email.";
        }

        if(empty($pwd) || strlen($pwd)<6){
            $msg_pwd = "Password must be at least 6 characters.";
        }
        
        //Password and Confirm Password
        if($pwd != $c_pwd){
            $msg_c_pwd = "Password and Confirm password must be same.";
        }

        //Email validation
        if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
            $msg_user_email = "Please enter email.";
        }

        if(empty($msg_first_name) && empty($msg_last_name) && empty($msg_user_email) && empty($msg_pwd) && empty($msg_c_pwd)){

            //Check if email already exists in system
            if(emailAlreadyTaken($conn, $user_email) !== false){
                $form_valid  == false;
                $msg_user_email = "Email already taken.";
                
                header("location: response.php?error=true&&message=Email Already Taken&&redirect=register.php");

            }else{
                createUser($conn, $first_name, $last_name, $user_email, $pwd);
            }
        }
        else{
            header("location: response.php?error=true&&message=Error! Please try again.&&redirect=register.php");

        }
    }
?>
<div class="wrapper">
    <div class="container">
        <div>
            <h1 align="center" class="heading-one mb-4">Register</h1>
        </div>

        <div class="w-80 mx-auto">
            <form action="<?php echo  htmlspecialchars($_SERVER["PHP_SELF"]);?>" method="post">
                <div class="mb-3">
                    <label class="label">First Name*</label>
                    <input class="form-control input-field" type="text" name="first_name" 
                    value="<?php echo $first_name; ?>" />
                    <label style="color:red"><?php echo $msg_first_name; ?> </label>
                </div>
                <div class="mb-3">
                    <label class="label">Last Name*</label>
                    <input class="form-control input-field" type="text" name="last_name" 
                    value="<?php echo $last_name; ?>"/>
                    <label style="color:red"><?php echo $msg_last_name; ?> </label>

                </div>
                <div class="mb-3">
                    <label class="label">Email*</label>
                    <input class="form-control input-field" type="email" name="user_email"  
                    value="<?php echo $user_email; ?>"/>
                    <label style="color:red"><?php echo $msg_user_email; ?> </label>

                </div>
                <div class="mb-3">
                    <label class="label">Password*</label>
                    <input class="form-control input-field" type="password" name="pwd"  />
                    <label style="color:red"><?php echo $msg_pwd; ?> </label>

                </div>
                <div class="mb-4">
                    <label class="label">Confirm Password*</label>
                    <input class="form-control input-field" type="password" name="c_pwd"  />
                    <label style="color:red"><?php echo $msg_c_pwd; ?> </label>

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