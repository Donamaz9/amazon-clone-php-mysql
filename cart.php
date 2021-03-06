<?php 
session_start();
if(empty($_SESSION)){
	header('Location:login_form.php');
}else{
	$is_logged_in=1;
}

?>

<?php 
include("includes/header.php");
?>

<div class="container">
	<h1 class="mt-5">My Cart</h1> 
		<div class="row">
			<div class="col-8">
				<?php 
				
				include ("includes/dbhelper.php");
				$user_id=$_SESSION['user_id'];
				$query="SELECT * FROM cart c JOIN products p ON c.product_id=p.product_id WHERE c.user_id=$user_id"; 
				$result=mysqli_query($conn,$query);
				$counter=0;
				$amount=0;
				while($row=mysqli_fetch_assoc($result)){
						$img_path=explode(",",$row['bg'])[0];
						$img_path=substr($img_path,2,strlen($img_path)-3);
						$amount=$amount +$row['price']*$row['quantity'];

						echo'<div class="card mt-3" id="product-card'.$row['product_id'].'">
						<div class="row"> 
							<div class="col-3">
								<img src="'.$img_path.'" style="width:100%;height:100px;">
							</div>
							<div class="col-7">
								<h5 class="mt-3">'.$row['name'].'</h5>
								<h5><span id="price'.$row['product_id'].'">'.$row['price'].'</span></h5>
							</div>
							<div class="col-2">
							<div class="mt-4">
							<button data-id='.$row['product_id'].'  class="btn btn-sm btn-outline-warning text-dark plus-one" >-</button>
							<span id="quantity'.$row['product_id'].'" class="ml-1 mr-1"> <b>'.$row['quantity'].'</b></span>
							<button  data-id='.$row['product_id'].'class=" btn  btn-sm btn-warning  plus-one">+</button>
							</div>
							</div>
						</div>
					</div>';
					$counter++;
				}
				if($counter==0){
					echo'<h2>You have no items in your cart</h2>';
				}else{
					echo'<hr>
						 <h3 class="mt-2"style="display: inline;">Total Amount: RS <span id="total"> '.$amount.'</span></h3>
						 <a href="place_order.php" class="btn btn-lg text-dark mt-2"style="background-color: #F2CA65;  border: 1px solid black;float: right;">Check Out</a>
				';
				}
				?>
				
			</div>
		</div>
	
</div>
</body>
<script type="text/javascript">
	$('.plus-one').click(function(){
		alert("hello");
		//to find whether the sign is + or -
		var sign=$(this).text();
		//1.update the quantity in the database for that particular product
		//fetch the product id for the clicked button
		var product_id=$(this).attr('data-id');
		var quantity=$('#quantity' + product_id).text();
		var price=Number($('#price' +product_id).text());
		var total=Number($('#total').text());
		$.ajax({
			url:'update_product_quantity.php?product_id=' +product_id +'&quantity=' + quantity +'&sign='+sign,
			method:'GET',
			success:function(data){
				if(sign==='+'){
					$('#quantity' + product_id).text(Number(quantity)+1);	
					$('#total').text(total+price);
				}else{
					$('#quantity' + product_id).text(Number(quantity)-1);	
					$('#total').text(total-price);
					if((Number(quantity)-1)===0){
						//remove the product from database
						//remove the product from ui
						$.ajax({
							url:'remove_product_from_cart.php?product_id='+product_id,
							method:'GET',
							success:function(data){
							$('#product-card'+ product_id).hide();
							},
							error:function(error){

							}
						})
						$('#product-card'+ product_id).hide();

					}
				}
			
			},
			error:function(error){
				console.data(error);
			}
		})
		//alert($(this).attr('data-id'));
		//2.increase the counter value
		//3.update the total value

	
	})
</script>
</html>
