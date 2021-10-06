
	<!-- CSS Source -->
	<link rel="stylesheet" type="text/css" href="styles/web1.css?v=<?php echo time(); ?>">
	<!-- jQuery library -->
	<script src="js/jquery.js"></script>	

<!--Php Codes Starts Here-->
<?php
	if (isset($_SESSION['authenticated']) && $_SESSION['authenticated'] == 'true' && isset($_SESSION['user_id']) && isset($_SESSION['username']) ){
	    $user_id = $_SESSION['user_id']; // get passed user_id
	} 
	else{echo "<script>window.location.replace('accounts/login.php');</script>";}

	if (isset($_POST['exit'])) {
		echo "<script>window.location.replace('index.php?page=home&user_id=".$user_id."');</script>";
 	} 
 	else if (isset($_POST['save_pos1'])){
 		$price =$_POST['product_price'];
 		$quantity =$_POST['product_quantity'];
 		$discount_amount =$_POST['discount_amount'];
 		$discounted_amount =$_POST['discounted_amount'];
 		$total_quantity =$_POST['total_product_quantity'];
 		$cash =$_POST['cash_given'];
 		$change =$_POST['cash_change'];
 		$order_summary =$_POST['product_name'];
 		$total_bills =$_POST['total_discounted_amount'];

 		$con = mysql_connect();
 		$query = "INSERT INTO pos1 (price,quantity,discount_amount,discounted_amount,total_bills,total_quantity,cash_given,customer_change,order_summary) VALUES ($price,$quantity,$discount_amount,$discounted_amount,$total_bills,$total_quantity,$cash,$change,'$order_summary') ";

 		if ($price < 1 | $price == "") {
 			echo "<script>alert('Choose Product First !');</script>";
 		}
 		else if ($discount_amount < 1 | $discount_amount == "") {
 			echo "<script>alert('Calculate Bills First !');</script>";
 		}
 		else if ($change == "") {
 			echo "<script>alert('Calculate Cash Change First !');</script>";
 		}
 		else{
 			if (mysqli_query($con,$query)) {
 				echo '<script>alert("Transaction Saved Successfuly !")</script>';
	 		}
	 		else{
	 			echo "<script>alert('Invalid Input Try Again !');</script>";
	 		}
 		}
 		
 		
 	}

	/*------Initialization-------*/

	//product images
	$product_display=array('1.jpg',
							'2.jpg',
							'3.jpg',
							'4.jpg',
							'5.jpg',
							'6.jpg',
							'7.jpg',
							'8.jpg',
							'9.jpg',
							'10.jpg');
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
	
	//FUNCTION SHOW PRODUCTS
	function show_products($product_display,$product_description,$product_price_info){
		// Create Product instances (Based on the product array size)
		for ($index=0; $index < sizeof($product_display); $index++) {
				echo '	
				<script src="js/action.js"></script>
					<fieldset class = "product_item" onclick = "activate('.$index.','.$product_price_info[$index].')">
						<center>
						<img src = "images/'.$product_display[$index].'" id = "'.$index.'img" />
						<p>'.$product_description[$index].'</p>
						<input type = "checkbox" class = "item_check" id = "'.$index.'name" value = "'.$product_description[$index].'" onclick="activate('.$index.','.$product_price_info[$index].')"/>
						<label>
							Php '.$product_price_info[$index].'
						</label>
						</center>
					</fieldset>';
		}	
	}//END OF SHOW PRODUCTS

?>
<!--Php Codes Ends Here-->

	<!--------------Title----------------->
	<h1 id="title">Syra Tech Ordering System ™</h1>
	<!--------------End of title----------------->

	<!----------------Products------------------->
	<fieldset class="products">
		<legend>Products</legend>
		<!--Call Show Products PHP Function-->
		<?php
			show_products($product_display,$product_description,$product_price_info);
		?>
	</fieldset>
	<!----------------End of Products------------------->
<form method="POST">
	<!--------------Order Details---------------->
	<fieldset class="order_details">
		<legend>Order Details</legend>
			<!--------------Order Wrapper---------------->
			<div id="order_details_wrapper">

				<!--Input Boxes-->
				<p>Quantity:<input type="text" name="product_quantity" id="product_quantity"  placeholder="0"   /></p> 
				<p>Price:<input type="text"  name="product_price" id="product_price" value="0"  placeholder="0" class="readonly" readonly /></p> 
				<p>Discount Amount:<input type="text" name="discount_amount" value="0"  class="readonly" readonly placeholder="0" id="discount_amount" /></p>  
				<p>Discounted Amount:<input type="text" name="discounted_amount" value="0"  class="readonly" readonly placeholder="0" id="discounted_amount"  /></p> 

				<!--Readonly Input Boxes-->
				<div class="readonly_layout">
					<p>Total Product Quantity:<input type="text" name="total_product_quantity" id="total_product_quantity" value="0" readonly placeholder="0" /></p>  
					<p>Total Discount Given:<input type="text" id="total_discount_given"  name="total_discount_given" value="0"  readonly placeholder="0" /></p>	
					<p>Total Discounted Amount:<input type="text" id="total_discounted_amount"  name="total_discounted_amount" value="0" placeholder="0" readonly ></p> 
				</div>
				<!--End of Readonly Input Boxes-->

				<p>Cash Given:<input type="text" id="cash_given" name="cash_given"  placeholder="0"   ></p>
				<p>Change:<input type="text" id="cash_change" name="cash_change"  class="readonly" readonly value="" placeholder="Php 0.00"/> </p>
				<!--End of Input Boxes-->
			
			</div>
			<!--------------End of Order Wrapper---------------->
	</fieldset>
	<!------------END of Order Details-------------->

	<!-----------------Order Options---------------->
	<fieldset class="cap_choice">
		<legend>Cap Choices</legend>
			<!-----------------Order Summary---------------->
			<h2>Order Summary</h2>
				<input type="text" id="order_summary" name="product_name" class="product_pricesss" readonly  /> 
				<img src="images/gray.jpg" id="product_img" name="product_img"/> 
			<!-----------------Order Choice---------------->
			<h2>Cap Order Choice</h2>
				<input type="radio" name="bundle" onclick="set_check()" class="radio" id="r1">  Summer Package Promo 
				<input type="radio" name="bundle" onclick="set_check()" class="radio" id="r2"> Winter Package Deal
				<!-----------------Div Summer Bundle---------------->
				<div id="summer">
					<h2> Summer Package</h2>
					<input type="checkbox" class="bundle_a"> Iron Style Cap<br>
					<input type="checkbox" class="bundle_a"> 4Tech Solar Cap<br>
					<input type="checkbox" class="bundle_a"> Teniske Summer Cap<br>
					<input type="checkbox" class="bundle_a"> Theon Cap<br>
					<input type="checkbox" class="bundle_a"> Special Buzzu Cap
				</div>
				<!-----------------End of Div Summer Bundle---------------->

				<!-----------------Div Winter Bundle---------------->
				<div id="winter">
					<h2 >Winter Package Deal</h2>
					<input type="checkbox" class="bundle_b"> NBA Winter Cap<br>
					<input type="checkbox" class="bundle_b"> Surei Fuzzy Cap<br>
					<input type="checkbox" class="bundle_b"> Aspire Map Cap<br>
					<input type="checkbox" class="bundle_b"> Aleint Cap<br>
					<input type="checkbox" class="bundle_b"> Limited Edition Sizeline Cap
				</div>
				<!-----------------End of Div Winter Bundle---------------->
	</fieldset>
	<!-----------------End of Order Options---------------->
	
	<!--Buttons-->
	<fieldset class="buttons">
		<button type="button" onclick="calcu()">Calculate Bills</button>
		<button type="button" onclick="change()" >Change</button>
		<button type="button"  onclick="reset()">New Transaction</h3></button>
		<button name="save_pos1" >Save Transaction</button>
		<button name="exit" formnovalidate>Exit</button>
	</fieldset>
	<!----------End of Buttons------------>
</form>	


<script>
	
// SHOW PRODUCT INFO FUNCTION
function show(id,product_price){
	//set values
	document.getElementById('product_img').src = (document.getElementById(id+"img").src);
	document.getElementById('product_price').value = product_price;
	document.getElementById('order_summary').value = (document.getElementById(id+"name").value);
}//END OF FUNCTION SHOW

//MAKE THE WHOLE DIV CLICKABLE (ACTIVATE FUNCTION)
function activate(id,product_price){
	//condition
	if ($("#"+id+"name").prop( "checked") == false){
		//unchecked other checkbox and radios
		$(".radio").prop("checked", false);
		$(".bundle_a").prop( "checked", false);
		$(".bundle_b").prop( "checked", false);
		$(".item_check").prop( "checked", false); 
		// check only the clicked product
		$("#"+id+"name").prop( "checked", true); 
		//set values
		show(id,product_price);
	}
	else{
		//set to Default
		$("#"+id+"name").prop( "checked", false);
		document.getElementById('product_img').src = "images/gray.jpg";
		document.getElementById('product_price').value = "";
		document.getElementById('order_summary').value = "";
	}
}//END OF ACTIVATE FUNCTION



//CHECK RADIO BUNDLE FUNCTION
function set_check(){
	//SHOW BUNDLE A INFO IF RADIO 1 IS CHECKED
	if($("#r1").prop("checked") == true){
		//checkbox will be checked
		$(".bundle_a").prop( "checked", true);
		//checkbox will be unchecked
		$(".bundle_b").prop( "checked", false);
		$(".item_check").prop( "checked", false);
		//set values
		document.getElementById('product_img').src = "images/logo.png";
		document.getElementById('product_price').value = "15999";
		document.getElementById('order_summary').value = "Summer Package";
	}
	//SHOW BUNDLE B INFO IF RADIO 1 IS CHECKED
	if ($("#r2").prop("checked") == true){
		//checkbox will be checked
		$(".bundle_a").prop( "checked", false);
		//checkbox will be unchecked
		$(".bundle_b").prop( "checked", true);
		$(".item_check").prop( "checked", false);
		//set values
		document.getElementById('product_img').src = "images/logo.png";
		document.getElementById('product_price').value = "12999";
		document.getElementById('order_summary').value = "Winter Package Deal";
	}
}
//END

//CALCU FUNCTION
function calcu(){
		//get values
		var price = document.getElementById('product_price').value;
		var quantity = document.getElementById('product_quantity').value;
		var total_discount_amount = document.getElementById('total_discount_given').value;
		var total_discounted_amount = document.getElementById('total_discounted_amount').value;
		var total_product_quantity = document.getElementById('total_product_quantity').value;
		//condition
		if (price <= 0) {
			alert("Please Select Product "); // No Product Selected
		}
		else if(quantity > 0){
			//compute
			var discount_amount = (price * quantity) * .25;
			var discounted_amount = (price * quantity) - discount_amount;
			//accumulate values
			total_product_quantity = (total_product_quantity * 1) + (quantity * 1);
			total_discount_amount = (total_discount_amount * 1) + discount_amount;
			total_discounted_amount = (total_discounted_amount * 1) + discounted_amount;
			//set output
			document.getElementById('discount_amount').value = discount_amount;
			document.getElementById('discounted_amount').value = discounted_amount;
			document.getElementById('total_product_quantity').value = total_product_quantity;
			document.getElementById('total_discount_given').value = total_discount_amount;
			document.getElementById('total_discounted_amount').value = total_discounted_amount;
		}
		else{
			alert("Please Input Quantity"); // Invalid Quantity
		}
}//END OF CALCU FUNCTION

//FUNCTION CHANGE
function change(){
	//get values
	var price = document.getElementById('product_price').value;
	var cash = document.getElementById('cash_given').value;
	var discounted_amount = document.getElementById('discounted_amount').value;
	discounted_amount = discounted_amount * 1; // process to interger
	//conditions
	if ((price * 1) <= 0){
		alert("Please Select a Product"); // no product selected
	}
	else if ((cash * 1) >= discounted_amount & discounted_amount != 0){
		var change = cash - discounted_amount; // calculate change
		document.getElementById('cash_change').value = change; // set value
	}
	else if (discounted_amount <= 0){
		alert("Calculate Bill First"); // no amount to calculate
	}
	else{
		alert("Issuficient Amount"); // cash is issuficient
	}
}
//END OF FUNCTION CHANGE

//FUNCTION NEW
function reset(){
	//reset values except accumulated outputs
	document.getElementById('cash_change').value = "";
	document.getElementById('product_price').value = "";
	document.getElementById('product_quantity').value = "";
	document.getElementById('cash_given').value = "";
	document.getElementById('discounted_amount').value = "";
	document.getElementById('discount_amount').value = "";
	
	document.getElementById('product_img').src = "images/gray.jpg";
	document.getElementById('product_price').value = "";
	document.getElementById('order_summary').value = "";
	$(".radio").prop("checked", false);
	$(".bundle_a").prop( "checked", false);
	$(".bundle_b").prop( "checked", false);
		
}//END OF FUCNTION NEW

//JQUERY
$(document).ready(function(){
	//DISABLE CHECKBOX CHECKING
	$('.bundle_a').click(function(e){
		if ($('#r1').prop("checked") == true){
			$(".bundle_a").prop( "checked", true);
		}
		else{
			$(".bundle_a").prop( "checked", false);
		}
	});//END
	$('.bundle_b').click(function(e){
		if ($('#r2').prop("checked") == true){
			$(".bundle_b").prop( "checked", true);
		}
		else{
			$(".bundle_b").prop( "checked", false);
		}
	});//END
});//END OF JQUERY
</script>