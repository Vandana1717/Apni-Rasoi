<?php

session_start();

    if(isset($_POST['name'])){
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

    // Collect post variables
    $name = $_POST['name'];
    $lname = $_POST['lname'];
    $hname = $_POST['hname'];
    $num = $_POST['num'];
    $id = $_POST['id'];
    $uname = $_POST['uname'];
    $pass = $_POST['pass'];
    $passw = $_POST['passw'];
    $que = $_POST['Question'];
    $ans = $_POST['ans'];

    //form validation
    if(empty($name))array_push($errors,"Name is required");
    if(empty($hname))array_push($errors,"Hostel is required");
    if(empty($num))array_push($errors," Phone Number is required");
    if(empty($id))array_push($errors,"E-Mail id is required");
    if(empty($uname))array_push($errors,"UserName is required");
    if(empty($pass))array_push($errors,"Password is required");
    if($pass !=$passw)array_push($errors,"Passwords do not match");
    if(empty($que))array_push($errors,"Security Question is required");
    if(empty($ans))array_push($errors,"Security Answer is required");

    // check database for existing user with username
    $user_check_query="SELECT * FROM `register`.`customer` WHERE UserName = '$uname' or Email_id='$id' LIMIT 1";
   $results= $con->query($user_check_query);

    
    if($user = $results->fetch_assoc())
    {
        if($user['UserName'] == $uname)array_push($errors,"User already exist");
        if($user['Email_id'] == $id)array_push($errors,"This emil id already has a registered username");
    }
    
    if(count($errors)==0)
    {
        $pass=md5($passw);//this will encrypt the password
    
        $sql = "INSERT INTO `register`.`customer` (`Fname`, `lname`, `Hostel`, `Ph_no`, `Email_id`, `UserName`, `Pass` , `Question`, `Answer`) VALUES ('$name', '$lname', '$hname', '$num', '$id', '$uname','$pass','$que','$ans');";
        mysqli_query($con,$sql);
        $_SESSION['uname']=$uname;
        $_SESSION['success']="You are now logged in";
        header('location: login.html');
    }
    
    $con->close();
    } 
    

?>
