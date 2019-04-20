<!DOCTYPE html>
<html>
<head>
	<title>Asset Management System</title>
  <?php
require('conn.php');
          //include("auth.php");
          $id=$_REQUEST['id'];
          //if($_SESSION['username'] == 'ppd_admin'){
function valid($id, $name, $desc_in,$desc_out ,$date_in ,$date_out ,$no_item, $val, $own)
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
 echo 'checked'; }?>> Disposed: <input type="radio" name="own" value="2" <?php if ($own=='2') {
 echo 'checked'; }?>> Not Available: <input type="radio" name="own" value="3" <?php if ($own=='3') {
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
    <label class="code">Number of Asset.:</label>
    <table>
      <?php echo $no_item; ?>
      <input type="hidden" name="no_item" value="<?php echo $no_item; ?>">
      <input type="hidden" name="name" value="<?php echo $name; ?>">
      <input type="hidden" name="desc_in" value="<?php echo $desc_in; ?>">
      <input type="hidden" name="desc_out" value="<?php echo $desc_out; ?>">
      <input type="hidden" name="val" value="<?php echo $val; ?>">
  </br>
     <label>Combined Item ID.:</label>
    <td class="key"><input class="form-control" type="text" name="trgt_id" id="s1" required="required" autocomplete="off"/></td>
    
    </table>
  </div></div>
  <div class="row">
    <div class="form-group col-xs-5 col-lg-9">
    
    
    
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
$old_item = mysqli_real_escape_string($conn, $_POST['no_item']);
$trgt_item = $_POST['trgt_id'];



 $query = "SELECT * FROM item WHERE item_id='".$trgt_item."'";
    $result = mysqli_query($conn,$query) or die(mysqli_error($conn));
    $rows = mysqli_fetch_array($result);


        if($rows){
      $no_item = $rows['no_item']; // combine inserted ID item units
      echo $no_item;
      echo $old_item;
      $new_item = $old_item + $no_item;
      $query2 = "UPDATE item SET no_item='".$new_item."' WHERE item_id='".$id."'";
     mysqli_query($conn, $query2)
or die(mysqli_error($conn));

            if ($conn->query($query2) === TRUE) {
              $cond = 6 ;
              $nx = "nx";
              $date = date("Y-m-d H:i:s");
              $query3 = "INSERT item_log (cond, item_id, item_id2, item_id3, val, val2, val3, dat_in) 
                VALUES ('$cond', '$id', '$trgt_item','$nx','$old_item','$no_item','$new_item','$date')";
              mysqli_query($conn, $query3)
              or die(mysqli_error($conn));
            }
            else{

              echo "kebamboom!";
            }





            }


            else{
        echo "<h3>Item ID is incorrect, Please try again</h3>";
        exit();
        }



 //$sql = "INSERT INTO item (item_id, name, own, date_in, date_out, desc_in, desc_out, no_item, val) 
               // VALUES ('$x', '$namex', '$ownx','$date_inx','$date_outx','$desc_inx','$desc_outx','$sub_item','$valx')";
                
         //if ($conn->query($query) === TRUE) {
//echo "<script type= 'text/javascript'>alert('New record created successfully');</script>";
//} else {
//echo "<script type= 'text/javascript'>alert('Error: " . $query . "<br>" . $conn->error."');</script>";
//}


if ($trgt_item == '')

{

$error = 'ERROR: Please fill in all required fields!';

valid($id,$trgt_item, $error);
}

else
{

  $ownn = 4 ; //status 4 = dissolved

mysqli_query($conn, "UPDATE item SET own='".$ownn."' WHERE item_id='".$trgt_item."'")
or die(mysqli_error($conn));



$conn->close();

echo "<script>
             alert('Document successfully Updated'); 
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
$date_in= $row['date_in'];
$desc_out= $row['desc_out'];
$date_out= $row['date_out'];
$no_item = $row['no_item'];
$val = $row['val'];
$own = $row['own'];



valid($id, $name, $desc_in,$desc_out ,$date_in ,$date_out ,$no_item, $val, $own, '');
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