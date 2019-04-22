<!DOCTYPE html>
<html>
<head>
	<title>Asset Management System</title>
	<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
	<script type="text/javascript" charset="utf8" src="js/jquery.js"></script>


<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/hover.css">
  <link rel="stylesheet" href="css/bs.css">
  <script src="js/bs.js"></script>
  <link rel="stylesheet" type="text/css" href="css/jquery.css"/>
   <script type="text/javascript" charset="utf8" src="js/jquery.js"></script>
<script type="text/javascript" src="js/jquerydt.js"></script>
<link rel="stylesheet" type="text/css" href="css/dt.css">
<script type="text/javascript" language="javascript" src="js/dt.js"></script>
<script>
  $(function(){
    $("#navv").load("nav.php")
  });
</script>
<?php
    require('conn.php');

      $user = "user";
      $p = "dashboard";
      $time = date("Y-m-d H:i:s"); //problem start here ,GMT+8?, machine time?, server time?

    $log = "INSERT INTO user_log (user, p, time_log) 
                VALUES ('$user', '$p', '$time')";
    mysqli_query($conn, $log)
or die(mysqli_error($conn));

                //data insert 2 time because of 2 times web script run
                // a -> b (1), b -> c (1)

            if ($conn->query($log) === TRUE) {
               $flood_check ="SELECT * FROM user_log WHERE time_log > DATE_SUB(NOW(), INTERVAL 5 SECOND);";

          $check = mysqli_query($conn,$flood_check);
           $rowz = mysqli_num_rows($check);
                    if ($rowz == 0) {

                    }
                    else{
                       echo "<script type= 'text/javascript'>alert('Slowdown...');</script>";
                    }
            }
    
                   else{
                      
                       }
?>
</head>
<body>
<div id="navv"></div>


</body>
</html>