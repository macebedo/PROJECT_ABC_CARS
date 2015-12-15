<?php

	require_once("../include/variable.inc.php");
	require_once("../include/session.inc.php");
	require_once("../include/headermain.inc.php");
    $user_name = $_SESSION["user_name"];
    $member_id = $_SESSION["member_id"];
?>

<!DOCTYPE html>
<html>

	<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<link rel="stylesheet" type="text/css" href="../css/style.css" />
		<title>ABC Cars</title>
	</head>
	<body>
		<div id="container">
			<table>
					<tr>
						<td>
							<p> WELCOME <?= $user_name ?>!<br> This is the membership site of ABC Cars. <br>This site will allow all members have access the customer entry page, 
							product line report and credit limit chart. Customer entry page will enter new customers into our database. 
							The Product Line report will generate a product table based on your select of product line. ONLY members have access to this page.
                   			</p><br><br>
                   			<p>...CLASSIC CARS...VINTAGE CARS...TRACKS AND BUSES...PLANES...</p>
                   		</td>
                   		<td>
							<img src="../img/car1.jpg" height="280">
                   		</td>
                   	</tr>	
				</table>
				<table>
            		<tr>
		                <td><a href="../private/productline.php"><img src="../img/mainpic1.jpg" height="130"></a></td>
		                <td><a href="../private/productline.php"><img src="../img/mainpic2.jpg" height="130"></a></td>
		                <td><a href="../private/productline.php"><img src="../img/mainpic3.jpg" height="130"></a></td>
          			</tr>
          		</table>
			</div>
<?php

	require_once("../include/footer.inc.php");

?>
	</body>

</html>