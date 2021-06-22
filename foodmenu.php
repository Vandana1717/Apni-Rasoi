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
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Food Menu </title>
    <link rel="stylesheet" href="stylefoodmenu.css">
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
      
      
      <?php
			foreach($cat_arr as $list){
				?>
			    	<a href="categories.php?id=<?php echo $list['id']?>"><?php echo $list['categories']?></a>
				<?php
			}
	?>
      

      
   </nav>
   <main>
     <section>
      <img src="indian_food.jpg" alt="not available" width="1500" height="600" style="filter: opacity(50%)"> 
      <div class="container">
    <h1><br>HeLLOoo FOODIEee</h1></header>
  <h2><br><marquee direction="left" width="50%">Find Your Favourite Food Here...!!!</marquee> </h2>
  <h2>_____________________________________________________________________</h2>
  
  
  <br><b><a href="resturantIndian.html" target="_blank"> <img src="indian_food2.jpg"></a><br></b>  
  <br><b><a href="resturant-chinese.html" target="_blank"> <img src="chinese_food_2.jpg"></a><br></b>
  <br><b><a href="restItalian.html" target="_blank"> <img src="italian_food.jpg"></a><br></b>
  <br><b><a href="resturantDessert.html" target="_blank"> <img src="dessert_food.jpg"></a><br></b>
  <br><b><a href="restBeverage.html" target="_blank"> <img src="beverage_food.jpg"></a><br></b>
  </div>
</section>
</main>
</body>
</html>