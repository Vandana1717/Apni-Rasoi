<?php 
require('Home.php');
$str=mysqli_real_escape_string($con,$_GET['str']);
if($str!=''){
	$get_product=get_product($con,'','','',$str);
}else{
	?>
	<script>
	window.location.href='Home.php';
	</script>
	<?php
}										
?>


					<?php if(count($get_product)>0){?>
                    
                                        <?php
										foreach($get_product as $list){
										?>
                                            
                                            
										
													<a href="product.php?id=<?php echo $list['id']?>">
														<img style="position:absolute; top:75%; left:40%" src="<?php echo PRODUCT_IMAGE_SITE_PATH.$list['image']?>" height=175 width=25% alt="product images">
													</a>
												</div>
											
												
													<h4 style="position:relative; top:100% ; left:40%"><?php echo $list['name']?></h4>
												
														
														<li style="position:relative; top:100%; left:40%"><?php echo  $list['price']?></li>
													</ul>
												</div>
											
										<?php } ?>
                                   
					<?php } else { 
						echo "Data not found";
					} ?>
                
				
        <!-- End Product Grid -->
        <!-- End Banner Area -->
      