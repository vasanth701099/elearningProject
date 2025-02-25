<?php
include 'connect.php';
if (isset($_POST['signUp'])){
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $cpassword = $_POST['cpassword'];
    $phone = $_POST['phone'];

    $checkEmail  =" SELECT * FROM users where email = '$email'";
    $result = $conn->query($checkEmail);
    if($result->num_rows>0){
        echo "Email Address Already Exists !";

    }
    else{
        $insertQuery = "INSERT INTO users(name,email,password,cpassword,phone) VALUES ('$name', '$email', '$password', '$cpassword', '$phone')";
        if($conn->query($insertQuery)==TRUE){
            header("Location:signin.php");
         }
        else{
        echo "Error: " . $conn->error;
    }
     
}
}

?>