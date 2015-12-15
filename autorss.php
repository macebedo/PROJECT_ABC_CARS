<?php 
 
    $host = "mysql1.000webhost.com";
  	$dbname = "a8773318_acebedo";
  	$dbuser = "a8773318_acebedo";
  	$pwd = "Dublin2013";
  	$dbc =0;
  	$dbc = mysqli_connect($host, $dbuser, $pwd, $dbname)
        or die ('Cannot connect to database');

	$car_type = trim($_GET['cid']);

	header('Content-Type: text/xml; charset=ISO-8859-1');
	echo '<?xml version="1.0" encoding="ISO-8859-1"?>';
	$builddate = gmdate(DATE_RSS, time());

	if($car_type == 1) {

			$title = "Classic Cars";
			$query = "SELECT * FROM `products` WHERE `productLine`='Classic Cars'";
	
			$data = mysqli_query($dbc, $query)
		 		or die ('Error querying database');

		} else if($car_type == 2) {

			$title = "Vintage Cars";
			$query = "SELECT * FROM `products` WHERE `productLine`='Vintage Cars'";
	
			$data = mysqli_query($dbc, $query)
		 		or die ('Error querying database');

		} else if($car_type == 3 ) {

			$title = "Trucks and Buses";
			$query = "SELECT * FROM `products` WHERE `productLine`='Trucks and Buses'";
	
			$data = mysqli_query($dbc, $query)
		 		or die ('Error querying database');

		}

?>

<rss version="2.0">
	<channel>
		<item>
			<title>GO BACK TO LOGIN SITE</title>
			<link>http://3aces.net63.net/PHP_FINAL_PROJECT/login.php</link>
			<guid isPermaLink="false">http://3aces.net63.net/PHP_FINAL_PROJECT/login.php</guid>
		</item>


		<title><?=$title ?></title>
		<description><?=$title ?> RSS feed for Final Project - PHP</description>
		<lastBuildDate><?= $builddate ?></lastBuildDate>
		<language>en-us</language>


<?php

		while ($rows = mysqli_fetch_array($data)) {
			$product_code = $rows['productCode'];
			$name = $rows['productName'];
			$product_line = $rows['productLine'];
			$scale = $rows['productScale'];
			$vendor = $rows['productVendor'];
			$description = $rows['productDescription'];
			$msrp = $rows['MSRP'];
		 	?>

		<item>
			<title><?=$name ?></title>
			<description><?= $description ?></description>
			<link>http://3aces.net63.net/PHP_FINAL_PROJECT/product.php?pid=<?=$product_code ?> </link>
			<guid isPermaLink="false">http://3aces.net63.net/PHP_FINAL_PROJECT/product.php?pid=<?=$product_code ?></guid>
		</item>

<? }  
	require_once("./include/footer.inc.php");

?>

	</channel>

</rss>