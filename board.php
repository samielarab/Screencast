<?php
session_start();
ob_start();
$succs = true;
include_once("include/db_conx.php");
include_once("include/flash.php");

if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
}else{ 
	flash( 'warning_class', 'Please Login Before You Join A Class', 'error' );
	header("Location: index.php");
	exit();
}
$cid = isset($_GET["cid"]) ? mysqli_real_escape_string($db_conx,$_GET["cid"]) : NULL;

$relqry = mysqli_query($db_conx,"SELECT member_id FROM posts WHERE id='$cid' LIMIT 1");
$relqry = mysqli_fetch_row($relqry);
$ownerid = $_SESSION["id"];
if($ownerid == $relqry[0]){
	if(isset($cid)){
		setcookie("relation", "teacher");
		setcookie("session", $cid);
	}else{
		flash( 'warning_class', 'Something went wrong with the Session, Please try later', 'error' );
		$succs = false;
	}
}else{
	if(isset($cid)){
		setcookie("relation", "student");
		setcookie("session", $cid);
	}else{
		flash( 'warning_class', 'Something went wrong with Session, Please try later', 'error' );
		$succs = false;
	}
}
if(isset($succs) && $succs != true){
	echo '<div class="wallar">Something went wrong.... </div>';
}
else{ echo '<html>
<head>
	<title>Board</title>
	<link rel="stylesheet" type="text/css" href="board/css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="board/css/main.css">
	<link rel="stylesheet" type="text/css" href="board/css/font-awesome.min.css">
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">

	<script type="text/javascript" src="board/js/jquery.js"></script>
	<script type="text/javascript" src="board/js/bootstrap.min.js"></script>
	<script type="text/javascript" src="board/js/fabric.js"></script>
	<script src="board/js/Connection.js"></script>
	<script type="text/javascript" src="board/js/board.js"></script>
</head>
<body>';

flash( 'success_message' );
        
 flash( 'warning_class' );
 if(isset($msngr) && $msngr != ""){
 	echo '<div class="success">'.$msngr.'</div>';
 }


 if(isset($_SESSION["loggedin"]) && $_SESSION["loggedin"] == true){
 	 	echo '
 	<nav class="navbar navbar-default header" style="background-color: #15232d; border-radius: 0px;">
		<div class="container-fluid header-fluid">
			<div class="col-xs-5 col-sm-4 col-sm-offset-1">
				<a href="index.php" class="navbar-brand brand">
					<img src="img/glogo/64x64.png" alt="">
				</a>
			</div>
			<div class="col-xs-7 col-sm-7 pull-right">
				<ul class="nav navbar-nav navbar-right header-right-links">
        			<li id="usersetting" data-toggle="dropdown" aria-expanded="true" style="color: #FFFFFF;"><img src="avatar/'.$_SESSION['avatar'].'" alt="">'.$_SESSION['username'].' <i class="fa fa-caret-down"></i></li>
        			<ul class="dropdown-menu" role="menu" aria-labelledby="usersetting">
					    <li role="presentation"><a role="menuitem" tabindex="-1" href="newgig.php">New Screencast</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1" href="activecast.php">Active Cast</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1" href="setting.php">Settings</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1" href="logout.php">Logout</a></li>
					</ul>
        		</ul>
			</div>
		</div>
	</nav>';
 }
else{
	echo '
	<nav class="navbar navbar-default header" style="background-color: #15232d; border-radius: 0px;">
		<div class="container-fluid header-fluid">
			<div class="col-xs-5 col-sm-4 col-sm-offset-1">
				<a href="#" class="navbar-brand brand">
					<img src="img/glogo/64x64.png" alt="">
				</a>
			</div>
			<div class="col-xs-7 col-sm-7 pull-right">
				<ul class="nav navbar-nav navbar-right header-right-links">
        			<li class="header-login" data-toggle="modal" data-target="#login" style="color: #FFFFFF;"><a><div>Login</div></a></li>
        			<li class="header-signup" data-toggle="modal" data-target="#signup" style="color: #FFFFFF;"><a><div>Signup</div></a></li>
        			<li><button class="btn btn-success header-start-selling"><i class="fa fa-user"></i>Start Session</button></li>
        		</ul>
			</div>
		</div>
	</nav>
';
}
echo '	<div class="toolbox">
		<ul>
			<li id="iconsave">
				<div class="dropdown">
					<div class="dropdown-toggle dropicondiv" id="dropidsave" type="button" data-toggle="dropdown" aria-expanded="true"></div>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropidsave">
					    <li role="presentation" id="image_out"><a role="menuitem" tabindex="-1">Save As Image</a></li>
					    <li role="presentation" id="store_out"><a role="menuitem" tabindex="-1">Save Backup In LocalStorage</a></li>
					    <li role="presentation" id="store_load"><a role="menuitem" tabindex="-1">Load Backup From Localstorage</a></li>
		  			</ul>
				</div>
				<div class="iconkitsave iconpack"></div>
			</li>
			<li id="iconsetting">
				<div class="dropdown">
					<div class="dropdown-toggle dropicondiv" type="button" id="dropidsetting" data-toggle="dropdown" aria-expanded="true"></div>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropidsetting">
					    <li role="presentation"><a role="menuitem" tabindex="-1">Action</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Another action</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Something else here</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Separated link</a></li>
		  			</ul>
				</div>
				<div class="iconkitsetting iconpack"></div>
			</li>
			<li id="iconstore">
				<!--<div class="dropdown">
					<div class="dropdown-toggle dropicondiv" type="button" id="dropidstore" data-toggle="dropdown" aria-expanded="true"></div>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropidstore">
					    <li role="presentation"><a role="menuitem" tabindex="-1">Action</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Another action</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Something else here</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Separated link</a></li>
		  			</ul>
				</div> -->
				<div class="iconkitstore iconpack"></div>
			</li>
			<li id="iconfile">
				<div class="dropdown">
					<div class="dropdown-toggle dropicondiv" type="button" id="dropidfile" data-toggle="dropdown" aria-expanded="true"></div>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropidfile">
					    <li role="presentation"><a role="menuitem" tabindex="-1">Action</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Another action</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Something else here</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Separated link</a></li>
		  			</ul>
				</div>
				<div class="iconkitfile iconpack"></div>
			</li>
			<li id="iconundo">
				<!-- <div class="dropdown">
					<div class="dropdown-toggle dropicondiv" type="button" id="dropidundo" data-toggle="dropdown" aria-expanded="true"></div>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropidundo">
					    <li role="presentation"><a role="menuitem" tabindex="-1">Action</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Another action</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Something else here</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Separated link</a></li>
		  			</ul>
				</div> -->
				<div class="iconkitundo iconpack"></div>
			</li>
			<li id="iconredo">
				<div class="dropdown">
					<div class="dropdown-toggle dropicondiv" type="button" id="dropidredo" data-toggle="dropdown" aria-expanded="true"></div>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropidredo">
					    <li role="presentation"><a role="menuitem" tabindex="-1">Action</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Another action</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Something else here</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Separated link</a></li>
		  			</ul>
				</div>
				<div class="iconkitredo iconpack"></div>
			</li>
			<li id="icondelete">
				<!-- <div class="dropdown">
					<div class="dropdown-toggle dropicondiv" type="button" id="dropiddelete" data-toggle="dropdown" aria-expanded="true"></div>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropiddelete">
					    <li role="presentation"><a role="menuitem" tabindex="-1">Action</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Another action</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Something else here</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Separated link</a></li>
		  			</ul>
				</div> -->
				<div class="iconkitdelete iconpack"></div>
			</li>
			<div class="line-break-vertical"></div>
			<li id="iconcursor">
				<!-- <div class="dropdown">
					<div class="dropdown-toggle dropicondiv" type="button" id="dropidcursor" data-toggle="dropdown" aria-expanded="true"></div>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropidcursor">
					    <li role="presentation"><a role="menuitem" tabindex="-1">Action</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Another action</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Something else here</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Separated link</a></li>
		  			</ul>
				</div> -->
				<div class="iconkitcursor iconpack"></div>
			</li>
			<li id="iconpencil">
				<div class="iconpencildd">
					<div class="dropdown-toggle dropicondiv" type="button" id="dropidpencil" data-toggle="dropdown" aria-expanded="true"></div>
					<ul class="dropdown-menu toolpencilsetting clearfix" role="menu" aria-labelledby="dropidpencil">
					    <li role="presentation" class="tpens-colorset">
					    	<ul>
					    		<li class="black choosepencilcolor" data-pencilcolor="000000"></li>
					    		<li class="red choosepencilcolor"  data-pencilcolor="8B0000"></li>
					    		<li class="grey choosepencilcolor"  data-pencilcolor="cccccc"></li>
					    		<li class="green choosepencilcolor"  data-pencilcolor="008000"></li>
					    		<li class="blue choosepencilcolor"  data-pencilcolor="0000FF"></li>
					    		<li class="orange choosepencilcolor"  data-pencilcolor="FFA500"></li>
					    		<li class="white choosepencilcolor"  data-pencilcolor="FFFFFF"></li>
					    		<li class="yellow choosepencilcolor"  data-pencilcolor="FFFF00"></li>
					    		<li class="brown choosepencilcolor"  data-pencilcolor="b68d4c"></li>
					    		<li class="pink choosepencilcolor"  data-pencilcolor="FFC0CB"></li>
					    	</ul>
					    </li>
					    <li role="presentation" class="tpens-thickset">
					    	<ul>
					    		<li class="choosepencilthickness">
					    			<span class="thick1" data-pencilthickness="6"></span>
					    		</li>
					    		<li class="choosepencilthickness">
					    			<span class="thick3"  data-pencilthickness="12"></span>
					    		</li>
					    		<li class="choosepencilthickness">
					    			<span class="thick5"  data-pencilthickness="24"></span>
					    		</li>
					    		<li class="choosepencilthickness">
					    			<span class="thick7"  data-pencilthickness="36"></span>
					    		</li>
					    		<li class="choosepencilthickness">
					    			<span class="thick10"  data-pencilthickness="72"></span>
					    		</li>
					    	</ul>
					    </li>
		  			</ul>
				</div>
				<div class="iconkitpencil iconpack"></div>
			</li>
			<li id="icontext" data-toggle="modal" data-target="#textModal">
				<!-- <div class="dropdown">
					<div class="dropdown-toggle dropicondiv" type="button" id="dropidtext" data-toggle="dropdown" aria-expanded="true"></div>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropidtext">
					    <li role="presentation"><a role="menuitem" tabindex="-1">Action</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Another action</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Something else here</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Separated link</a></li>
		  			</ul>
				</div> -->
				<div class="iconkittext iconpack"></div>
			</li>
			<li id="iconline">
				<div class="iconpencilll">
					<div class="dropdown-toggle dropicondiv" type="button" id="dropidline" data-toggle="dropdown" aria-expanded="true"></div>
					<ul class="dropdown-menu toolpencilsetting clearfix" role="menu" aria-labelledby="dropidline">
					    <li role="presentation" class="tpens-colorset">
					    	<ul>
					    		<li class="black chooselinecolor" data-linecolor="000000"></li>
					    		<li class="red chooselinecolor"  data-linecolor="8B0000"></li>
					    		<li class="grey chooselinecolor"  data-linecolor="cccccc"></li>
					    		<li class="green chooselinecolor"  data-linecolor="008000"></li>
					    		<li class="blue chooselinecolor"  data-linecolor="0000FF"></li>
					    		<li class="orange chooselinecolor"  data-linecolor="FFA500"></li>
					    		<li class="white chooselinecolor"  data-linecolor="FFFFFF"></li>
					    		<li class="yellow chooselinecolor"  data-linecolor="FFFF00"></li>
					    		<li class="brown chooselinecolor"  data-linecolor="b68d4c"></li>
					    		<li class="pink chooselinecolor"  data-linecolor="FFC0CB"></li>
					    	</ul>
					    </li>
					    <li role="presentation" class="tpens-thickset">
					    	<ul>
					    		<li class="chooselinethickness">
					    			<span class="thick1" data-linethickness="6"></span>
					    		</li>
					    		<li class="chooselinethickness">
					    			<span class="thick3"  data-linethickness="12"></span>
					    		</li>
					    		<li class="chooselinethickness">
					    			<span class="thick5"  data-linethickness="24"></span>
					    		</li>
					    		<li class="chooselinethickness">
					    			<span class="thick7"  data-linethickness="36"></span>
					    		</li>
					    		<li class="chooselinethickness">
					    			<span class="thick10"  data-linethickness="72"></span>
					    		</li>
					    	</ul>
					    </li>
		  			</ul>
				</div>
				<div class="iconkitline iconpack"></div>
			</li>
			<li id="iconshape">
				<div class="dropdown">
					<div class="dropdown-toggle dropicondiv" type="button" id="dropidshape" data-toggle="dropdown" aria-expanded="true"></div>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropidshape">
					    <li role="presentation" id="iconshapecircle"><a role="menuitem" tabindex="-1">Circle</a></li>
					    <li role="presentation" id="iconshaperectangle"><a role="menuitem" tabindex="-1">Rectangle</a></li>
					    <li role="presentation" id="iconshapetriangle"><a role="menuitem" tabindex="-1">Triangle</a></li>
					    <li role="presentation" id="iconshapeellipse"><a role="menuitem" tabindex="-1">ellipse</a></li>
		  			</ul>
				</div>
				<div class="iconkitshape iconpack"></div>
			</li>
		</ul>
	</div>
	<div class="wrapper">
		<div class="canvascontainer col-xs-12">
			<!-- <div class="pencildroptoolsetting">
				<ul>
					<li>
						<div class="dropdown">
							<div class="dropdown-toggle dropicondiv" type="button" id="dropidcolor" data-toggle="dropdown" aria-expanded="true"></div>
							<ul class="dropdown-menu" role="menu" aria-labelledby="dropidshape">
							    <li role="presentation"><a role="menuitem" tabindex="-1">Action</a></li>
							    <li role="presentation"><a role="menuitem" tabindex="-1">Another action</a></li>
							    <li role="presentation"><a role="menuitem" tabindex="-1">Something else here</a></li>
							    <li role="presentation"><a role="menuitem" tabindex="-1">Separated link</a></li>
				  			</ul>
						</div>
						<div class="iconkitshape iconpack"></div>
					</li>
					<li>
						<div class="pdts-thick"></div>
					</li>
				</ul>
			</div> -->
			<canvas id="canvas"></canvas>
		</div>			
	</div>
	<div class="modal fade" id="textModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title" id="myModalLabel">Choose Your Style</h4>
      </div>
      <div class="modal-body">
      	<div class="row texto">
      		<div class="col-xs-12">
	      		<input type="text" class="form-control textstr"  placeholder="Type your text" />      			
      		</div>
			<div class="col-xs-6">
		      	<input type="number" class="form-control textsize" placeholder="Size" />			
			</div>
			<div class="col-xs-6">
				<select name="" class="form-control textcolor" name="textcolor">
		      		<option value="#000000">Black</option>
		      		<option value="#8B0000">Red</option>
		      		<option value="#008000">Green</option>
		      		<option value="#0000FF">Blue</option>
		      		<option value="#FFA500">Orange</option>
		      		<option value="#FFFFFF">White</option>
		      		<option value="#FFC0CB">Pink</option>
		      		<option value="#FFFF00">Yellow</option>
		      		<option value="#b68d4c">Brown</option>
		      		<option value="#cccccc">Grey</option>
		      	</select>	
			</div>
	      	
      	</div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary outtext" data-dismiss="modal">Done</button>
      </div>
    </div>
  </div>
</div>
';
}
?>



	<?php include_once("include/logsign.php"); ?>

</body>
</html>