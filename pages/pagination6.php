<?php
	
	require_once("../include/headermain-prod.inc.php");
	require_once("../include/session.inc.php");
	$host = "mysql1.000webhost.com";
	    $dbname = "a8773318_acebedo";
	    $dbuser = "a8773318_acebedo";
	    $pwd = "Dublin2013";
	    $dbc =0;
	    $dbc = mysqli_connect($host, $dbuser, $pwd, $dbname)
	        or die ('Cannot connect to database');

?>	        


<html xmlns="http://www.w3.org/1999/xhtml">
<head>

 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/prodline.css" />
    <title>ABC - Product Line Trucks and Buses</title>

</head>


<body id="container">
<div id="content">	<div><br><h1>Trucks and Buses</h1>
	<br>

		<table>
			<tr>
                <td><a href="../pages/pagination1.php?id=1">Classic Cars</a></td>
                <td><a href="../pages/pagination2.php?id=1">Motorcycles</a></td>
                <td><a href="../pages/pagination3.php?id=1">Planes</a></td>
                <td><a href="../pages/pagination4.php?id=1">Ships</a></td>
                <td><a href="../pages/pagination5.php?id=1">Trains</a></td>
                <td><a href="../pages/pagination6.php?id=1">Trucks and Buses</a></td>
                <td><a href="../pages/pagination7.php?id=1">Vintage</a></td>
            </tr>
         </table>

	</div><br><br>
<div><a href="../private/productline.php">Go back to the main Product Line page...<a></div>
<br><br>
<table border="1"><tr>
<td>Product Code</td>
<td>Name</td>
<td>Product Line</td>
<td>Product Scale</td>
<td>Product Vendor</td>
<td>Product Description</td>
<td>Quantity in Stock</td>
<td>Buy Price</td>
</tr>  
<?php
		//Connect to DB
	 
   
	   	$start=0;
		$limit=10;
		
		if(isset($_GET['id']))
			{
				$id=$_GET['id'];
				$start=($id-1)*$limit;
			}
			
			// Query database
			//$query=mysqli_query("select * from products LIMIT $start, $limit");
			 	 
			$prodquery = "SELECT * FROM `products` where `productLine`= 'Trucks and Buses' LIMIT $start, $limit";
			$query = mysqli_query($dbc, $prodquery) 
					or die ('Error querying database');

			//echo "<ul>";
			while($row=mysqli_fetch_array($query))
			{

				$product_code = $row['productCode'];
				$name = $row['productName'];
				$product_line = $row['productLine'];
				$scale = $row['productScale'];
				$vendor = $row['productVendor'];
				$description = $row['productDescription'];
				$quantity = $row['quantityInStock'];
				$buyPrice1 = $row['buyPrice'];
				$buyPrice = number_format($buyPrice1, 2);

			echo "<tr>
				<td>$product_code</td>
				<td>$name</td>
				<td>$product_line</td>
				<td>$scale</td>
				<td>$vendor</td>
				<td>$description</td>
				<td>$quantity</td>
				<td>$$buyPrice</td>
			</tr>";

			}


			// Set the Next and Preview buttons

			$countrows = "SELECT * FROM `products` WHERE `productLine` = 'Trucks and Buses'";
			$query2 = mysqli_query($dbc, $countrows)
				or die ('Error1 querying database');
			$rows = mysqli_num_rows($query2);
			$total=ceil($rows/$limit);

			echo "</table>"; //End of Table


		if($id>1)
			{
				echo "<a href='?id=".($id-1)."' class='button'>PREVIOUS</a>";
			}
		if($id!=$total)
			{
				echo "<a href='?id=".($id+1)."' class='button'>NEXT</a>";
			}

		echo "<ul class='page'>";
				for($i=1;$i<=$total;$i++)
				{
					if($i==$id) { echo "<li class='current'>".$i."</li>"; }
					
					else { echo "<li><a href='?id=".$i."'>".$i."</a></li>"; }
				}
	echo "</ul>";
?>
	</div>
</body>
</html>