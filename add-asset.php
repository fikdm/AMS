<!DOCTYPE html>
<html>
<head>
	<title>Asset Management System</title>
  <?php {?>
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
      $p = 1;
      $time = date("Y-m-d H:i:s"); //problem start here

    $log = "INSERT INTO user_log (user, p, time_log) 
                VALUES ('$user', '$p', '$time')";
    mysqli_query($conn, $log)
or die(mysqli_error($conn));

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
<div class="container">
  <h2>AMS</h2>
  <form role="form" style="margin-left: 60%; clear: both;" method="post">
    <div class="row">
    <div class="form-group col-xs-5 col-lg-9">
    <label class="code">Name of Asset.:</label>
    
    <input class="form-control" type="text" name="name" required="required" autocomplete="off"/>
    
  </div></div>
  <div class="row">
    <div class="form-group col-xs-5 col-lg-9">
    <label class="code">Description.:</label>
    
    <textarea class="form-control" name="desc_in" rows="2" cols="50" id="perkara" required="required"/></textarea>
    
  </div></div>
  <div class="row">
    <div class="form-group col-xs-5 col-lg-9">
    <label class="code">Number of Asset.:</label>
    
    <input class="form-control" type="text" name="no_item" id="ex3" required="required" autocomplete="off"/>
    
  </div></div>
  <div class="row">
    <div class="form-group col-xs-5 col-lg-9">
    <label class="code">Value per Asset.:</label>
    
    <input class="form-control input-normal" type="text" name="val" id="ex3" required="required" autocomplete="off"/>
    
  </div>
  </div>
</br></br>
  <input type="submit" value="submit " class="btn btn-primary" id="sub" name="submit"/><br />
</form>



</div>

<?php
if(isset($_POST["submit"])){
require('conn.php');

$item_id = bin2hex(random_bytes(4));
$name = $_POST['name'];
$own = 1;
$date_in = date("Y-m-d H:i:s");
$date_out = date("0000-00-00 00:00:00");
$desc_in = $_POST['desc_in'];
$desc_out = "N/A";
$no_item = $_POST['no_item'];
$val = $_POST['val'];


    //$sql_id = "SELECT * FROM item WHERE item_id='$item_id'";
    //$sql_na = "SELECT * FROM item WHERE name='$name'";
    //$res_id = mysqli_query($conn, $sql_id);
    //$res_na = mysqli_query($conn, $sql_na);

    //if (mysqli_num_rows($res_id) > 0) {
     // $name_error = "Sorry... id already taken";  
    //}else if(mysqli_num_rows($res_na) > 0){
     // $email_error = "Sorry... name already taken";  
    //}else{
           $sql = "INSERT INTO item (item_id, name, own, date_in, date_out, desc_in, desc_out, no_item, val) 
                VALUES ('$item_id', '$name', '$own','$date_in','$date_out','$desc_in','$desc_out','$no_item','$val')";
                
           if ($conn->query($sql) === TRUE) {
              $cond = 1 ;
              $nx = "nx";
              $nn = 0;
              $date = date("Y-m-d H:i:s");
              $sql2 = "INSERT item_log (cond, item_id, item_id2, item_id3, val, val2, val3, dat_in) 
                VALUES ('$cond', '$item_id', '$nx','$nx','$nn','$nn','$nn','$date')";
              mysqli_query($conn, $sql2)
              or die(mysqli_error($conn));
              echo "<script>
             alert('Asset successfully recorded'); 
             window.close();
     </script>";
            }
            else{

              echo "Item log failed";
            }
//$x=9999;
               // mysqli_query($conn, "UPDATE item SET own='$own', no_item='$x' WHERE item_id='$item_id'")
//or die(mysqli_error($conn));
$conn->close();

//}
}
}


?>
</body>
</html>