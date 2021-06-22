<?php
session_start();
if(isset($_POST['loguser']))
 {

    // Set connection variables
    $server = "localhost";
    $username = "root";
    $password = "";

    // Create a database connection
    $con = mysqli_connect($server, $username, $password);
    if(!$con)
    {
        die("connection to this database failed due to" . mysqli_connect_error());
    }
    $errors=array();


    $uname = $_POST['uname'];
    $pass = $_POST['pass'];

    if(empty($uname))array_push($errors,"UserName is required");

    if(empty($pass)) array_push($errors,"Password is required");

    if(count($errors)==0)
    {
        $pass=md5($pass);
        $sql = "SELECT * FROM `register`.`customer` WHERE UserName='$uname' AND Pass ='$pass'  ";
       
        $result=mysqli_query($con,$sql);

        if( mysqli_num_rows($result))
        {
            $_SESSION['uname']=$uname;
            $_SESSION['success']="Logged in Successfully";
            echo "success";
            header('location: foodmenu.html');
        }
        else
        {
            echo "not success";
            array_push($errors,"Wrong username/password combination.Please try again.");
        }
    }
    

        $con->close();
}
?>
