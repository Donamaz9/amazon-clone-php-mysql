<?php
		

	session_start();

	$conn=mysqli_connect("localhost","root","","amazon");
	if(!empty($_SESSION)){
			$is_logged_in=1;
			$user_id=$_SESSION['user_id'];
			$query2="SELECT * FROM wishlist WHERE  user_id=$user_id AND product_id=$product_id";
			$result2=mysqli_query($conn,$query2);
			$num_row=mysqli_fetch_assoc($result2);

		//ran a query to check whether the user has already added the product to wishlist. 
			$query3="SELECT * FROM cart WHERE  user_id=$user_id AND product_id=$product_id";
			$result3=mysqli_query($conn,$query3);
			$num_row2=mysqli_fetch_assoc($result3);

	}else{
		$is_logged_in=0;
	}


	$product_id=$_GET['id'];
	//fetch the  details of the products 
	$query="SELECT * FROM products WHERE product_id=$product_id";
	$result=mysqli_query($conn,$query);
	$result=mysqli_fetch_assoc($result);
	
	$img_path=explode(",",$result['bg'])[0];
	$img_path=substr($img_path,2,strlen($img_path)-3);

	


?>
	<?php include("includes/header.php"); ?>

	<div class="container mt-5">
		<div class="row">
			<div class="col-6">
				<img src="<?php echo $img_path; ?>" style="width:100%;height:400px;">
			</div>
			<div class="col-6">
				<h1><?php echo $result['name']; ?></h1>
				<h4>Rs.<?php echo $result ['price']; ?></h4>
				<p><?php echo $result['details'] ?></p>
				
				<?php 
				if($is_logged_in){
						if($num_row2){
						echo'<button id="wishlist-btn" class="btn btn-lg mt-2" style="border: 1px solid black;background-color:green;">Added to cart</button>';
					}else
					{     echo

					'<button id="cart-btn"  class="btn btn-lg mt-2"style="background-color: #F2CA65;  border: 1px solid black;">Add To Cart </button>	';
					}

				}else{
					echo

					'<a href="login_form.php" class="btn btn-lg mt-2"style="background-color: #F2CA65;  border: 1px solid black;">Add To Cart </a>	';
				}
				



				if($is_logged_in)
				{
						if($num_row){
						echo'<button id="wishlist-btn" class="btn btn-lg btn-dark mt-2" style="border: 1px solid black;background-color:blue;">Wishlisted</button>';
					}else
					{     echo

					'	<button id="wishlist-btn" class="btn btn-lg btn-dark mt-2" style="border: 1px solid black;">Wishlist </button>;';
					}

				}else{
					echo

					'	<a href="login_form.php" class="btn btn-lg btn-dark mt-2" style="border: 1px solid black;">Wishlist </a>;';

				}


				

					?>
			</div>

		</div>
	</div>

<script type="text/javascript">
	$(document).ready(function(){
		$('#wishlist-btn').click(function(){
			//if($('#wishlist-btn').text()==='Wishlist'){
				$.ajax({
					url:'add_wishlist.php?product_id='+ <?php echo 
					$product_id; ?> ,
					method:'GET',
					success:function(data){
						$('#wishlist-btn').text('Wishlisted');
						$('#wishlist-btn').css('background-color','blue');
						console.log(data);
					},
					error:function(error)
					{
						console.log(error);
					}
			
			})	

			//}

		 
		 
		 
			
		 
		})


		$('#cart-btn').click(function(){

			alert('HELLO');
			//AJAX REQUEST TO INSERT INTO THE CART TABLE
			$.ajax({
				url:'add_to_cart.php?product_id='+ 
				<?php echo $product_id; ?> ,
				method:'GET',
				success:function(data){
					$('#cart-btn').text('Added to cart');
						$('#cart-btn').css('background-color','green');
					console.log(data)
				},
				error:function(error){
					console.log(error)
				}

			})
		})
	})
</script>
</body>
</html>