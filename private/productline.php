<?php

require_once("../include/variable.inc.php");
require_once("../include/headermain.inc.php");
require_once("../include/session.inc.php");

?>


<!DOCTYPE html>

  <html>

    <head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <link rel="stylesheet" type="text/css" href="../css/productline.css" />
    <title>ABC - Product Line</title>
    </head>

    <body>
    <div id="container">
    <br>
    <h1>Product Line</h1>
    <br>
    <div>
        
    </div>
    <br>
        <table id="productline_table">
            <tr>
                <td><a href="../pages/pagination1.php?id=1"><p><img src="../img/classic_car.jpg" height="230"></p>Classic Cars</a></td>
                <td><a href="../pages/pagination2.php?id=1"><p><img src="../img/motorcycle.jpg" height="230"></p>Motorcycles</td>
            </tr>
            <tr>
                <td><a href="../pages/pagination3.php?id=1"><p><img src="../img/plane.jpg" height="230"></p>Planes</a></td>
                <td><a href="../pages/pagination4.php?id=1"><p><img src="../img/ship.jpg" height="230"></p>Ships</td>
            </tr>
            <tr>
                <td><a href="../pages/pagination5.php?id=1"><p><img src="../img/train.jpg" height="230"></p>Trains</a></td>
                <td><a href="../pages/pagination6.php?id=1"><p><img src="../img/truck.jpg" height="230"></p>Trucks and Buses</td>
            </tr>
            <tr>
                <td><a href="../pages/pagination7.php?id=1"><p><img src="../img/vintage.jpg" height="230"></p>Vintage</a></td>
                <td></td>
            </tr>
        </table>
    </div>
        
<?php
     require_once("../include/footer.inc.php");
?>   
</body>

</html>