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
      <li class="dropdown">
        <a class="dropdown-toggle" data-toggle="dropdown" href="#">Search
        <span class="caret"></span></a>
        <ul class="dropdown-menu">
          <li><a href="id.php">ID</a></li>
          <li><a href="name.php">Name</a></li>
          <li><a href="date.php">Date</a></li>
        </ul>
      </li>
      <li><a href="transfer.php">Transfer Asset</a></li>
      <li class="active"><a href="loan.php">Loan Asset</a></li>
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
<div>

<div style=" ">

<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Hari Terkini</a></li>
    <li><a data-toggle="tab" href="#menu1">Minggu Terkini</a></li>
    <li><a data-toggle="tab" href="#menu2">Bulan Terkini</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div>
       <h2 style="font-family:helvetica;">Surat Masuk Hari Terkini</h2>
    <hr>
    </br>
    <div>
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
          require('conn.php');
          $count=1;
          //$sel_query="Select * from office ORDER BY id desc;";
          $sel_query="SELECT * FROM item WHERE date_in > DATE_SUB(NOW(), INTERVAL 1 DAY) AND own = '1' ORDER BY date_in DESC;";
          
          
          
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
        <td align="center"> <a href="com.php?id=<?php echo $row["item_id"]; ?>" target="_blank"  title="Print Borang"><img border="0" align="top" src="image/print.png" width="28" height="28" style="padding:4px;"></a>
           <td align="center"> <a href="split.php?id=<?php echo $row["item_id"]; ?>" target="_blank"  title="Print Borang"><img border="0" align="top" src="image/print.png" width="28" height="28" style="padding:4px;"></a>

      <a href="status.php?id=<?php echo $row["item_id"]; ?>" target="_blank"  title="Change Status"><img border="0" align="top" src="image/print.png" width="28" height="28" style="padding:4px;"></a>

         <a href="edit.php?id=<?php echo $row["item_id"]; ?>"  title="Edit Borang"><img border="0" align="top" src="image/edit.png" width="28" height="28" style="padding:4px;"></a>
          <a href="delete.php?id=<?php echo $row["item_id"]; ?> " onclick="return confirm('Are you sure you want to delete this item?');"  title="Delete Borang"><img border="0" align="top" src="image/bin.png" width="28" height="28" style="padding:4px;"></a></td></tr>
          <?php $count++; } }} ?>
          </tbody>
  
    
            
      </table>
    </div>


      </div>
    </div>
    <div id="menu1" class="tab-pane fade">
        <div>
    

    <h2 style="font-family:helvetica;">Surat Masuk Minggu Terkini</h2>
    <hr>
    </br>
    <div>
      <table id="table_id" class="display" width="100%" cellspacing="0">
            <thead>
            <th>Bil</th>
              <th>No. Rujukan</th>
              <th>Tarikh terima:</th>
              <th>Tarikh surat</th>
              <th>Jenis fail</th>
              <th>Perkara</th>
              <th>Tindakan</th>
              <th><font color='Red'>Edit</font></th>
              <th><font color='Red'>Delete</font></th>
            </thead>
            <tbody>
        <?php       
          require('conn.php');
          $count=1;
          //$sel_query="Select * from office ORDER BY id desc;";
          $sel_query="SELECT * FROM office WHERE tterima > DATE_SUB(NOW(), INTERVAL 1 WEEK) AND jenis = 'masuk' ORDER BY id DESC;";
          
          
          
          $result = mysqli_query($conn,$sel_query);
          while($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
          <td width="5%" align="center"><?php echo $count; ?></td>
          <td align="center"><?php echo $row['norujukan']?></td>
          <td align="center"><?php echo date('d-m-Y',strtotime($row['tterima']));?></td>
          <td align="center"><?php echo date('d-m-Y',strtotime($row['tsurat']));?></td>
          <td align="center"><?php echo $row['jenis']?></td>
          <td align="left"><?php echo $row['perkara']?></td>
          <td align="left"><?php echo $row['tindakan']?></td>
          
          <td align="center"><a href="edit.php?id=<?php echo $row["id"]; ?>"><img border="0" align="top" src="image/edit.png" width="28" height="28" style="padding:4px;"></a></td>
          <td align="center"><a href="delete.php?id=<?php echo $row["id"]; ?> " onclick="return confirm('Are you sure you want to delete this item?');"><img border="0" align="top" src="image/bin.png" width="28" height="28" style="padding:4px;"></a></td></tr>
          <?php $count++; } ?>
          </tbody>
  
    
            
      </table>
    </div>
  </div>


    </div>
    <div id="menu2" class="tab-pane fade">
     <div>
    

    <h2 style="font-family:helvetica;">Surat Masuk Bulan Terkini</h2>
    <hr>
    </br>
    <div>
      <table id="table_id" class="display" width="100%" cellspacing="0">
            <thead>
            <th>Bil</th>
              <th>No. Rujukan</th>
              <th>Tarikh terima:</th>
              <th>Tarikh surat</th>
              <th>Jenis fail</th>
              <th>Perkara</th>
              <th>Tindakan</th>
              <th><font color='Red'>Edit</font></th>
              <th><font color='Red'>Delete</font></th>
            </thead>
            <tbody>
        <?php       
          require('conn.php');
          $count=1;
          //$sel_query="Select * from office ORDER BY id desc;";
          $sel_query="SELECT * FROM office WHERE tterima > DATE_SUB(NOW(), INTERVAL 1 MONTH) AND jenis = 'masuk' ORDER BY id DESC;";
          
          
          
          $result = mysqli_query($conn,$sel_query);
          while($row = mysqli_fetch_assoc($result)) { ?>
          <tr>
          <td width="5%" align="center"><?php echo $count; ?></td>
          <td align="center"><?php echo $row['norujukan']?></td>
          <td align="center"><?php echo date('d-m-Y',strtotime($row['tterima']));?></td>
          <td align="center"><?php echo date('d-m-Y',strtotime($row['tsurat']));?></td>
          <td align="center"><?php echo $row['jenis']?></td>
          <td align="left"><?php echo $row['perkara']?></td>
          <td align="left"><?php echo $row['tindakan']?></td>
          
          <td align="center"><a href="edit.php?id=<?php echo $row["id"]; ?>"><img border="0" align="top" src="image/edit.png" width="28" height="28" style="padding:4px;"></a></td>
          <td align="center"><a href="delete.php?id=<?php echo $row["id"]; ?> " onclick="return confirm('Are you sure you want to delete this item?');"><img border="0" align="top" src="image/bin.png" width="28" height="28" style="padding:4px;"></a></td></tr>
          <?php $count++; } ?>
          </tbody>
  
    
            
      </table>
    </div>
  </div>
    </div>
    
    
    
    
    </div>
  </div>


    







  </div>
</div>
</a></tbody></table></div></div></div></div>
</body>
</html>