<?php

  require_once("../include/variable.inc.php");
  require_once("../include/headermain.inc.php");

  $output_form = true;
  $error_text = "";
  $error_text2 = "";
  $user_name = "";
  $pwd = "";
  $registration_msg = "";
  $reg_good = "";

// NEW CUSTOMER REGISTRATION

if (isset($_POST['csubmit'])) {  // START OF ISSET

$ncustomerno = mysqli_real_escape_string($dbc, trim($_POST['newcustomerno']));
$ncustomername = mysqli_real_escape_string($dbc, trim($_POST['newcustomername']));
$contactfirstname = mysqli_real_escape_string($dbc, trim($_POST['cfirst']));
$contactlastname = mysqli_real_escape_string($dbc, trim($_POST['clast']));
$contactphone = mysqli_real_escape_string($dbc, trim($_POST['cphone']));
$addressline1 = mysqli_real_escape_string($dbc, trim($_POST['caddress1']));
$addressline2 = mysqli_real_escape_string($dbc, trim($_POST['caddress2']));
$city = mysqli_real_escape_string($dbc, trim($_POST['ccity']));
$state = mysqli_real_escape_string($dbc, trim($_POST['cstate']));
$postalcode = mysqli_real_escape_string($dbc, trim($_POST['cpostal']));
$country = mysqli_real_escape_string($dbc, trim($_POST['ccountry']));
$salesrepnumber = mysqli_real_escape_string($dbc, trim($_POST['csalesrep']));
$creditlimit = mysqli_real_escape_string($dbc, trim($_POST['ccreditlimit']));

    if ((!empty($ncustomerno)) && (!empty($ncustomername)) && (!empty($contactfirstname)) &&
        (!empty($contactlastname)) && (!empty($contactphone)) && (!empty($addressline1)) &&
        (!empty($addressline2)) && (!empty($city)) && (!empty($state)) &&
        (!empty($postalcode)) && (!empty($country)) && (!empty($salesrepnumber)) && (!empty($creditlimit))) {

   // INSERT NEW DATA INTO EMPLOYEE TABLE

        $csql = "INSERT INTO customers (customerNumber, customerName, contactLastName, contactFirstName, phone, addressLine1, addressLine2, city, state, postalCode, country, 

salesRepEmployeeNumber, creditLimit) VALUES ('$ncustomerno', '$ncustomername', '$contactlastname', '$contactfirstname', '$contactphone', '$addressline1', 

'$addressline2', '$city', '$state', '$postalcode', '$country', '$salesrepnumber', '$creditlimit')";

       $cresult = mysqli_query($dbc, $csql);
     
       if ($cresult) {
            
            $output_form = false;
        }
        else
        {
           $registration_msg .="<p> X - Customer Number already exist or the Customer Number contains letters. Please enter another Customer Number (Digits only).</p>";
           $output_form = true;
        }
      
    // END CONNECTION          
    } else {

      $registration_msg .="<p> X - All fields are Manditory. Please fill out all fields.</p>";
      $output_form = true;
    }
    
  } // END ISSET

  // ===================== END OF ISSET IF THEN =================

?>


<!DOCTYPE html>

  <html>

    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <title>ABC - New Customer</title>
    </head>

    <body>
          <div id="container">
          <h2>New Customer Entry</h2>
               <form action="<?=$_SERVER['PHP_SELF'] ?>" method="post" enctype="multipart/form-data">
                  <table id="main_table">

                      <!-- CREATE AN ACCOUNT TABLE -->

                            <tr>
                               <td class="inputspace">Customer Number (Digits only):</td>
                                <td><input type="text" name="newcustomerno" value="<?=$ncustomerno ?>"></td>
                                <td class="inputspace">Customer Name</td>
                               <td><input type="text" name="newcustomername" value="<?=$ncustomername ?>"></td>
                            </tr>
                            <tr>
                                <td class="inputspace">First Name:</td>
                                <td><input type="text" name="cfirst" value="<?=$contactfirstname ?>"></td>
                                <td class="inputspace">Last Name:</td>
                                <td><input type="text" name="clast" value="<?=$contactlastname ?>"></td>
                            </tr>
                            <tr>
                                <td>Phone:</td>
                                <td><input type="text" name="cphone" value="<?=$contactphone ?>"></td>
                            </tr>
                            <tr>
                                <td class="inputspace">Address Line 1:</td>
                                <td><input type="text" name="caddress1" value="<?=$addressline1 ?>"></td>
                            </tr>
                            <tr>
                                <td class="inputspace">Address Line 2:</td>
                                <td><input type="text" name="caddress2" value="<?=$addressline2 ?>"></td>
                            </tr>
                            <tr>
                                <td class="inputspace">City:</td>
                                <td><input type="text" name="ccity" value="<?=$city ?>"></td>
                                 <td class="inputspace">State:</td>
                                <td><input id="state" type="text" name="cstate" value="<?=$state ?>"></td>
                            </tr>
                             <tr>
                                <td class="inputspace">Postal Code:</td>
                                <td><input type="text" name="cpostal" value="<?=$postalcode ?>"></td>
                            
                                <td class="inputspace">Country:</td>
                                <td><input type="text" name="ccountry" value="<?=$country ?>"></td>
                            </tr>
                            <tr>
                                <td class="inputspace">Sales Rep Employee Number:</td>
                                <td><input type="text" name="csalesrep" value="<?=$salesrepnumber ?>"></td>
                                <td class="inputspace">Credit Limit:</td>
                                <td><input type="text" name="ccreditlimit" value="<?=$creditlimit ?>"></td>
                            </tr>
                            <tr><td></td><td><input type="submit" name="csubmit" value="Submit new customer"></td></tr>
            </table>
                 </form>  
                    
              <table id="messages"> <!-- ERROR -->
                 <tr><td><?= $registration_msg ?></td></tr>
                 <tr><td><?= $reg_good ?></td></tr>
              </table> <!-- END ERROR TABLE -->
<?php 
    
    if (!$output_form) {   // THIS WILL PROMPT A SUCCESSFUL REGISTRATION ENTRY WITH USER INFORMATION EXCEPT PASSWORD

?>

    <table id="main_table"> 
                  <tr><h3>Thank you for registering new customer <?=$ncustomername ?></h3></tr>
    </table> 


<?php

   }   // END OF IF - SUCCESSFUL REGISTRATION ENTRY
?>

</div>

<?php  require_once("../include/footer.inc.php");
?>    
            

  </body>

</html>