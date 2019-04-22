<html>
<body>
<?php
					require('conn.php');
					//include("auth.php");
					$id=$_REQUEST['id'];
					//if($_SESSION['username'] == 'ppd_admin'){
						$query = "DELETE FROM item WHERE item_id='".$id."'";
						$result = mysqli_query($conn,$query) or die ( mysqli_error($conn));
						header('Location: ' . $_SERVER['HTTP_REFERER']);

						if ($conn->query($query) === TRUE) {
              $cond = 3 ;
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

					//}
					//else{
					?>
					<!--<script>
						alert('Please contact to administartion for further verification!!!');
						window.location.href = document.referrer;
					</script>-->
					<?php
					
					//}
?>
</body>
</html>