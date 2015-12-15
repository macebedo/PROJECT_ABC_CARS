<?php
  $debug = 1;
   $host = "mysql1.000webhost.com";
   $dbname = "a8773318_acebedo";
   $dbuser = "a8773318_acebedo";
   $pwd = "Dublin2013";
   $dbc =0;
   $dbc = mysqli_connect($host, $dbuser, $pwd, $dbname)
        or die ('Cannot connect to database');

   require_once("./include/header.inc.php");

   $output_form1 = true;
   $error_text = "";
   $error_text2 = "";
   $user_name = "";
   $pwd = "";
   $registration_msg = "";
   $one = 1;
   $two = 2;
   $three = 3;

// USER SUBMISSION

  if (isset($_POST['submit'])) {

    
// GRAB THE USER ENTERED DATA
    $fuser_name = mysqli_real_escape_string($dbc, trim($_POST['uname']));
    $fpassword = mysqli_real_escape_string($dbc, MD5($_POST['pwd']));


    // LOOKUP USERNAME AND PASSWORD FROM THE EMPLOYEE TABLE 

    $query = "SELECT employeeNumber, username, password FROM employees WHERE username = '$fuser_name' AND password ='$fpassword' ";

    $resultlogin = mysqli_query($dbc, $query);

   if(mysqli_num_rows($resultlogin) == 1) {

// LOGIN IS OK, THEN SET THE MEMBER ID AND USERNAME

        $row = mysqli_fetch_array($resultlogin);
        $member_id = $row['employeeNumber'];
        $user_name = $row['username'];

        session_start();
        $_SESSION['member_id'] = $member_id;
        $_SESSION['user_name'] = $user_name;

        header('Location: private/index.php');
        } else { 

        $error_text2.="<p>X - Wrong Username and Password</p>";
        $output_form1 = true; }


      if ((empty($_POST['uname']) && !empty($_POST['pwd']))  || (!empty($_POST['uname']) && empty($_POST['pwd']))) {
          $error_text.="<p> All fields are manditory</p>";
          $output_form1 = true; }
}
  
?>

<!DOCTYPE html>

  <html>

  <head>

      <meta charset="UTF-8">
      <title>ABC Cars</title>
      <link rel="stylesheet" type="text/css" href="./css/style.css">
  </head>

  <body id="nonmember">
    <div id="header">
        <h3>Membership Login</h3>
    </div>
    <div id="reglogin">
    <table> <!-- BEGINNING MAIN TABLE -->
       
       <tr>
        <td> <!-- LEFT MAIN TABLE COLUMN -->
         <form action="<?=$_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
          <table id="main_table">

  
            <tr>
               <td>Username:</td>
               <td><input type="text" name="uname" value="<?=$_POST['uname'] ?>" ></td>
            </tr>
            <tr>
               <td>Password:</td>
               <td><input type="password" name="pwd"></td>
            </tr>
            <tr>
              <td></td>
              <td><br><br><input type="submit" name="submit" value="Log In"></td>
            </tr>
            <tr>
              <td>To register, please <a href="registration.php">Sign-up</a></td>
            </tr><br><br><br>
            <tr>
              <td>Cars RSS Feed</td>
            </tr>
            <tr><td><a href="./autorss.php?cid=<?=$one ?>">Classic Cars<img src="./icon/rss-feed.svg" width="25" height="25"></a></td></tr>
            <tr><td><a href="./autorss.php?cid=<?=$two ?>">Vintage Cars<img src="./icon/rss-feed.svg" width="25" height="25"></a></td></tr>
            <tr><td><a href="./autorss.php?cid=<?=$three ?>">Trucks and Buses<img src="./icon/rss-feed.svg" width="25" height="25"></a></td></tr>
           </table>
        </form>

           <table id="messages"> <!-- THIS PROMPTS USER ENTRY ERROR OR NON-ERROR MESSAGE -->
                 <tr><td><?= $registration_msg ?></td></tr>
                 <tr><td><?= $error_text ?></td></tr>
                 <tr><td><?= $error_text2 ?></td></tr>
           </table> <!-- END ERROR TABLE -->
        </td> <!-- END LEFT MAIN TABLE COLUMN --> 

        <td> <!-- RIGHT MAIN TABLE COLUMN --> 

              <br><br><img src="./img/logo1.jpg" width="300"><br><br>
              <img src="./img/logo2.jpg" height="250">
                      
        </td> <!-- END RIGHT MAIN TABLE COLUMN --> 
        </tr>
     </table> <!-- END MAIN TABLE -->
</div>

<?php
    
    require_once("./include/footer.inc.php");

?>           
  </body>

</html>