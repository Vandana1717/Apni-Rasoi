<?php
require('connect.inc.php');
require('functions.inc.php');
$cat_res=mysqli_query($con,"select * from categories where status=1 order by categories asc");
$cat_arr=array();
while($row=mysqli_fetch_assoc($cat_res)){
	$cat_arr[]=$row;	
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Apni Rasoi | Home </title>
    <link rel="stylesheet" href="style.css">
    <style>
        a:hover{
            background-color: rgb(166, 201, 11);
            color: #000;
        }
    </style>

</head>
<body>
    <header>
        <h1> Welcome Foodie </h1>
        <img src="logo.jfif" alt="not available" height="150">
    </header>
    <nav>
        
        <a  href="Signup.html" target="_blank">SIGN UP</a>
        <a  href="login.html" target="_blank">LOG IN</a>
        <div class="dropdown">
  <button class="dropbtn" onclick="myFunction()">FOOD MENU 
    <i class="fa fa-caret-down"></i>
  </button>
  <div class="dropdown-content" id="myDropdown">
  <?php
                foreach($cat_arr as $list){
                    ?>
                        <a href="menuitems.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a>
                    <?php
                }
        ?>
  </div>
  </div> 
        
        
        <a href="HomePage.html" >HOME</a>
        

        
     </nav>
     <script>
/* When the user clicks on the button, 
toggle between hiding and showing the dropdown content */
function myFunction() {
  document.getElementById("myDropdown").classList.toggle("show");
}

// Close the dropdown if the user clicks outside of it
window.onclick = function(e) {
  if (!e.target.matches('.dropbtn')) {
  var myDropdown = document.getElementById("myDropdown");
    if (myDropdown.classList.contains('show')) {
      myDropdown.classList.remove('show');
    }
  }
}
</script>
     <main>
         <section>
             <div class="container">
                 
             <img src="FOOD2.jpg" alt="not available" width="1500" height="600" style="filter: opacity(50%)">
            
             <div class="centered">Find your favourite delicious hot food!</div>
             <form action="search.php" method="get">
                
            <div class ="srch"> <input type="text" placeholder="I would like to eat..." name="str" style= "font-size: 15px;padding: 5px;width: 100%; " >
            </form>
            
             <button style="background-color: #4CAF50; 
                            border: none;
                            color: white;
                            padding: 15px 32px;
                            text-align: center;
                            text-decoration: none;
                            display: inline-block;
                            font-size: 15px;" type="submit">Search Food!  </button></div>
                            <!-- create a global variable of list for result
                            on the tap of the button run a function that gets the values from the database and the value in the list
                            show that in this container -->
             </div>

            <h2>Popular dishes of the week</h2>
            <img src="Dosa.jfif" alt="not available" width="33%" height="400" >
            <img src="Burger.jfif" alt="not available" width="33%" height="400" >
            <img src="kathiiroll.jpg" alt="not available" width="33%" height="400">
            <h3>The easiest way to your favourite food</h3>

         </section>
     </main>
     <footer>
        <a href="faq.html">FAQ</a>
        <a href="Contactus.html">Contact Us</a>
        <a href="#">Terms of Use</a>
        <a href="#">Privacy Policy</a>
        <a href="#">&copy; 2021 | Banasthali Canteen</a>
     </footer>
</body>
</html>
