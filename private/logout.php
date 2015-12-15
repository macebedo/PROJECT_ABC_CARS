<?php
	require_once("../include/variable.inc.php");
	require_once("../include/session.inc.php");
	require_once("../include/header.inc.php");

	$user_name = $_SESSION["user_name"];

//destroy session, logout, redirect to public page

	$_SESSION = array();
	if (isset($_COOKIE[session_name()])) {
		setcookie(session_name(), '', time()-3600);
	}
	session_destroy();
	header('Refresh: 4; ../login.php');
?>


<!DOCTYPE html>

  <html>
	<head>
		<link rel=stylesheet type="text/css" href="../css/style.css" />
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<title>Logout Page</title>
	</head>
	<body id="nonmember">
	<div id="header">
        <h3>Membership Logout</h3>
    </div>
		<div id="reglogout">
			<div>
				<h3>Logging off - Goodbye</h3>
				<div>
					<p>Thank you for logging out <?= $user_name ?></p>
				</div>
			</div>
		</div>

<?php
	require_once("../include/footer.inc.php");
?>

	</body>

</html>