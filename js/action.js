
// SHOW PRODUCT INFO FUNCTION (IF PRODUCT IS CLICKED)
function show(id,product_price){
	//set values
	document.getElementById('product_price').value = product_price;
	document.getElementById('product_name').value = (document.getElementById(id+"name").value);
}
//END 

function calcu(discount){
	//get values
	var quantity = document.getElementById('product_quantity').value;
	var price = document.getElementById('product_price').value;
	var total_product_quantity = document.getElementById('total_product_quantity').value;
	var total_discount_given = document.getElementById('total_discount_given').value;
	var total_discounted_amount = document.getElementById('total_discounted_amount').value;
	//condition
	if ((price * 1) <= 0) {
		alert("Please Select A Product");
		$('.discount').prop("checked", false);
	}
	else if ((quantity * 1) <= 0){
		alert("Please Enter Valid Quantity");
		$('.discount').prop("checked", false);
	}
	else{
		//calculate
		var discount_amount = (price * quantity) * discount;
		var discounted_amount = (price * quantity) - discount_amount;
		//set values
		document.getElementById('discount_amount').value = discount_amount;
		document.getElementById('discounted_amount').value = discounted_amount;
		document.getElementById('total_product_quantity').value = (total_product_quantity * 1) + (quantity * 1);
		document.getElementById('total_discount_given').value = (total_discount_given * 1) + discount_amount;
		document.getElementById('total_discounted_amount').value = (total_discounted_amount * 1) + discounted_amount;
	}
}

function clear(){
	//reset values except accumulated values
	document.getElementById('product_price').value = "";
	document.getElementById('product_name').value = "";
	document.getElementById('product_quantity').value = "";
	document.getElementById('discount_amount').value = "0";
	document.getElementById('discounted_amount').value = "0";
	document.getElementById('cash_given').value = "";
	document.getElementById('cash_change').value = "0";
	$('.discount').prop("checked", false);

}

//calculate onclick functions
$(document).ready(function(){
	$('#enter').click(function(e){
		e.preventDefault();// do not refresh browser
		alert("enter");
	});
	$('#divide').click(function(e){
		e.preventDefault();// do not refresh browser
		alert("divide");
	});
	$('#multiply').click(function(e){
		e.preventDefault();// do not refresh browser
		alert("multiply");
	});
	$('#subtraction').click(function(e){
		e.preventDefault();// do not refresh browser
		alert("subtraction");
	});
	$('#addition').click(function(e){
		e.preventDefault();// do not refresh browser
		alert("addition");
	});
	$('#one').click(function(e){
		e.preventDefault();// do not refresh browser
		alert("one");
	});
	$('#two').click(function(e){
		e.preventDefault();// do not refresh browser
		alert("two");
	});
	$('#three').click(function(e){
		e.preventDefault();// do not refresh browser
		alert("three");
	});
	$('#four').click(function(e){
		e.preventDefault();// do not refresh browser
		alert("four");
	});
	$('#five').click(function(e){
		e.preventDefault();// do not refresh browser
		alert("five");
	});
	$('#six').click(function(e){
		e.preventDefault();// do not refresh browser
		alert("six");
	});
	$('#seven').click(function(e){
		e.preventDefault();// do not refresh browser
		alert("seven");
	});
	$('#eight').click(function(e){
	e.preventDefault();// do not refresh browser
		alert("eight");
	});
	$('#nine').click(function(e){
		e.preventDefault();// do not refresh browser
		alert("nine");
	});
	$('#zero').click(function(e){
		e.preventDefault();// do not refresh browser
		alert("zero");
	});
	$('#point').click(function(e){
		e.preventDefault();// do not refresh browser
		alert("point");
	});
	$('#new').click(function(e){
		e.preventDefault();// do not refresh browser
		//reset values except accumulated values
		document.getElementById('product_price').value = "";
		document.getElementById('product_name').value = "";
		document.getElementById('product_quantity').value = "";
		document.getElementById('discount_amount').value = "0";
		document.getElementById('discounted_amount').value = "0";
		document.getElementById('cash_given').value = "";
		document.getElementById('cash_change').value = "0";
		$('.discount').prop("checked", false);
	});
});