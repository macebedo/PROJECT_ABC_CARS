

<?php

require_once("../include/headermain.inc.php");

    $host = "mysql1.000webhost.com";
    $dbname = "a8773318_acebedo";
    $dbuser = "a8773318_acebedo";
    $pwd = "Dublin2013";
    $dbc =0;
    $dbc = mysqli_connect($host, $dbuser, $pwd, $dbname)
        or die ('Cannot connect to database');



$query1 = "SELECT COUNT( * ) FROM `customers` WHERE `creditLimit` = 0";
  $result1 = mysqli_query($dbc, $query1)
    or die ("Error query database => $query1");

  $row1 = mysqli_fetch_row($result1);
  $bar = $row1[0];

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++

  $query2 = "SELECT COUNT(*) FROM `customers` WHERE `creditLimit` >= 1 AND `creditLimit` <= 50000";
  $result2 = mysqli_query($dbc, $query2)
    or die ("Error query database => $query2");

   $row2 = mysqli_fetch_row($result2);
    $bar2 = $row2[0];

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++

  $query3 = "SELECT COUNT(*) FROM `customers` WHERE `creditLimit` >= 50001 AND `creditLimit` <= 75000";
  $result3 = mysqli_query($dbc, $query3)
    or die ("Error query database => $query3");


  $row3 = mysqli_fetch_row($result3);
  $bar3 = $row3[0];

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++

  $query4 = "SELECT COUNT(*) FROM `customers` WHERE `creditLimit` >= 75001 AND `creditLimit` <= 100000";
  $result4 = mysqli_query($dbc, $query4)
    or die ("Error query database => $query4");

  $row4 = mysqli_fetch_row($result4);
  $bar4 = $row4[0];

//+++++++++++++++++++++++++++++++++++++++++++++++++++++++++

  $query5 = "SELECT COUNT(*) FROM `customers` WHERE `creditLimit` > '100000'";
  $result5 = mysqli_query($dbc, $query5)
    or die ("Error query database => $query5");

  $row5 = mysqli_fetch_row($result5);
  $bar5 = $row5[0];



  // ------- The graph values in the form of associative array
/*
  $values=array(
    "0" => $bar1,
    "1 to 50000" => $bar2,
    "50001 to 75000" => $bar3,
    "75001 to 100000" => $bar4,
    "100000 and above" => $bar5
  );

*/
  $values=array(
    "0" => $bar1,
    "1 to 50000" => $bar2,
    "50001 to 75000" => $bar3,
    "75001 to 100000" => $bar4,
    "Great than 100000" => $bar5
  );


  $img_width=550;
  $img_height=400; 
  $margins=20;

 
//---- Find the size of graph by substracting the size of borders
  $graph_width=$img_width - $margins * 2;
  $graph_height=$img_height - $margins * 2; 
  $img=imagecreate($img_width,$img_height);

 
  $bar_width=20;
  $total_bars=count($values);
  $gap= ($graph_width- $total_bars * $bar_width ) / ($total_bars +1);

 
  // -------  Define Colors ----------------
  $bar_color=imagecolorallocate($img,0,64,128);
  $background_color=imagecolorallocate($img,240,240,255);
  $border_color=imagecolorallocate($img,200,200,200);
  $line_color=imagecolorallocate($img,220,220,220);
 
  // ------ Create the border around the graph ------

  imagefilledrectangle($img,1,1,$img_width-2,$img_height-2,$border_color);
  imagefilledrectangle($img,$margins,$margins,$img_width-1-$margins,$img_height-1-$margins,$background_color);

   // ------- Max value is required to adjust the scale -------
  $max_value = max($values);
  $ratio = $graph_height / $max_value;

 
 // -------- Create scale and draw horizontal lines  --------
  $horizontal_lines=20;
  $horizontal_gap=$graph_height/$horizontal_lines;

  for($i=1;$i<=$horizontal_lines;$i++){
    $y=$img_height - $margins - $horizontal_gap * $i ;
    imageline($img,$margins,$y,$img_width-$margins,$y,$line_color);
    $v=intval($horizontal_gap * $i /$ratio);
    imagestring($img,0,5,$y-5,$v,$bar_color);

  }
 
 
  // ----------- Draw the bars here ------
  for($i=0;$i< $total_bars; $i++){ 
    // ------ Extract key and value pair from the current pointer position
    list($key,$value)=each($values); 
    $x1= $margins + $gap + $i * ($gap+$bar_width) ;
    $x2= $x1 + $bar_width; 
    $y1=$margins +$graph_height- intval($value * $ratio) ;
    $y2=$img_height-$margins;
    imagestring($img,0,$x1+3,$y1-10,$value,$bar_color);
    imagestring($img,0,$x1+3,$img_height-15,$key,$bar_color);   
    imagefilledrectangle($img,$x1,$y1,$x2,$y2,$bar_color);
  }
  //header("Content-type:image/png");
 // imagepng($img);
 // imagedestroy( $img );
          imagegif( $img, "graph.gif", 100);
        imagedestroy($img);
        echo "";

?>
<!DOCType HTML>
<html>
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="../css/style.css" />
    <title>ABC Cars</title>
  </head>
  <body>
  <div id="container">
    <p>
    <br><br>
      Chart will display number of customers within a credit limit range. The ranges are:<br>
        0<br>
        1 to 50,000<br>
        50,001 to 75,000<br>
        75,001 to 100,000<br>
        greater than 100,000<br>

    </p>
    <img src="../graph.gif" >
   </div>

    <?php

  require_once("../include/footer.inc.php");

?>
</head>
</html>

