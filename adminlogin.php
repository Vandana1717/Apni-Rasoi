<?php
require('connect.inc.php');
require('functions.inc.php');
$msg='';
if(isset($_POST['submit'])){
	$username=get_safe_value($con,$_POST['uname']);
	$password=get_safe_value($con,$_POST['pass']);
	$sql="select * from admin_users where username='$username' and password='$password'";
	$res=mysqli_query($con,$sql);
	$count=mysqli_num_rows($res);
	if($count>0){
		$_SESSION['ADMIN_LOGIN']='yes';
		$_SESSION['ADMIN_USERNAME']=$username;
		header('location:categories.php');
		die();
	}else{
		$msg="Please enter correct login details";	
	}
	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apni Rasoi | Admin Login</title>
    <link rel="stylesheet" href="styleadminlogin.css">
    
    
</head>
<body>
    <main>
        
        <section>
        <h2>Admin Login Page</h2><br>    
        <div class="container">    
        <form id="login" method="POST" >    
        <label><b>User Name     
        </b>    
        </label>    
        <input type="text" name="uname" id="Uname" placeholder="Username">    
        <br><br>    
        <label><b>Password     
        </b>    
        </label>    
        <input type="Password" name="pass" id="Pass" placeholder="Password">    
        <br><br>    
        <button type="submit" name="submit" id="log">Login</button>
        <br><br>   
            
                
                
            
            
        </form>
        </div>
        <?php echo $msg?>
        </section>
    </main>
    
</body>
</html>
