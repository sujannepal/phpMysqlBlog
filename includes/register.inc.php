<?php

if(isset($_POST["submit"])){
    $first_name = $_POST["first_name"];
    $last_name = $_POST["last_name"];
    $user_email = $_POST["user_email"];
    $pwd = $_POST["pwd"];
    $c_pwd = $_POST["c_pwd"];

    require_once '../config/db_config.php';
    require_once 'functions.inc.php';
    
    if(emptyInputSignup($first_name,$last_name,$user_email, $pwd) !== false){
        header("location: ../register.php?error=$first_name.$last_name.$user_email.$pwd");
        exit();
    }

    if(invalidEmail($user_email) !== false){
        header("location: ../register.php?error=invalidemail");
        exit();
    }

    if(pwdMismatch($pwd, $c_pwd) !== false){
        echo '<script>
            alert("Password doesn\'t match with confirm password");
            window.location = "../register.php";
        </script>';
        // header("location: ../register.php?error=pwdmismatch");
        exit();
    }

    if(emailAlreadyTaken($conn, $user_email) !== false){
        echo '<script>
            alert("Email already exists");
            window.location = "../register.php";
        </script>';
        // header("location: ../register.php?error=emailtaken");
        exit();
    }


    createUser($conn, $first_name, $last_name, $user_email, $pwd);
}
else{
    header("location: ../register.php");
    exit();
}
