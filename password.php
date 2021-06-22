<?php

session_start();

    if(isset($_POST['ok'])){
    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);

    // Check for connection success
    if(!$con){
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    $errors=array();
    // echo "Success connecting to the db";
    // forget password
    $uname = $_POST['uname'];
    $que = $_POST['Question'];
    $ans = $_POST['ans'];

    $password_query="SELECT * FROM `register`.`customer` WHERE UserName = '$uname'"; //Question = '$que' AND Answer='$ans' LIMIT 1";
    $result= $con->query($password_query);
 
     
     if($userpassword = $result->fetch_assoc())
     {
        if($userpassword['UserName'] == $uname)array_push($errors,"username");
         if($userpassword['Question'] == $que)array_push($errors,"question");
         if($userpassword['Answer'] == $ans)array_push($errors,"answer");
     }
     if(count($errors)==3)
    {
        header('location: addpassword.html');
       
    }
} 
    
    
?>
