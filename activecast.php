<?php
	session_start();
	include_once("include/flash.php");
	include_once("include/db_conx.php");
	if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){}
	else{
		flash( 'warning_class', 'Please Login Before You Can See Your Active Sessions', 'error' );
		header("Location: index.php");
		exit();
	}
	$userid = (isset($_SESSION["id"])) ? mysqli_real_escape_string($db_conx,$_SESSION["id"]) : NULL;


	if(isset($_POST["enable"]) || isset($_POST["disable"])){
		if(isset($_POST["postid"])){
			$pid = $_POST["postid"];
			if(isset($_POST["enable"])){
				$enqry = mysqli_query($db_conx, "UPDATE posts SET status = '1',updated_at=now() WHERE id='$pid'");
			}elseif (isset($_POST["disable"])) {
				$diqry = mysqli_query($db_conx, "UPDATE posts SET status = '0',updated_at=now() WHERE id='$pid'");
			}
		}
	}
	
	include_once("include/header.php");
?>
<?php
	$totalacts = mysqli_query($db_conx,"SELECT * FROM posts WHERE status='1' AND member_id='$userid'");
	$totalactiveclass = mysqli_num_rows($totalacts);
	$totaldeacts = mysqli_query($db_conx,"SELECT * FROM posts WHERE status='0' AND member_id='$userid'");
	$totaldeactiveclass = mysqli_num_rows($totaldeacts);
?>
<div class="content">
	<div class="actsess">
		<div class="myactivesess container">
			<div class="col-xs-6">ACTIVE GIG <span><?php echo $totalactiveclass; ?></span> </div>
			<div class="col-xs-6">DISABLED GIG <span><?php echo $totaldeactiveclass; ?></span> </div>
		</div>
		<div class="myactivesesstable container">
			<table class="table table-bordered">
			   <caption>Your Active-Gig Settings</caption>
			   <thead>
			      <tr>
			         <th>TITLE</th>
			         <th>CREATED ON</th>
			         <th>ACTION</th>
			      </tr>
			   </thead>
			   <tbody>
			   	<?php
			   		if(isset($userid)){
						$actqry = mysqli_query($db_conx,"SELECT * FROM posts WHERE member_id='$userid'");
						while($arr = mysqli_fetch_assoc($actqry)){
							$timest = strtotime($arr["created_at"]);
							$created_at = date("d-m-Y", $timest);
							echo '<tr>
			         <td><a href="post.php?id='.$arr["id"].'">'.$arr["title"].'</a></td>
			         <td>'.$created_at.'</td>
			         <td>
			         	';


			         	if($arr["status"] != 0){
			         		echo '	<form action="" method="POST">
			         					<input type="hidden" name="postid" value="'.$arr["id"].'"/>
			         					<button type="submit" name="enable" class="btn btn-success" disabled="disabled"><i class="fa fa-recycle"></i> Enable</button>
			         					<button type="submit" name="disable" class="btn btn-warning"><i class="fa fa-ban"></i> Disable</button>
			         				</form>
			         				';
			         	}else{
			         		echo '	<form action="" method="POST">
			         					<input type="hidden" name="postid" value="'.$arr["id"].'"/>
			         					<button type="submit" name="enable" class="btn btn-success"><i class="fa fa-recycle"></i> Enable</button>
			         					<button type="submit" name="disable" class="btn btn-warning" disabled="disabled"><i class="fa fa-ban"></i> Disable</button>
			         				</form>
			         				';
			         	}


			         	
			         echo '</td>
			      </tr>';
						}
					}
			   	?>
			      

			   </tbody>
			</table>
		</div>
	</div>
</div>
