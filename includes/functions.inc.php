<?php
    session_start();

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
        $sql = "SELECT * FROM user WHERE user_email = ?";
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
            return false;
        }
        mysqli_stmt_close($stmt);
    }


    function createUser($conn, $first_name, $last_name, $user_email, $pwd){
        $sql = "INSERT INTO user (user_fname, user_lname, user_email, user_pwd, user_role, created_date) VALUES (?,?,?,?,?,?);";
        
        $stmt = mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo '
                <script>
                    alert("Something went wrong please try again !!!");
                    window.location = "../login.php";
                </script>
            ';
        }
        
        $created_date = date("Y-m-d H:i:s");
        $user_role = "user";
        $hashedPwd = password_hash($pwd, PASSWORD_BCRYPT);

        mysqli_stmt_bind_param($stmt,"ssssss", $first_name, $last_name, $user_email, $hashedPwd, $user_role, $created_date);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../response.php?error=false&&message=Account created successfully&&redirect=login.php");
        exit();
    }

    function loginUser($conn, $user_email, $pwd){
        $userData = emailAlreadyTaken($conn, $user_email);


        if($userData == false){
            echo '
                <script>
                    alert("Wrong login credentials");
                    window.location = "../login.php";
                </scrip>
            ';
            exit();
        }
        
        $pwdHashed = $userData["user_pwd"];
        $checkPwd = password_verify($pwd, $pwdHashed);

        if($checkPwd == false){
            echo '
                <script>
                    alert("Wrong password !!!");
                    window.location = "../login.php";
                </script>
            ';
        }
        else if($checkPwd == true){
            $_SESSION["username"] = $userData["user_fname"]; 
            $_SESSION["userId"] = $userData["user_id"];
            $_SESSION["profile_pic"] = $userData[""];
            $_SESSION["userRole"] = $userData["user_role"];
            
        
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
    function postComment($conn, $commentDetail, $postId, $userId){
        $sql = "INSERT INTO comment (comment_detail, post_id, user_id) VALUES (?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            echo '
                <script>
                    alert("Error while posting comment. Please try again !!!");
                    window.location = "../blogdetail.php?id='.$postId.'";
                </script>
            ';
            exit();
        }
        mysqli_stmt_bind_param($stmt,"sii",$commentDetail, $postId, $userId);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);

        header("location: ../blogdetail.php?id=".$postId);
        exit();
    }

    //User feedback from contact page
    function submitUserFeedback($conn, $fbByName, $fbByEmail, $fbMessage){
        $sql = "INSERT INTO user_feedback (fb_by_name, fb_by_email, fb_msg) VALUES (?,?,?)";
        $stmt = mysqli_stmt_init($conn);
        if(!mysqli_stmt_prepare($stmt, $sql)){
            header("location: ../contact.php?error=true");
            exit();
        }

        mysqli_stmt_bind_param($stmt,"sss", $fbByName, $fbByEmail, $fbMessage);
        mysqli_stmt_execute($stmt);
        mysqli_stmt_close($stmt);
        $conn->close();

        header("location: ../response.php?error=false&&message=Thank you for giving us feedback&&redirect=contact.php");
        /*
        $db = new mysqli("localhost","root", "", "techblog");
        $query = $db->prepare("INSERT INTO user_feedback(fb_by_name, fb_by_email, fb_msg) VALUES (?,?,?)");
        $query->bind_param('sss', $fbByName, $fbByEmail, $fbMessage);
        $response = $query->execute();
        if($response) {
            echo "Record successfully inserted";
        }
        else {
            echo "Unable to stoer the records";
        }
        */
    }

?>