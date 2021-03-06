<html>
<head>
	<title>Board</title>
	<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css">
	<link rel="stylesheet" type="text/css" href="css/main.css">
	<link rel="stylesheet" type="text/css" href="css/font-awesome.min.css">
	<script type="text/javascript" src="js/jquery.js"></script>
	<script type="text/javascript" src="js/bootstrap.min.js"></script>
	<script type="text/javascript" src="js/fabric.js"></script>
	<script type="text/javascript" src="js/jspdf.js"></script>
	<script type="text/javascript" src="js/board.js"></script>
</head>
<body>
	<nav class="small-header"></nav>
	<div class="toolbox">
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
				<div class="dropdown">
					<div class="dropdown-toggle dropicondiv" type="button" id="dropidstore" data-toggle="dropdown" aria-expanded="true"></div>
					<ul class="dropdown-menu" role="menu" aria-labelledby="dropidstore">
					    <li role="presentation"><a role="menuitem" tabindex="-1">Action</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Another action</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Something else here</a></li>
					    <li role="presentation"><a role="menuitem" tabindex="-1">Separated link</a></li>
		  			</ul>
				</div>
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
	<div class=" wrapper">
		<div class="canvascontainer col-xs-9">
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
		      	<input type="text" class="form-control textsize" placeholder="Size" />			
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
</body>
</html>