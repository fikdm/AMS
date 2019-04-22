<!DOCTYPE html>
<html>
<head>
	<title>Asset Management System</title>
  <?php
require('conn.php');
          //include("auth.php");
          $id=$_REQUEST['id'];
          //if($_SESSION['username'] == 'ppd_admin'){
function valid($id, $name, $desc_in, $no_item, $val)
{
?>
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

<?php

if (isset($error))
{
echo '<div style="padding:4px; border:1px solid red; color:red;">'.$error.'</div>';
}
?>
<script>
  $(function(){
    $("#navv").load("nav.php")
  });
</script>
</head>
<body>

<div id="navv"></div>
<div class="container">
  <h2>Edit Asset Data</h2>
<form action="" method="post">
<input type="hidden" name="id" value="<?php echo $id; ?>"/>
<div class="row">
    <div class="form-group col-xs-5 col-lg-9">
    <label class="code">Name of Asset.:</label>
    
    <input class="form-control" type="text" name="name" required="required" autocomplete="off" 
    value="<?php echo $name; ?>" />
    
  </div></div>
  <div class="row">
    <div class="form-group col-xs-5 col-lg-9">
    <label class="code">Description.:</label>
    
    <textarea class="form-control" name="desc_in" rows="2" cols="50" id="perkara" required="required"/><?php echo $desc_in; ?></textarea>
    
  </div></div>
  <div class="row">
    <div class="form-group col-xs-5 col-lg-9">
    <label class="code">Number of Asset.:</label>
    
    <input class="form-control" type="text" name="no_item" id="ex3" required="required" autocomplete="off" value="<?php echo $no_item; ?>"/>
    
  </div></div>
  <div class="row">
    <div class="form-group col-xs-5 col-lg-9">
    <label class="code">Value per Asset.:</label>
    
    <input class="form-control input-normal" type="text" name="val" id="ex3" required="required" autocomplete="off" value="<?php echo $val; ?>"/>
    
  </div>
  </div>



<input type="submit" value=" Edit " class="btn btn-primary" name="submit" style="margin-left: 50%;"/><br />
      </form>
      </div>

<?php
}
require('conn.php');

if (isset($_POST['submit']))
{

if (is_string($_POST['id']))
{



$id = $_POST['id'];
$name = mysqli_real_escape_string($conn, $_POST['name']);
$desc_in = mysqli_real_escape_string($conn, $_POST['desc_in']);
$no_item = mysqli_real_escape_string($conn, $_POST['no_item']);
$val = mysqli_real_escape_string($conn, $_POST['val']);

echo $id;
echo $name;
echo $desc_in;
echo $no_item;
echo $val;


if ($name == '' || $desc_in == '' || $no_item == '' || $val == '' )

{

$error = 'ERROR: Please fill in all required fields!';


valid($id, $name, $desc_in, $no_item, $val, $error);
}

else
{

$sql = "UPDATE item SET name='$name',desc_in='$desc_in', no_item='$no_item', val='$val'WHERE item_id='$id'";

mysqli_query($conn, $sql )
or die(mysqli_error($conn));

if ($conn->query($sql) === TRUE) {
              $cond = 2 ;
              $nx = "nx";
              $nn = 0;
              $date = date("Y-m-d H:i:s");
              $sql2 = "INSERT item_log (cond, item_id, item_id2, item_id3, val, val2, val3, dat_in) 
                VALUES ('$cond', '$id', '$nx','$nx','$nn','$nn','$nn','$date')";
              mysqli_query($conn, $sql2)
              or die(mysqli_error($conn));
            }
            else{

              echo "Item log failed";
            }

$conn->close();

echo "<script>
             alert('Asset successfully edited'); 
             window.close();
     </script>";
echo "welp";
}
}
else
{

echo 'Error!';
}
}
else

{

if (isset($_GET['id']) && is_string($_GET['id']))
{

$id = $_GET['id'];
$result = mysqli_query($conn, "SELECT * FROM item WHERE item_id='".$id."'")
or die(mysqli_error($conn));
$row = mysqli_fetch_array($result);

if($row)
{

$name = $row['name'];
$desc_in= $row['desc_in'];
//$desc_out= $row['desc_out'];
$no_item = $row['no_item'];
$val = $row['val'];



valid($id, $name, $desc_in, $no_item, $val,'');
}
else
{
echo "No results!";
}
}
else

{
echo 'Error!';
}
}
?>


</body>
</html>