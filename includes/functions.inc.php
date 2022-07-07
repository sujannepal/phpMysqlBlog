<?php

function emptyInputSignup($first_name,$last_name,$user_email, $pwd){
    $result = false;
    if(empty($first_name) || empty($last_name) || empty($user_email) || empty($pwd)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function invalidEmail($user_email){
    $result = true;
    if(!filter_var($user_email, FILTER_VALIDATE_EMAIL)){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function pwdMismatch($pwd, $c_pwd){
    $result = true;
    if($pwd != $c_pwd){
        $result = true;
    }
    else{
        $result = false;
    }
    return $result;
}

function emailAlreadyTaken($conn, $user_email){
    $sql = "SELECT * FROM user WHERE user_email = ?;";
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../register.php?error=stmtfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"s",$user_email);
    mysqli_stmt_execute($stmt);

    $resultData = mysqli_stmt_get_result($stmt);
    if($row = mysqli_fetch_assoc($resultData)){
        return $row;

    }
    else{
        $result = false;
        return $result;
    }

    mysqli_stmt_close($stmt);
}


function createUser($conn, $first_name, $last_name, $user_email, $pwd){
    
    $sql = "INSERT INTO user (user_fname, user_lname, user_email, user_pwd, user_role, created_date) VALUES (?,?,?,?,?,?);";
    
    $stmt = mysqli_stmt_init($conn);

    if(!mysqli_stmt_prepare($stmt, $sql)){
        
        header("location: ../register.php?error=insertfailed");
        exit();
    }
    
    $created_date = date("Y-m-d H:i:s");
    $user_role = "user";
    $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT);

    mysqli_stmt_bind_param($stmt,"ssssss", $first_name, $last_name, $user_email, $hashedPwd, $user_role, $created_date);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../login.php?error=none");
    exit();
}

function loginUser($conn, $user_email, $pwd){
   // $sql = "SELECT * FROM user WHERE user_email = ?";
    //$stmt = mysqli_stmt_init($conn);
    
    $userData = emailAlreadyTaken($conn, $user_email);


    if($userData == false){
        header("location: ../login.php?error=loginfailed");
        exit();
    }
    
    $pwdHashed = $userData["user_pwd"];
    $checkPwd = password_verify($pwd, $pwdHashed);

    if($checkPwd == false){
        header("location: ../login.php?error=wrongdetails");
        exit();
    }
    else if($checkPwd == true){
        session_start();
        $_SESSION["username"] = $userData["user_fname"]; 
        $_SESSION["userId"] = $userData["user_id"];
        $_SESSION["userRole"] = $userData["user_role"];
        
       //echo "Welcome ". $_SESSION["userId"];
       header("location: ../index.php");
       exit();
    }

}



// Related to Post
function createPost($conn, $postTitle, $postDesc,$imagePath, $createDate){
    $sql = "INSERT INTO post (post_title, post_desc, image_path, created_date) VALUES (?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header ("location: ../admin/createPost.php?error=createfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"ssss",$postTitle, $postDesc, $imagePath, $createDate);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../admin/index.php");
    exit();
}


function updatePost($conn, $postId, $postTitle, $postDesc,$imagePath){
   // echo  $postId . ":" . $postTitle . ":" .$postDesc . ":" . $imagePath;
   // exit();
    $sql = "UPDATE post SET post_title = ?, post_desc = ?, image_path = ? WHERE post_id = ?" ;
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header ("location: ../admin/updatePost.php?error=updatefailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"sssi",$postTitle, $postDesc, $imagePath, $postId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../admin/index.php");
    exit();
}

function deletePost($conn, $postId){
    $sql = "DELETE from post WHERE post_id = ?";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../admin/index.php?eror=deleterror");
        exit();
    }

    mysqli_stmt_bind_param($stmt, "i", $postId);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../admin/index.php");
    exit();
}

//Post comment to a blog
function postComment($conn, $commentDetail, $postId, $userId, $createDate){
    $sql = "INSERT INTO comment (comment_detail, post_id, user_id, created_date) VALUES (?,?,?,?)";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header ("location: ../admin/createPost.php?error=commentfailed");
        exit();
    }
    mysqli_stmt_bind_param($stmt,"siis",$commentDetail, $postId, $userId, $createDate);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../index.php");
    exit();
}

//User feedback from contact page
function submitUserFeedback($conn, $fbByName, $fbByEmail, $fbMessage, $created_date){
    $sql = "INSERT INTO user_feedback (fb_by_name, fb_by_email, fb_msg, created_date) VALUES (?,?,?,?) ";
    $stmt = mysqli_stmt_init($conn);
    if(!mysqli_stmt_prepare($stmt, $sql)){
        header("location: ../contact.php?error=contactfailed");
        exit();
    }

    mysqli_stmt_bind_param($stmt,"ssss", $fbByName, $fbByEmail, $fbMessage, $created_date);
    mysqli_stmt_execute($stmt);
    mysqli_stmt_close($stmt);

    header("location: ../contact.php?error=none");
    exit();

}