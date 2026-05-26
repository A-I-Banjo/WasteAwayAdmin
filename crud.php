<?php
require_once 'functions.php';


//ADMIN INSERT
if (isset($_POST['insert_new_admin'])) {
    //Compare passwords

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    //Validate Username
    if(!preg_match("/^[a-zA-Z-' ]*$/", $username)) {
        echo "<script>alert('Only letters and white space allowed in username'); window.location.href='admins.php';</script>";
        }else{
            // Check if username already exists in database
            $result = queryMysql("SELECT * FROM admins WHERE username='$username'");
            if ($result->rowCount() > 0) {
                echo "<script>alert('Username already taken'); window.location.href='admins.php';</script>";
            }
        }

    //Validate Email        
    if (empty($email)) {
        echo "<script>alert('Email is required');</script>";
    }
        // Check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email format'); window.location.href='admins.php';</script>";
        }else{
            // Check if email already exists in database
            $result = queryMysql("SELECT * FROM admins WHERE email='$email'");
            if ($result->rowCount() > 0) {
                echo "<script>alert('Email already registered'); window.location.href='admins.php';</script>";
            }
        }

    //Validate Password
    if(empty($password)) {
            echo "<script>alert('Password is required');</script>";
    } elseif ($password !== $confirm) {
            echo "<script>alert('Passwords do not match. Try Again'); window.location.href='admins.php';</script>";
        }else{
            $password = sanitizeString($_POST['password']);
            $username = sanitizeString($_POST['username']);
            $email = sanitizeString($_POST['email']);
        
            $insert_admin = queryMysql("INSERT INTO admins (username, email, password) VALUES ('$username', '$email', '$password')");
    if ($insert_admin) {
        echo "<script>alert('New Admin Added Successfully!'); window.location.href='admins.php';</script>";
    } else {
        echo "<script>alert('Error Adding New Admin. Please try again.'); window.location.href='admins.php';</script>";
    }
    }
}

/*Update Admin [Green Button]*/
if (isset ($_POST['admin_click_update_btn'])){
    $id = $_POST['admin_id'];
    $array_result = [];

$fetch_all_admins = queryMysql("SELECT * FROM admins WHERE admin_id='$id'");
 if ($fetch_all_admins->rowCount() > 0) {
while ($row = $fetch_all_admins->fetch()) {           
   
        array_push($array_result, $row);
        header('content-type: application/json');
        echo json_encode($array_result);
    }
 }else{
    echo '<h4>No Record Found</h4>';
 }
}

/*Update Admin [Modal Button]*/
if (isset ($_POST['update'])){

    $id = $_POST['admin_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $currentTime = time();
    $createdAt = date("Y-m-d H:i:s", $currentTime);

    $update_admin = queryMysql("UPDATE admins SET username='$username', email='$email', password='$password', created_at='$createdAt' WHERE admin_id='$id'");
    
    if($update_admin){

     echo "<script>alert('Admin Updated Successfully!'); window.location.href='admins.php';</script>";
    } else {
        echo "<script>alert('Error Updating Admin. Please try again.'); window.location.href='admins.php';</script>";
    }

}

/*FIX Admin Delete*/
if (isset ($_POST['click_delete_btn'])){

    $id = $_POST['admin_id'];

    $delete_admin = queryMysql("DELETE FROM admins WHERE admin_id='$id'");

    if($delete_admin){
     echo "<script>alert('Admin Deleted Successfully!'); window.location.href='admins.php';</script>";
    } else {
        echo "<script>alert('Error Deleting Admin. Please try again.'); window.location.href='admins.php';</script>";
    }
}



/*MEMBERS INSERT*/
if (isset($_POST['insert_new_member'])) {
    //Compare passwords

    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm_password'];

    //Validate Username
    if(!preg_match("/^[a-zA-Z-' ]*$/", $username)) {
        echo "<script>alert('Only letters and white space allowed in username'); window.location.href='members.php';</script>";
        }else{
            // Check if username already exists in database
            $result = queryMysql("SELECT * FROM members WHERE username='$username'");
            if ($result->rowCount() > 0) {
                echo "<script>alert('Username already taken'); window.location.href='members.php';</script>";
            }
        }

    //Validate Email        
    if (empty($email)) {
        echo "<script>alert('Email is required');</script>";
    }
        // Check if e-mail address is well-formed
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            echo "<script>alert('Invalid email format'); window.location.href='members.php';</script>";
        }else{
            // Check if email already exists in database
            $result = queryMysql("SELECT * FROM members WHERE email='$email'");
            if ($result->rowCount() > 0) {
                echo "<script>alert('Email already registered'); window.location.href='members.php';</script>";
            }
        }

    //Validate Password
    if(empty($password)) {
            echo "<script>alert('Password is required');</script>";
    } elseif ($password !== $confirm) {
            echo "<script>alert('Passwords do not match. Try Again'); window.location.href='members.php';</script>";
        }else{
            $password = sanitizeString($_POST['password']);
            $username = sanitizeString($_POST['username']);
            $email = sanitizeString($_POST['email']);
        
            $insert_admin = queryMysql("INSERT INTO members (username, email, password) VALUES ('$username', '$email', '$password')");
    if ($insert_admin) {
        echo "<script>alert('New Member Added Successfully!'); window.location.href='members.php';</script>";
    } else {
        echo "<script>alert('Error Adding New Member. Please try again.'); window.location.href='members.php';</script>";
    }
    }
}

/*SANITIZE Update Member [Green Button]*/
if (isset ($_POST['member_click_update_btn'])){
    $id = $_POST['member_id'];
    $array_result = [];

$fetch_all_members = queryMysql("SELECT * FROM members WHERE member_id='$id'");
 if ($fetch_all_members->rowCount() > 0) {
while ($row = $fetch_all_members->fetch()) {           
   
        array_push($array_result, $row);
        header('content-type: application/json');
        echo json_encode($array_result);
    }
 }else{
    echo '<h4>No Record Found</h4>';
 }
}

/*SANITIZE Update Member [Modal Button]*/
if (isset ($_POST['update_member'])){

    $id = $_POST['member_id'];
    $username = $_POST['username'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $currentTime = time();
    $createdAt = date("Y-m-d H:i:s", $currentTime);

    $update_admin = queryMysql("UPDATE members SET username='$username', email='$email', password='$password', created_at='$createdAt' WHERE member_id='$id'");
    
    if($update_admin){

     echo "<script>alert('Member Updated Successfully!'); window.location.href='members.php';</script>";
    } else {
        echo "<script>alert('Error Updating Member. Please try again.'); window.location.href='members.php';</script>";
    }

}

