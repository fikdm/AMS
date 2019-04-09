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
</head>
<body>

<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">AMS</a>
    </div>
    <ul class="nav navbar-nav">
      <li ><a href="main.php">Dashboard</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Asset Acquirement
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="add-asset.php">New Asset</a></li>
          <li><a href="old-asset.php">Addition Current Asset</a></li>
        </ul>
      </li>
      <li class="dropdown active">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Search
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="id.php">ID</a></li>
          <li><a href="name.php">Name</a></li>
          <li><a href="date.php">Date</a></li>
        </ul>
      </li>
      <li><a href="transfer.php">Transfer Asset</a></li>
      <li><a href="loan.php">Loan Asset</a></li>
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Report
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="log.php">Weekly Log</a></li>
          <li><a href="report.php">Monthly Report</a></li>
          <li><a href="analyst.php">Yearly Analyst</a></li>
        </ul>
      </li>
    </ul>
    <ul class="nav navbar-nav navbar-right">
      <li><a href="logout.php"><span class="glyphicon glyphicon-log-in"></span> Log Out</a></li>
    </ul>
  </div>
</nav>
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
        
           <td align="center"> <a href="file.php?id=<?php echo $row["item_id"]; ?>" target="_blank"  title="Print Borang"><img border="0" align="top" src="image/print.png" width="28" height="28" style="padding:4px;"></a>

      <a href="status.php?id=<?php echo $row["item_id"]; ?>" target="_blank"  title="Change Status"><img border="0" align="top" src="image/print.png" width="28" height="28" style="padding:4px;"></a>

         <a href="edit.php?id=<?php echo $row["item_id"]; ?>"  title="Edit Borang"><img border="0" align="top" src="image/edit.png" width="28" height="28" style="padding:4px;"></a>
          <a href="delete.php?id=<?php echo $row["item_id"]; ?> " onclick="return confirm('Are you sure you want to delete this item?');"  title="Delete Borang"><img border="0" align="top" src="image/bin.png" width="28" height="28" style="padding:4px;"></a></td></tr>
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