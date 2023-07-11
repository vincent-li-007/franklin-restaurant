<?php 
	
	define("TITLE", "Menu | Franklin's Fine Dining");
	include('includes/header.php');
	
	// Learn more about preg_replace:http://php.net/manual/en/function.preg_replace.php
	
	function strip_bad_chars( $input){
		//regular expression
		$output = preg_replace("/[^a-zA-Z0-9_-]/", "", $input );
		return $output;
	};
	
	if(isset($_GET['item'])) {
		
		$menuItem = strip_bad_chars( $_GET['item']);
		$dish = $menuItems[$menuItem];
	};
	
	//Calculate a suggested tip
	function suggestedTip($price, $tip){
		
		$totalTip = $price + $tip;
		echo money_format('%.2n', $totalTip);
	};
?>

	<hr>

	<div id="dish">
		<h1><?php echo $dish[title]; ?> <span class="price"><sup>$</sup><?php echo $dish[price]; ?></span></h1>
		<p><?php echo $dish[blurb]; ?></p>
		
		<br>
		<p><strong>Suggested Beverage: <?php echo $dish[drink]; ?></strong></p>
		<p><em>Suggested Tip: <sup>$</sup><?php suggestedTip($dish[price], 0.20); ?></em></p>
	</div><!-- Dish -->
	<hr>
	
	<a href="menu.php" class="button previous">&laquo; Back To Menu</a>

<?php include('includes/footer.php'); ?>