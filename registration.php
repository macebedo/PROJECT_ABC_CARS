<?php

  require_once("./include/variable.inc.php");

  require_once("./include/header.inc.php");

  $output_form = true;
  $error_text = "";
  $error_text2 = "";
  $user_name = "";
  $pwd = "";
  $registration_msg = "";
  $reg_good = "";
  $one = 1;
  $two = 2;
  $three = 3;

// USER REGISTRATION

if (isset($_POST['register'])) {

    $firstname = mysqli_real_escape_string($dbc, trim($_POST['firstName']));
    $lastname = mysqli_real_escape_string($dbc, trim($_POST['lastName']));
    $email = mysqli_real_escape_string($dbc, trim($_POST['email']));
    $password = mysqli_real_escape_string($dbc, MD5($_POST['password']));
    $employeenumber = mysqli_real_escape_string($dbc, trim($_POST['employeeNumber']));
    $username = mysqli_real_escape_string($dbc, trim($_POST['username']));


    if ((!empty($firstname)) && (!empty($lastname)) && (!empty($email)) && (!empty($password)) && (!empty($employeenumber)) && (!empty($username))) {

   // INSERT NEW DATA INTO EMPLOYEE TABLE

       $sql = "INSERT INTO employees (employeeNumber, username, firstName, lastName, email, password) VALUES ('$employeenumber', '$username', '$firstname', '$lastname', '$email', '$password')";
    
       $result = mysqli_query($dbc, $sql);
     
       if ($result) {
            
            $output_form = false;
        }

        else
        {
           $registration_msg .="<p> X - Employee Number already exist or the Employee Number contains letters. Please enter another Employee Number (Digits only).</p>";
           $output_form = true;
        }
      
    // END CONNECTION          
    } else {

      $registration_msg .="<p> X - All fields are Manditory. Please fill out all fields.</p>";
      $output_form = true;
    }
    
  }
  
// ===================== END OF ISSET IF THEN =================

?>


<!DOCTYPE html>

  <html>

    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="./css/style.css" />
    <title>ABC Cars</title>
    </head>

    <body id="nonmember">
       
    	   <div id="header">
       	  <h3>Registration Page</h3>
          </div>
          <div id="reg">
              <form action="<?=$_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                
                <table> <!--  MAIN TABLE -->

                  <tr>
                  <td> <!-- LEFT COLUMN --> 

                  <table id="main_table">

                      <!-- CREATE AN ACCOUNT TABLE -->
                      <h2>Create an Account</h2>
                            <tr>
                               <td>Employee Number (Digits only):</td>
                                <td><input type="text" name="employeeNumber" value="<?=$employeenumber ?>"></td>
                            </tr>
                            <tr>
                                <td>First Name:</td>
                                <td><input type="text" name="firstName" value="<?=$firstname ?>"></td>
                            </tr>
                            <tr>
                                <td>Last Name:</td>
                                <td><input type="text" name="lastName" value="<?=$lastname?>"></td>
                            </tr>
                            <tr>
                                <td>Email:</td>
                                <td><input type="text" name="email" value="<?=$email ?>"></td>
                            </tr>
                            <tr>
                                <td>Username:</td>
                                <td><input type="text" name="username" value="<?=$username ?>"></td>
                            </tr>
                            <tr>
                                <td>Password:</td>
                                <td><input type="password" name="password"></td>
                            </tr>
                            <tr><td></td><td><br><input type="submit" name="register" value="Register"></td></tr>

                        <?php  if ($output_form)  { ?>                        
                            <tr><td>Click here to <a href="login.php">Log-In</a></td></tr>
                        <?php } ?>                            

                       </table> <!-- LEFT TABLE -->
                       </td> <!-- END LEFT COLUMN -->
                       <td> <!-- RIGHT COLUMN -->
                           <br><br><img src="./img/regpic1.jpg" width="300"><br><br>
                                    <img src="./img/regpic2.jpg" height="160">


                       </td> <!-- END RIGHT COLUMN -->
                      </tr>
                      </table> <!-- MAIN TABLE -->
                 </form>  
                    
              <table id="messages"> <!-- ERROR -->
                 <tr><td><?= $registration_msg ?></td></tr>
                 <tr><td><?= $reg_good ?></td></tr>
              </table> <!-- END ERROR TABLE -->
              <?php 
                  
                  if (!$output_form) {   // THIS WILL PROMPT A SUCCESSFUL REGISTRATION ENTRY WITH USER INFORMATION EXCEPT PASSWORD

              ?>

                <table id="main_table"> 
                          <tr><h3>Thank you for registering <?=$firstname." ".$lastname ?></h3></tr>
                         <tr><td>Employee Number: <?= $employeenumber ?></td></tr>
                         <tr><td>Name: <?=$firstname." ".$lastname ?></td></tr>
                         <tr><td>Email Address: <?=$email ?></td></tr>
                         <tr><td>Username: <?=$username ?></td></tr>
                         <tr><td>Click here to <a href="login.php">Log-In</a></td></tr>
                         <br><br>
                </table> 
    </div>
    
    
<?php

   }   // END OF IF - SUCCESSFUL REGISTRATION ENTRY

?>    
            
<div> <!-- RSS FEED  -->
      <table>
            <tr><td><a href="./autorss.php?cid=<?=$one ?>">Classic Cars<img src="./icon/rss-feed.svg" width="25" height="25"></a></td></tr>
            <tr><td><a href="./autorss.php?cid=<?=$two ?>">Vintage Cars<img src="./icon/rss-feed.svg" width="25" height="25"></a></td></tr>
            <tr><td><a href="./autorss.php?cid=<?=$three ?>">Trucks and Buses<img src="./icon/rss-feed.svg" width="25" height="25"></a></td></tr>
      </table>
    </div>


<?php  
 require_once("./include/footer.inc.php");
?>
  </body>

</html>