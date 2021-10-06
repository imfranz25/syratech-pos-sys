

	<!-- CSS Source -->
	<link rel="stylesheet" type="text/css" href="styles/web3.css?v=<?php echo time(); ?>">
	<!-- jQuery library -->
	<script src="js/jquery.js"></script>	
	<!-- JavaScript -->
	<script src="js/action.js?v=<?php echo time(); ?>"></script>



<!--Php Codes Starts Here-->
<?php
	if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == 'true' && isset($_SESSION['user_id']) && isset($_SESSION['username'])){
	    $user_id = $_SESSION['user_id']; // get passed user_id
	} 
	else{echo "<script>window.location.replace('accounts/login.php');</script>";}


	/*------Initialization-------*/
	$product_name= "";
	$product_quantity= "";
	$product_price= "";
	$discount_amount = 0;
	$discounted_amount = 0;
	$cash_given = "";
	$cash_change = 0;
	$total_product_quantity = 0;
	$total_discount_given = 0;
	$total_discounted_amount = 0;

	//product images
	$product_display=array('1.jpg','2.jpg','3.jpg','4.jpg','5.jpg','6.jpg','7.jpg','8.jpg','9.jpg','10.jpg');

	//product names
	$product_description=array('Synchronize DJ Cap Black',
								'Era Flag Maroon 9FIFTY Cap',
								'Era Zentex Buckle Salmon SkyBlue',
								'Era Mountains Outdoor',
								'Francisco Giants MLB Peach',
								'Era Flag Navy 9FORTY Cap',
								'Chicago Bulls NBA Black',
								'Era Flag Lion 9FIFTY Cap',
								'Era Flag Lakers 9FORTY Cap',
								'Chicago Bulls NBA Cap 2020');

	//product prices
	$product_price_info=array('2095.00',
							  '2095.00',
							  '2095.00',
							  '3595.00',
							  '2095.00',
							  '1895.00',
							  '2595.00',
							  '2295.00',
							  '2095.00',
							  '1995.00',
							  '2295.00');


	//function to show products (by creating buttons via for loop)
	function show_products($product_display,$product_description,$product_price_info){
		for ($index=0; $index < sizeof($product_display); $index++) { 
				echo '<button name="product_index" onclick = "show('.$index.','.$product_price_info[$index].')" id = "'.$index.'name" value="'.$product_description[$index].'" ><img src="images/'.$product_display[$index].'" /><br><center><p>'.$product_description[$index].'</p><h2>Php '.$product_price_info[$index].'</h2></button>';
		}	
	}//end of show product function

	//method post
	if($_SERVER["REQUEST_METHOD"] == "POST"){

		//Button Change
		if(isset($_POST['cash_change'])){
			//get values
		    $product_name=$_POST["product_name"];
			$product_quantity=$_POST["product_quantity"];
			$product_price=$_POST["product_price"];
			$total_product_quantity=$_POST["total_product_quantity"];
			$total_discount_given=$_POST["total_discount_given"];
			$total_discounted_amount=$_POST["total_discounted_amount"];
			$discount_amount = $_POST['discount_amount'];
			$discounted_amount = $_POST['discounted_amount'];
			//calculate change
			$cash_given=$_POST["cash_given"];
			//conditon
			if($discounted_amount == 0){
		 		echo '<script>alert("Please Select a Discount")</script>';
		 	}
		 	else if($cash_given<$discounted_amount){
		 		echo '<script>alert("Issuficient Amount")</script>';
		 	}
		 	else{
		 		$cash_change = (float)$cash_given - (float)$discounted_amount;
		 	}
		 }//end ofcash change
		 else if (isset($_POST['save_pos2'])) {
		 	//get values
		    $product_name=$_POST["product_name"];
			$product_quantity=$_POST["product_quantity"];
			$product_price=$_POST["product_price"];
			$total_product_quantity=$_POST["total_product_quantity"];
			$total_discount_given=$_POST["total_discount_given"];
			$total_discounted_amount=$_POST["total_discounted_amount"];
			$discount_amount = $_POST['discount_amount'];
			$discounted_amount = $_POST['discounted_amount'];
			//calculate change
			$cash_given=$_POST["cash_given"];
			//conditon
			if($discounted_amount == 0){
		 		echo '<script>alert("Please Select a Discount")</script>';
		 	}
		 	else if($cash_given<$discounted_amount){
		 		echo '<script>alert("Issuficient Amount")</script>';
		 	}
		 	else{
		 		$cash_change = (float)$cash_given - (float)$discounted_amount;
		 		$con = mysql_connect();
		 		$query = "INSERT INTO pos2 (item_name,quantity,price,discount_amount,discounted_amount,total_quantity,total_discount_given,total_discounted_amount,cash_given,customer_change) VALUES ('$product_name',$product_quantity,$product_price,$discount_amount,$discounted_amount,$total_product_quantity,$total_discount_given,$total_discounted_amount,$cash_given,$cash_change)";
		 		if (mysqli_query($con,$query)) {
		 			echo '<script>alert("Transaction Saved Successfuly !")</script>';
		 		}
		 		else{
		 			echo $query;
		 		}
		 	}
		 }
		 else if (isset($_POST['close'])) {
		 	echo "<script>window.location.replace('index.php?page=home&user_id=".$user_id."');</script>";
		 }

	}//end of method post

?>
<!--Php Codes Ends Here-->

	<!--------------Title----------------->
	<h1 id="title">Syra Tech Ordering System ™</h1>
	<!--------------End of title----------------->

	<!----------------Products------------------->
	<fieldset class="products">
		<legend>Products</legend>
		<!----------------Call Show Product Function from PHP------------------->
		<?php
			show_products($product_display,$product_description,$product_price_info);
		?>
	</fieldset>
	<!----------------End of Products------------------->

	<!--------------Form---------------->
	<form method="post">

		<!--------------Order Details---------------->
		<fieldset class="order_details">
			<legend>Order Details</legend>

				<!--------------Order Details Wrapper---------------->
				<div id="order_details_wrapper">
					<p>Product Name:<input type="text" name="product_name" id="product_name" value = "<?php echo $product_name;?>" /> </p>
					<p>Quantity:<input type="text" name="product_quantity" id="product_quantity" placeholder="0" value = "<?php echo $product_quantity;?>" /></p>
					<p>Price:<input type="text" name="product_price" id="product_price"   placeholder="0.00" value = "<?php echo $product_price;?>" /></p> 
					<p>Discount Amount:<input type="text" name="discount_amount" id="discount_amount"  readonly placeholder="0" value = "<?php echo $discount_amount;?>" /></p>   
					<p>Discounted Amount:<input type="text" name="discounted_amount" id="discounted_amount"  readonly placeholder="0" value = "<?php echo $discounted_amount;?>" /></p> 

					<!--------------Readonly Input Boxes---------------->
					<div class="readonly_layout">
						<p>Total Product Quantity:<input type="text" name="total_product_quantity" id="total_product_quantity" readonly placeholder="0" value = "<?php echo $total_product_quantity;?>" /></p>  
						<p>Total Discount Given: <input type="text"  name="total_discount_given" id="total_discount_given" readonly placeholder="0" value = "<?php echo $total_discount_given;?>" /></p>  			
						<p>Total Discounted Amount:<input type="text"  name="total_discounted_amount" id="total_discounted_amount" readonly placeholder="0" value = "<?php echo $total_discounted_amount;?>" /></p> 
					</div>
					<!--------------End of Readonly---------------->

					<p>Cash Given:<input type="text" id="cash_given" name="cash_given"  placeholder="0.00" value = "<?php echo $cash_given;?>"> </p>
					<p>Change:<input type="text" id="cash_change" name="cash_change"  disabled  readonly placeholder="Php 0.00" value = "Php <?php echo number_format($cash_change,2) ;?>"/> </p>
				</div>
				<!--------------End of Order Details Wrapper---------------->

		</fieldset>
		<!------------END of Order Details-------------->

		<!-----------------Order Options---------------->
		<fieldset class="order_options">
			<legend class="ODT">Order Options</legend>

				<!--------------Order Options---------------->
				<div id="order_options">
					<p>
						<input type="radio" class="discount"  name="discount" onclick = "calcu('.25')"> Senior Citizen
						<input type="radio" class="discount"  name="discount" onclick = "calcu('.25')"> With Disc. Card
						<input type="radio" class="discount"  name="discount" onclick = "calcu('.25')"> Employee Disc.
						<input type="radio" class="discount"  name="discount"  onclick = "calcu('0')"> No Discount
					</p>
				</div>
				<!--------------End of Order Options---------------->

				<!--------------Buttons Calculate---------------->
				<div id="button_calculate">
					<button name="cash_change">CHANGE</button>
					<button id="new" >NEW</button>
					<button id="cancel" name="save_pos2">Save</button>
					<button id="close" formnovalidate name="close">CLOSE</button>
				</div>
				<!--------------Order Details---------------->
	</form>
	<!----------End of Form------------>
	
				<!--------------Calculator--------------->
				<div class="calculator">
					<button id="enter">ENTER</button>
					<button id="divide">/</button>
					<button id="multiply">*</button>
					<button id="subtraction">-</button>
					<button id="addition">+</button>
					<button id="six">6</button>
					<button id="seven">7</button>
					<button id="eight">8</button>
					<button id="nine">9</button>
					<button id="two">2</button>
					<button id="three">3</button>
					<button id="four">4</button>
					<button id="five">5</button>
					<button id="zero">0</button>
					<button id="point">.</button>
					<button id="one">1</button>
				</div>
				<!--------------End of Order Calculator---------------->

		</fieldset>
		<!--------------End of Order Options---------------->

	
