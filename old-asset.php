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
      <li class="dropdown active">
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
  <h2>AMS</h2>

</body>
</html>