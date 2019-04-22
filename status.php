<!DOCTYPE html>
<html>
<head>
	<title>Asset Management System</title>
  <?php
require('conn.php');
          //include("auth.php");
          $id=$_REQUEST['id'];
          //if($_SESSION['username'] == 'ppd_admin'){
function valid($id, $name, $desc_in, $no_item, $val, $own)
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
<td>Available: <input type="radio" name="own" value="1" <?php if ($own=='1') {
 echo 'checked'; }?>></br> Not Available: <input type="radio" name="own" value="2" <?php if ($own=='2') {
 echo 'checked'; }?>></br> Disposed: <input type="radio" name="own" value="3" <?php if ($own=='3') {
 echo 'checked';
} ?>> </td>
<div class="row">
    <div class="form-group col-xs-5 col-lg-9">
    <label class="code">Name of Asset.:</label>
    
    <?php echo $name; ?>
    
  </div></div>
  <div class="row">
    <div class="form-group col-xs-5 col-lg-9">
    <label class="code">Description.:</label>
    
    <?php echo $desc_in; ?>
    
  </div></div>
  <div class="row">
    <div class="form-group col-xs-5 col-lg-9">
    <label class="code">Number of Asset.:</label></br>
    <table>
    <td class="key"><input class="form-control" type="text" name="no_item" id="s1" required="required" autocomplete="off" disabled="true" value="<?php echo $no_item; ?>"/></td>
    <input type="hidden" name="no_item" value="<?php echo $no_item; ?>">
    <td>&nbsp&nbsp&nbsp<input type="checkbox" name="room" id="1" onclick ="toggle_dropdown(this.checked,1);" value="1"></input> Partial value</td>
    
    
    </table>
  </div></div>
  <div class="row">
    <div class="form-group col-xs-5 col-lg-9">
    <label class="code">Value per Asset.:</label>
    
    <?php echo $val; ?>
    
  </div>
  </div>
  <label>New item ID</label>

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
$no_item = mysqli_real_escape_string($conn, $_POST['no_item']);
$own = mysqli_real_escape_string($conn, $_POST['own']);



if ($no_item == '')

{

$no_item = $no_item;
$error = 'ERROR: Please fill in all required fields!';


valid($id, $no_item, $own, $error);
}

else
{

$sql = "UPDATE item SET own='$own', no_item='$no_item' WHERE item_id='$id'";

mysqli_query($conn, $sql)
or die(mysqli_error($conn));

if ($conn->query($sql) === TRUE) {
              $cond = 4 ;
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
             alert('Item Status successfully changed'); 
             window.close();
     </script>";
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
$own = $row['own'];



valid($id, $name, $desc_in, $no_item, $val, $own, '');
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
<script type="text/javascript">
  function isChecked(checkbox, sub) {
    document.getElementById(sub).disabled = !checkbox.checked;
}


        $('').each(function() {
    $(this).attr('disabled', 'true');
});
// Enable them on click
$('input[type="checkbox"]').click(function() {
    var s = $(this).parent('td').siblings('td.key').children('input');
    if (s.is(':disabled')) {
        s.removeAttr('disabled');
    } else {
        s.attr('disabled', 'true');
    }
});
</script>

</body>
</html>