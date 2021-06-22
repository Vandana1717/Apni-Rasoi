<?php
 

require('top.menu.php');

if(isset($_GET['id']) && $_GET['id']!=''){
	$cat_id=mysqli_real_escape_string($con,$_GET['id']);
	if($cat_id>0){
		$get_product=get_product($con,'',$cat_id);
	}else{
		?>
		<script>
		window.location.href='Home.php';
		</script>
		<?php
	}
}else{
	?>
	<script>
	window.location.href='Home.php';
	</script>
	<?php
}										
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title> FOOD Menu..!!</title>
    <link rel="stylesheet" href="styleitem.css">
</head>

<body>

    <br><br><br>
    <div class="wrapper">
	
        <div class="title">
            <h1><span>Find your favorite food here..!!!</span></h1>
        </div>
        <div class="clear"></div>
		
				
		
                <?php if(count($get_product)>0){?>
                    <div class="pizza">	
					
                            <!-- Start Product View -->
								
                                        <?php
										foreach($get_product as $list){
										?>


												<div class="PIZZA">
										
													<a  href="product.php?id=<?php echo $list['id']?>">
													
													
														<img   src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" alt="product images">
													</a>
										
												<?php echo $list['name']?></a></h4>
												
														<li><?php echo  $list['price']?></li>
										
												<select id="qty">
												<option>Qty: 1</option>
												<option> 2</option>
												<option> 3</option>
												</select>

												</p>
												
										</div>

										<?php } ?>
                                    
					<?php } else { 
						echo "Data not found";
					} ?>

</div>
</div>

								<a style="border: 1p solid #ef444e;
								padding: 10px 20px;
								background-color: #ef4478;
								color: white;
								text-transform: uppercase;
								flex: right;
								margin: 5px 0;
								
								font-size: 20px;font-weight: 400;
								cursor: pointer;
								font-family: Segoe UI, Tahoma, Geneva, Verdana, sans-serif;
								border-radius: 50px;"  href="javascript:void(0)" onclick="manage_cart('<?php echo $get_product['0']['id']?>','add')">Add to cart</a>
                            
				

           
								
				
      
                
                
                
            
</body>
</html>