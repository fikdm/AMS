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
</head>
<body>

<div id="navv"></div>
<div class="container">
  

<div class="tab-content">
<div id="menu4" class="tab-pane fade in active">
      <h2>Search by ID</h2>
    </br>

      <div>
        <form method="POST">
          <label>Item ID: </label><input type="name" name="item_id">
          <input type="submit" value="Get Data" name="submit" autocomplete="off">
        </form>
      </div>
</br>


      <table id="table_id" class="display" width="100%" cellspacing="0">
            <thead>
            <th>No.</th>
              <th>Item_ID</th>
              <th>Name</th>
              <th>Description</th>
              <th>Date Acquired</th>
              <th>Value(RM)/Unit(s)</th>
              <th>Number of Unit(s)</th>
              <th>Status</th>
               <th><font color='Red'>Menu</font></th>
              

            </thead>
            <tbody>
        <?php       
          if (isset($_POST['submit'])){     
          require('conn.php');    
            $item_id=($_POST['item_id']);
          $count=1;
          $sel_query="SELECT * FROM item WHERE item_id ='$item_id'ORDER BY date_in DESC;";
          
          $result = mysqli_query($conn,$sel_query);
          while($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
          <td width="5%" align="center"><?php echo $count; ?></td>
          <td align="center"><?php echo $row['item_id']?></td>
          <td align="center"><?php echo $row['name']?></td>
          <td align="center"><?php echo $row['desc_in']?></td>
          <td align="center"><?php echo date('d-m-Y',strtotime($row['date_in']));?></td>
          <td align="center"><?php echo $row['val']?></td>
          <td align="center"><?php echo $row['no_item']?></td>
          <td align="center"><?php if ($row['own'] == 1){echo "Available";}
          elseif ($row['own'] == 2){echo "Loaned";} else {
           echo "Terminated";
          } {{?>
            
          </td>
        
           <td align="center"> 
          <div class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Menu
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="com.php?id=<?php echo $row["item_id"]; ?>" target="_blank"  title="Combine Item"><img border="0" align="top" src="image/com.png" width="28" height="28" style="padding:4px;"></a></li>
          <li><a href="split.php?id=<?php echo $row["item_id"]; ?>" target="_blank"  title="Split Item"><img border="0" align="top" src="image/split.png" width="28" height="28" style="padding:4px;"></a></li>
          <li><a href="status.php?id=<?php echo $row["item_id"]; ?>" target="_blank"  title="Change Item Status"><img border="0" align="top" src="image/sta.png" width="28" height="28" style="padding:4px;"></a></li>
          <li><a href="edit.php?id=<?php echo $row["item_id"]; ?>"  target="_blank" title="Edit Borang"><img border="0" align="top" src="image/edit.png" width="28" height="28" style="padding:4px;"></a></li>
          <li><a href="delete.php?id=<?php echo $row["item_id"]; ?> " onclick="return confirm('Are you sure you want to delete this item?');"  title="Delete Borang"><img border="0" align="top" src="image/bin.png" width="28" height="28" style="padding:4px;"></a></li>

        </ul>
          </div>

          </td></tr>
          <?php $count++; } }}} } ?>
          </tbody>
            
      </table>
    </div>


  </div>
<script type="text/javascript">
  $(document).ready(function() {
    $('table.display').DataTable();
} );


</script>

</body>
</html>