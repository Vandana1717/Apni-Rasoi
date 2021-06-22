<?php

session_start();

    if(isset($_POST['contact'])){
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
    $name = $_POST['name'];
    $id = $_POST['id'];
    $message = $_POST['msg'];
    $sql = "INSERT INTO `register`.`contacts` (`name`,  `e-mail` ,  `msg`) VALUES ('$name', '$id', '$message');";
    mysqli_query($con,$sql);
    $_SESSION['name']=$name;
    $_SESSION['success']="Submitted Succesfully";
       echo"Submitted Successfully";
    
    $con->close();
    } 
    

?>