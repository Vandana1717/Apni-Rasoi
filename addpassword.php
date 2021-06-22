<?php

session_start();

    if(isset($_POST['done'])){
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
    $uname = $_POST['uname'];
        $pass = $_POST['pass'];
        $passw = $_POST['passw'];
        $er=array();
        if($pass !=$passw)array_push($er,"Passwords do not match");
        if(count($er)==0)
    {
            $pass=md5($passw);//this will encrypt the password
       
        $sql="UPDATE `register`.`customer` SET Pass='$pass' WHERE UserName = '$uname' ";
       
        mysqli_query($con,$sql);
        header('location: login.html');
    }
    else{
        echo "not success";
    }



}
