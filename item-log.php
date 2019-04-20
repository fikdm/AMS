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
</head>
<body>

<div id="navv"></div>
  
  <div class="container">
<div>

<div style=" ">

<ul class="nav nav-tabs">
    <li class="active"><a data-toggle="tab" href="#home">Today Asset Log</a></li>
    <li><a data-toggle="tab" href="#menu1">Past 7-days Asset Log</a></li>
    <li><a data-toggle="tab" href="#menu2">Past 30-days Asset Log</a></li>
  </ul>

  <div class="tab-content">
    <div id="home" class="tab-pane fade in active">
      <div>
       <h2 style="font-family:helvetica;">Today Asset Log</h2>
    <hr>
    </br>
    <div>
      <table id="table_id" class="display" width="100%" cellspacing="0">
            <thead>
            <th>No.</th>
              <th>Timestamp</th>
              <th>Item Log</th>
            </thead>
            <tbody>
        <?php       
          require('conn.php');
          $count=1;
          //$sel_query="Select * from office ORDER BY id desc;";
          $sel_query="SELECT * FROM item_log WHERE dat_in > DATE_SUB(NOW(), INTERVAL 1 DAY) 
          ORDER BY dat_in DESC;";
          $result = mysqli_query($conn,$sel_query);
          while($row = mysqli_fetch_assoc($result)) { ?>
           <tr>
          <td width="5%" align="center"><?php echo $count; ?></td>
          <td align="center"><?php echo $row['dat_in']?></td>
          <td align="center"><?php
           switch ($row['cond']) {
             case 1:
             echo "string";
             break;
              case 2:
              echo "a";
              break;
               case 3:
               echo "b";
               break;
                case 4:
                echo "c";
                break;
                 case 5:
                 echo "d";
                 break;
                  case 6:
                  echo "The user combine item ";
                  echo $row['item_id'];
                  echo " with ";
                  echo $row['val'];
                  echo " pax into item ";
                  echo $row['item_id2'];
                  echo " with ";
                  echo $row['val2'];
                  echo " pax become ";
                  echo $row['val3'];
                  echo " pax";
                  break;
             default:
               echo "tech singularity";
               break;
           }
           ?></td>
          </tr>
          <?php $count++; }  ?>
          </tbody>
      </table>
    </div>
      </div>
    </div>
    <div id="menu1" class="tab-pane fade">
        <div>
    <h2 style="font-family:helvetica;">Past 7-days Asset Log</h2>
    <hr>
    </br>
    <div>
      <table id="table_id" class="display" width="100%" cellspacing="0">
            <thead>
            <th>No.</th>
              <th>Timestamp</th>
              <th>Item Log</th>
            </thead>
            <tbody>
        <?php       
          require('conn.php');
          $count=1;
          //$sel_query="Select * from office ORDER BY id desc;";
          $sel_query="SELECT * FROM item_log WHERE dat_in > DATE_SUB(NOW(), INTERVAL 7 DAY) 
          ORDER BY dat_in DESC;";
          $result = mysqli_query($conn,$sel_query);
          while($row = mysqli_fetch_assoc($result)) { ?>
           <tr>
          <td width="5%" align="center"><?php echo $count; ?></td>
          <td align="center"><?php echo $row['dat_in']?></td>
          <td align="center"><?php
           switch ($row['cond']) {
             case 1:
             echo "string";
             break;
              case 2:
              echo "a";
              break;
               case 3:
               echo "b";
               break;
                case 4:
                echo "c";
                break;
                 case 5:
                 echo "d";
                 break;
                  case 6:
                  echo "The user combine item ";
                  echo $row['item_id'];
                  echo " with ";
                  echo $row['val'];
                  echo " pax into item ";
                  echo $row['item_id2'];
                  echo " with ";
                  echo $row['val2'];
                  echo " pax become ";
                  echo $row['val3'];
                  echo " pax";
                  break;
             default:
               echo "tech singularity";
               break;
           }
           ?></td>
          </tr>
          <?php $count++; }  ?>
          </tbody>
      </table>
    </div>
  </div>
    </div>
    <div id="menu2" class="tab-pane fade">
     <div>
    <h2 style="font-family:helvetica;">Past 30-days Asset Log</h2>
    <hr>
    </br>
    <div>
      <table id="table_id" class="display" width="100%" cellspacing="0">
            <thead>
            <th>No.</th>
              <th>Timestamp</th>
              <th>Item Log</th>
            </thead>
            <tbody>
        <?php       
          require('conn.php');
          $count=1;
          //$sel_query="Select * from office ORDER BY id desc;";
          $sel_query="SELECT * FROM item_log WHERE dat_in > DATE_SUB(NOW(), INTERVAL 30 DAY) 
          ORDER BY dat_in DESC;";
          $result = mysqli_query($conn,$sel_query);
          while($row = mysqli_fetch_assoc($result)) { ?>
           <tr>
          <td width="5%" align="center"><?php echo $count; ?></td>
          <td align="center"><?php echo $row['dat_in']?></td>
          <td align="center"><?php
           switch ($row['cond']) {
             case 1:
             echo "string";
             break;
              case 2:
              echo "a";
              break;
               case 3:
               echo "b";
               break;
                case 4:
                echo "c";
                break;
                 case 5:
                 echo "d";
                 break;
                  case 6:
                  echo "The user combine item ";
                  echo $row['item_id'];
                  echo " with ";
                  echo $row['val'];
                  echo " pax into item ";
                  echo $row['item_id2'];
                  echo " with ";
                  echo $row['val2'];
                  echo " pax become ";
                  echo $row['val3'];
                  echo " pax";
                  break;
             default:
               echo "tech singularity";
               break;
           }
           ?></td>
          </tr>
          <?php $count++; }  ?>
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
<script type="text/javascript">
  $(document).ready(function() {
    $('table.display').DataTable();
} );
</script>
</body>
</html>