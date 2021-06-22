<?php
$insert = false;
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
    $que = $_POST['que'];
    $ans = $_POST['ans'];


    $sql = "INSERT INTO `register`.`customer` (`Fname`, `lname`, `Hostel`, `Ph_no`, `Email_id`, `UserName`, `Password` , `Question`, `Answer`) VALUES ('$name', '$lname', '$hname', '$num', '$id', '$uname','$pass','$passw','$que','$ans');";
    // echo $sql;

    // Execute the query
    if($con->query($sql) == true){
        // echo "Successfully inserted";

        // Flag for successful insertion
        $insert = true;
    }
    else{
        echo "ERROR: $sql <br> $con->error";
    }

    // Close the database connection
    $con->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apni Rasoi | Signup</title>
    <link rel="stylesheet" href="stylesignup.css">
</head>
<body>
    <header>
        <h1> Welcome Foodie </h1>
        <img src="logo.jfif" alt="not available" height="150">
    </header>
    <nav>
        
        <a href="Signup.html" >SIGN UP</a>
        <a href="login.html" target="_blank">LOG IN</a>
        <a href="#" target="_blank">FOOD MENU </a>
        <a href="HomePage.html" target="_blank">HOME</a>
     </nav>
     <main>
         <section>
         <?php
        if($insert == true){
        echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us </p>";
        }
    ?>
         <form action="Signup.php" method="post">
            <div class="container">
                <label for="name">FirstName</label><br>
                <input type="text" required><br>
                <label for="lname">LastName</label><br>
                <input type="text" >
                <br>
                <label for="hname">Hostel</label><br>
                <input type="text" required>
                <br>
                <label for="num">PhoneNumber</label><br>
                <input type="text" required>
                <br>
                <label for="id">Email-id</label><br>
                <input type="text" required >
                <br>
                <label for="uname">UserName</label><br>
                <input type="text" required>
                <br>
                <label for="pass">Password</label><br>
                <input type="password" required>
                <br>
                <label for="passw">Confirm Password</label><br>
                <input type="password" required>
                <br>
                <label for="que">Security Question</label><br>
                 <select name="Question" id="Question" required>
                         <option value="">None</option>
                        <option value="que1">What is your birth place ?</option>
                        <option value="que2">What is your first school name ?</option>
                        <option value="que3">What is your favourite dish ?</option>
                        <option value="que4">What is your pet name ? </option>
                </select>
                <br>
                <label for="ans">Answer</label><br>
                <input type="text" required ><br>
                <br>
                <button type="submit">SignUp</button>
            </div>
            </form>
         </section>
     </main>
     <footer>
        <a href="#">FAQ</a>
        <a href="Contactus.html">Contact Us</a>
        <a href="#">Terms of Use</a>
        <a href="#">Privacy Policy</a>
        <a href="#">&copy; 2021 | Banasthali Canteen</a>
     </footer>
</body>
</html>