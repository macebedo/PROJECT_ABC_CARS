<?php
	$host = "mysql1.000webhost.com";
  	$dbname = "a8773318_acebedo";
  	$dbuser = "a8773318_acebedo";
  	$pwd = "Dublin2013";
  	$dbc =0;
  	$dbc = mysqli_connect($host, $dbuser, $pwd, $dbname)
        or die ('Cannot connect to database');

	require_once "./include/header.inc.php";

	$output = 'No product information';
	$one = 1;
	$two = 2;
	$three = 3;
// GET PRODUCT INFORMATION
	if (isset($_GET['pid'])); {

		$product_code = trim($_GET['pid']);
		$query2 = "SELECT * FROM `products` WHERE `productCode` = '$product_code'";
		$result = mysqli_query($dbc, $query2)
			or die ("Error query database => $query2");

		$num_rows = mysqli_num_rows($result);

		if ($num_rows != 0) {

			while ($row = mysqli_fetch_array($result)) {

				$product_code = $row['productCode'];
				$name = $row['productName'];
				$product_line = $row['productLine'];
				$scale = $row['productScale'];
				$vendor = $row['productVendor'];
				$description = $row['productDescription'];
				$quantity = $row['quantityInStock'];
				$price = $row['buyPrice'];
				$buyPrice = number_format($buyPrice, 2);

				$output = "<p><em>Name:</em> $name</p>
							<p><em>Product Line:</em> $product_line</p>
							<p><em>Product Scale:</em> $scale</p>
							<p><em>Vendor:</em> $vendor</p>
							<p><em>Description:</em> $description</p>
							<p><em>Buy Price: $</em>$buyPrice</p>";

			} // END WHILE MYSQLI_FETCH_ARRAY
		} else {

			$output = 'No match found';
		} 

	} //END IF/ELSE ISSET

// HEADER RIGHT HERE
?>

<body>
	<div>
		<!-- HEADER  -->
		<div>
			<h2>Classic Car</h2>

			<div>
				<?=$output ?>
			</div>

			
		</div>
<div>
		<p>Click here to <a href="login.php">Log-In</a></p>
		<p>To register, please <a href="registration.php">Sign-up</a></p>
</div>
<div>
	<table>
		<tr><td><a href="./autorss.php?cid=<?=$one ?>">Classic Cars<img src="./icon/rss-feed.svg" width="25" height="25"></a></td></tr>
        <tr><td><a href="./autorss.php?cid=<?=$two ?>">Vintage Cars<img src="./icon/rss-feed.svg" width="25" height="25"></a></td></tr>
        <tr><td><a href="./autorss.php?cid=<?=$three ?>">Trucks and Buses<img src="./icon/rss-feed.svg" width="25" height="25"></a></td></tr>
	</table>
</div>
</div>
</body>