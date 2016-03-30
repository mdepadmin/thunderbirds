<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<!--<meta http-equiv="X-UA-Compatible" content="IE=edge">-->
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, minimum-scale=1, user-scalable=no">
		<meta name="description" content="Thunerbirds Routine Mapping Application">
		<meta name="author" content="Alex Strobl, MS GIS University of Redlands (December 2015); MDEP, Mojave Data Ecosystem Program">
        
		<title>Thunderbirds Routine Mapping Application</title>
		<link rel="stylesheet" href="//maxcdn.bootstrapcdn.com/font-awesome/4.5.0/css/font-awesome.min.css" />
        <!--<link rel="stylesheet" href="css/font-awesome.min.css"/>-->      
		<link rel="stylesheet" href="css/bootstrap.css"/>

		<!--<link rel="stylesheet" href="http://openlayers.org/en/v3.8.2/css/ol.css" type="text/css">-->
		<link rel="stylesheet" href="ol3/css/ol.css" type="text/html">
		<script src="http://openlayers.org/en/v3.8.2/build/ol.js"></script>
        <script src="Cesium/Cesium.js"></script>
		<script src="ol3cesium.js"></script>




<style>
   body { overflow: hidden; }
  .nav {z-index: 100;}
      #map {background-color:#000040; position: absolute; top: 50px; bottom: 0px; left: 0px; right: 0px; }
  
       .ol-zoom { font-size: 1.2em; background-color: rgba(255, 255, 255, 0.46);}
       .ol-rotate {font-size: 1.2em; background-color: rgba(255, 255, 255, 0.46);}


      .zoom-top-opened-sidebar { margin-top: 5px;}
      .zoom-top-collapsed { margin-top: 50px;}

  
      .navbar-offset { margin-top: 110px;}

      .panel-heading{
        background: rgb(226,226,226); /* Old browsers */
        background: -moz-linear-gradient(45deg,  rgba(226,226,226,1) 0%, rgba(219,219,219,1) 50%, rgba(209,209,209,1) 51%, rgba(254,254,254,1) 100%); /* FF3.6-15 */
        background: -webkit-linear-gradient(45deg,  rgba(226,226,226,1) 0%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(45deg,  rgba(226,226,226,1) 0%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e2e2e2', endColorstr='#fefefe',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */  
      }  
      .mini-submenu{
        display:none;
        background: rgb(226,226,226); /* Old browsers */
        background: -moz-linear-gradient(45deg,  rgba(226,226,226,1) 0%, rgba(219,219,219,1) 50%, rgba(209,209,209,1) 51%, rgba(254,254,254,1) 100%); /* FF3.6-15 */
        background: -webkit-linear-gradient(45deg,  rgba(226,226,226,1) 0%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(45deg,  rgba(226,226,226,1) 0%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e2e2e2', endColorstr='#fefefe',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
        box-shadow: 2px 2px 2px 2px rgba(0,0,0,.40);
        /*border: 1px solid rgba(0, 0, 0, 0.9);*/
        border-radius: 4px;
        padding: 9px;  
        /*position: relative;*/
        width: 42px;
        text-align: center;
      }
      .toggle-3d {
        background: rgb(226,226,226); /* Old browsers */
        background: -moz-linear-gradient(45deg,  rgba(226,226,226,1) 0%, rgba(219,219,219,1) 50%, rgba(209,209,209,1) 51%, rgba(254,254,254,1) 100%); /* FF3.6-15 */
        background: -webkit-linear-gradient(45deg,  rgba(226,226,226,1) 0%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%); /* Chrome10-25,Safari5.1-6 */
        background: linear-gradient(45deg,  rgba(226,226,226,1) 0%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
        filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e2e2e2', endColorstr='#fefefe',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
        border-color: 1px solid rgba(0, 0, 0, 0.9);
        border-radius: 4px;
        padding: 9px;  
        /*position: relative;*/
        width: 42px;
        text-align: center;
        position: absolute;
        top: ;
        left: 20px;        
        z-index: 55;
        cursor: pointer;
        box-shadow: 2px 2px 2px 2px rgba(0,0,0,.40);
      }
  
      .toggle-3d :hover,
      .toggle-3d :focus {
      color: blue;      
      }
  
        .mini-submenu-left {
        position: absolute;
        left: 30px;
        /*top: 50%;*/
        z-index: 40;
      }

      #map { z-index: 35; }

      .sidebar { 
      z-index: 45;
      }

      .main-row { position: relative; top: 0; }

      .mini-submenu:hover{
        cursor: pointer;
        color: blue;
      }

      .slide-submenu{
        top:100 px;
        background: transparent;
        display: inline-block;
        padding: 0 8px;
        border-radius: 4px;
        cursor: pointer;
        z-index: 500;
      }
      .navbar{
        background: rgb(0,17,71); /* Old browsers */
		background: -moz-linear-gradient(45deg,  rgba(0,17,71,1) 0%, rgba(107,168,198,1) 100%); /* FF3.6-15 */
		background: -webkit-linear-gradient(45deg,  rgba(0,17,71,1) 0%,rgba(107,168,198,1) 100%); /* Chrome10-25,Safari5.1-6 */
		background: linear-gradient(45deg,  rgba(0,17,71,1) 0%,rgba(107,168,198,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
		filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#001147', endColorstr='#6ba8c6',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
        box-shadow: 5px 5px 5px 5px rgba(0,0,0,.70);
        /*box-shadow: 2px 2px #FFFFFF;*/
        /*border-radius: 5px 5px;*/
        /*height: 8%;*/
	   }
       .navbar-default {border-color: rgba(0, 0, 0, 0);}
		/* title */
	   .navbar-default .navbar-brand {
       color: #FFFFFF;
       position: absolute; top: 5px; left: 150px;
       }  
       .navbar-default .navbar-brand:hover,
       .navbar-default .navbar-brand:focus {
       color: #FFFFFF;
       position: absolute; top: 5px; left: 150px;
       }
       .navbar-default .navbar-brand-sm {
       color: #FFFFFF;
       position: absolute; top: 5px; left: 130px;
       }  
      .brand-img {
      background: rgb(226,226,226); /* Old browsers */
      background: -moz-linear-gradient(45deg,  rgba(226,226,226,1) 0%, rgba(219,219,219,1) 50%, rgba(209,209,209,1) 51%, rgba(254,254,254,1) 100%); /* FF3.6-15 */
      background: -webkit-linear-gradient(45deg,  rgba(226,226,226,1) 0%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%); /* Chrome10-25,Safari5.1-6 */
      background: linear-gradient(45deg,  rgba(226,226,226,1) 0%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e2e2e2', endColorstr='#fefefe',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
        border-radius: 15px 15px 15px 15px;
        position: absolute;
        top: 10px;
        left: 10px;
        z-index: 10000;
        box-shadow: 15px 0 15px 0 rgba(0,0,0,.90);
        border-radius: 15px 15px;
        padding: 10px;
       }
       .btn-nav{
       color: #FFFFFF;
       }  
       .brand-img-sm {
      background: rgb(226,226,226); /* Old browsers */
      background: -moz-linear-gradient(45deg,  rgba(226,226,226,1) 0%, rgba(219,219,219,1) 50%, rgba(209,209,209,1) 51%, rgba(254,254,254,1) 100%); /* FF3.6-15 */
      background: -webkit-linear-gradient(45deg,  rgba(226,226,226,1) 0%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%); /* Chrome10-25,Safari5.1-6 */
      background: linear-gradient(45deg,  rgba(226,226,226,1) 0%,rgba(219,219,219,1) 50%,rgba(209,209,209,1) 51%,rgba(254,254,254,1) 100%); /* W3C, IE10+, FF16+, Chrome26+, Opera12+, Safari7+ */
      filter: progid:DXImageTransform.Microsoft.gradient( startColorstr='#e2e2e2', endColorstr='#fefefe',GradientType=1 ); /* IE6-9 fallback on horizontal gradient */
        border-radius: 15px 15px 15px 15px;
        position: absolute;
        top: 10px;
        left: 10px;
        z-index: 10000;
        box-shadow: 5px 5px 5px 5px rgba(0,0,0,.70);
        border-radius: 15px 15px;
        padding: 5px;
       }
       .nav.navbar-nav.navbar-right li a {
       color: #FFFFFF;
	   }  
       /*.sidebar-left {
       width:20%;
       }*/
  
      .btn-toolbar: hover,
      .btn-toolbar: focus {
      color: #FFFFFF;
      
      }
</style>
		<script src="ol3/ol.js"></script>      
		<script src="https://code.jquery.com/jquery-1.11.3.min.js"></script>      
        <script src="js/bootstrap.js"></script>     
        <script type="text/javascript">

       function applyMargins() {
        var leftToggler = $(".mini-submenu-left");
        if (leftToggler.is(":visible")) {
          $(".toggle-3d")
        
            .css("margin-left", 10)

            .removeClass("zoom-top-opened-sidebar")
            .addClass("zoom-top-collapsed");
       } else {
          $(".toggle-3d")
            .css("margin-left", $(".sidebar-left").width())
            .removeClass("zoom-top-opened-sidebar")
            .removeClass("zoom-top-collapsed");
        }
      }

      function isConstrained() {
        return $(".sidebar").width() == $(window).width();
      }

      function applyInitialUIState() {
        if (isConstrained()) {
          $(".sidebar-left .sidebar-body").fadeOut('slide');
          $('.mini-submenu-left').fadeIn();
        }
      }

      $(function(){
        $('.sidebar-left .slide-submenu').on('click',function() {
          var thisEl = $(this);
          thisEl.closest('.sidebar-body').fadeOut('slide',function(){
            $('.mini-submenu-left').fadeIn();
            applyMargins();
          });
        });

        $('.mini-submenu-left').on('click',function() {
          var thisEl = $(this);
          $('.sidebar-left .sidebar-body').toggle('slide');
          thisEl.hide();
          applyMargins();
        });

        $(window).on("resize", applyMargins);

        applyInitialUIState();
        applyMargins();
      });
    </script>
</head>
<body>

    <!--<div class="hidden-xs hidden-sm brand-img"> <img src="https://mojavedata.gov/tim/landing/images/tbirds.png" height="100px" width="90px" class="img-responsive" alt=""></div>
    <div class="hidden-lg hidden-md brand-img-sm"> <img src="https://mojavedata.gov/tim/landing/images/tbirds.png" height="60px" width="50px" class="img-responsive" alt=""></div>-->
    <div class="brand-img-sm"> <img src="images/tbirds.png" height="65px" width="60px" class="img-responsive" alt=""></div>
    <div class="container">
      <nav class="navbar navbar-fixed-top navbar-default" role="navigation">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span> 
            <span class="icon-bar"></span>                
            </button>
            <a class="hidden-xs navbar-brand"><b><i>Thunderbirds Routine Mapping Application</i></b></a>
            <a class="hidden-lg hidden-md hidden-sm navbar-brand-sm"><b><i>T-Birds</i></b><br><b><i>R.M.A</i></b></a>
          </div>
          
          <!-- Collect the nav links, forms, and other content for toggling -->
          <!--=============================Nav bar left hand links and saerch============================-->
          <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">          
            <ul class="nav navbar-nav navbar-right">
              <!--<li><a type="button" class="btn btn-secondary" id="editbtn"><b>Edit</b></a></li>-->
              <li><a type="button" class="btn btn-secondary btn-toolbar" id="editbtn"><b>Edit</b></a></li>
              <li><a type="button" class="btn btn-secondary btn-toolbar" id="delbtn"><b>Delete</b></a></li>
              <li><a id="export-jpeg" class="btn btn-secondary" download="map.jpeg"><i class="icon-download"></i><b>Export</b></a>
              <!--<li><a href="http://108.178.184.45:58088/geoserver/Thunderbirds/wms?service=WMS&version=1.1.0&request=GetMap&layers=Thunderbirds:airshowlocation&styles=&bbox=-119.697017,34.415554,-115.031667,36.238&width=844&height=330&srs=EPSG:4326&format=application/vnd.google-earth.kml+xml" class="btn btn-secondary"><b>KML</b></a></li>  
              <li><a href="http://108.178.184.45:58088/geoserver/Thunderbirds/wms?service=WMS&version=1.1.0&request=GetMap&layers=Thunderbirds:bombburst&styles=&bbox=-116.038252,35.231839,-114.038252,37.231839&width=512&height=512&srs=EPSG:4326&format=application/vnd.google-earth.kml+xml" class="btn btn-secondary"><b>KML BB</b></a></li>  
			  	-->
              <div id="no-download" class="hidden-xs hidden-sm hidden-md error" style="display: none">
					This example requires a browser that supports the
					<a href="http://caniuse.com/#feat=download">link download</a> attribute.
                </div>
              </li>
            </ul>
            </div><!-- /.navbar-collapse -->
            </div><!-- /.container-fluid -->
          </nav>
        </div>
      <div class="navbar-offset"></div>
      <!--=============================/Nav Bar============================--> 
  
      <!--=============================Side Bar============================-->

      <div class="row main-row">
        <div class="col-sm-4 col-md-3 col-lg-3 sidebar sidebar-left pull-left">
          <div class="panel-group sidebar-body" id="accordion-left">
            <div class="panel panel-default">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#select">
                    <i class="fa fa-dot-circle-o"></i>
                      Select Airshow
                  </a>
                  <span class="pull-right slide-submenu">
                    <i class="fa fa-caret-square-o-left fa-lg"></i>
                  </span>
                </h4>
              </div>
              <div id="select" class="panel-collapse collapse">
                <div class="panel-body list-group">
                <!--<div class="panel panel-default">-->
  			      <!--<div id="select" class="panel-collapse collapse">-->
                    
                  <!--=====Airshow Location Control=====-->
					 <fieldset class="form-group">
						<select class="form-control" id="selectshow" id="zoomtoshow" onclick="zoomto()">
							<option selected="true" disabled="true">Choose a Show Location</option>
							<?php
								$db = pg_connect("host=localhost port=58079 dbname=routinelocations user=postgres password=Ri0grande22") 
									or die('Could not connect: ' .pg_last_error());
								$sql = 'SELECT location FROM showlocation';
								$result = pg_query($sql) or die('Query failed: ' .pg_last_error());
								while ($line = pg_fetch_assoc($result)) {
			                      	$loc = $line['location'];
								    echo "<option value='$loc'>" .$loc. "</option>\n";
									}
							pg_free_result($result);
							pg_close($db);
							?>
						</select></fieldset>

						
                   <!--=====/Airshow Location Control=====-->
                  
                   <!--=====Bomb Burst Control=====-->
			<fieldset class="form-group">
			<select class="form-control" id="selectBombbusrt">
				<option selected="true" disabled="true">Choose a Bomb Burst</option>
				<?php
					$db = pg_connect("host=localhost port=58079 dbname=routinelocations user=postgres password=Ri0grande22") 
						or die('Could not connect: ' .pg_last_error());
					$sql = 'SELECT location FROM bombburst';
					$result = pg_query($sql) or die('Query failed: ' .pg_last_error());
					while ($line = pg_fetch_assoc($result)) {
						$bbloc = $line['location'];
					    echo "<option value='$bbloc'>" .$bbloc. "</option>/n";
						}
				pg_free_result($result);
				pg_close($db);
				?>
			</select></fieldset>
		
                  <!--=====Bomb Burst Control=====-->
         
                        <button type="button" class="btn btn-primary" onClick="javascript:zoomto(); javascript:createpts()"><i class="fa fa-play-circle-o"></i><b> Display Routine</b></button>&nbsp
	                    <button type="button" class="btn btn-primary" onClick="javascript:clearroutine()"><i class="fa fa-trash-o"></i><b> Clear Routine  </b></button><br><br>
                    
                  <!--=====Magnetic Deviation======-->
                    <a class="btn btn-secondary" data-toggle="collapse" data-target="#magneticdev">Add Magnetic Deviation</a><br>
						<div id="magneticdev" class="collapse">
                    <div class="input-group margin-bottom-sm panel-collapse collapse">
    					<span class="input-group-addon"><i class="fa fa-compass fa-fw"></i></span>
  						<input class="form-control" type="text" id="magdev" value="0">
					</div>
					</div><br>
                  <!--=====/Magnetic Deviation======-->
					<!--</div>-->
                </div>
              </div>
            </div>
           <!--</div>--> 
            <div class="panel panel-default-2">
              <div class="panel-heading">
                <h4 class="panel-title">
                  <a data-toggle="collapse" href="#newShow">
                    <i class="fa fa-plus-circle"></i>
                      Create New
                  </a>
                </h4>
              </div>
              <div id="newShow" class="panel-collapse collapse">
                <div class="panel-body">
                      
                  <!--Copy from testphp.php-->
    <button type="button" class="btn btn-primary btn-nav" data-toggle="collapse" data-target="#create"><i class="fa fa-fighter-jet fa-rotate-270"></i><b> Create New Airshow</b></button><br>
	<div id="create" class="collapse">
	  <b>Show Location</b><br>
		<form>
		  <input type="text" id="locname" size="20"><br>
		</form>
		  <b>Date</b><br>
		<form>
		  <input type="date" id="showdate"><br>
		</form>
		  <b>Latitude</b><br>
		<form>
		  Degrees:
		 <input type="float" id="latdegrees" size="10"><br>
		  Minutes:
		 <input type="float" id="latdecmin" size="10"><br>
		 <b>Longitude</b><br>
		  Degrees:
		 <input type="float" id="longdegrees" size="10"><br>
		  Minutes:
		 <input type="float" id="longdecmin" size="10"><br>
		</form>
		<input type="submit" class="btn btn-primary btn-toolbar" value="Submit" id="addshow"><br>
	  </div>                  
    <br>              
	<button type="button" class="btn btn-primary btn-nav" data-toggle="collapse" data-target="#bb"><i class="fa fa-bomb"></i><b> Create New Bomb Burst</b></button><br>
	<div id="bb" class="collapse">
		<b>Show Location</b><br>
		    <form>
			  <input type="text" id="BBlocname" size="20"><br>
		      </form>
		        <b>Latitude</b><br>
		      <form onsubmit="conversionfunction()">
			     Degrees:
			    <input type="float" id="BBlatdegrees" size="10"><br>
			     Minutes:
			    <input type="float" id="BBlatdecmin" size="10"><br>
			    <b>Longitude</b><br>
			     Degrees:
			    <input type="float" id="BBlongdegrees" size="10"><br>
			     Minutes:
			    <input type="float" id="BBlongdecmin" size="10"><br>
		      </form>
		      <input type="submit" class="btn btn-primary btn-toolbar" value="Submit" id="addBB"><br>
	        </div>                  
		  </div>   
        </div> 
      </div> 
       <div class="panel panel-default-3">
         <div class="panel-heading">
           <h4 class="panel-title">
             <a data-toggle="collapse" href="#layerSwitch">
               <i class="fa fa-bars"></i>
                 Layers
                </a>
                </h4>
              </div>
              <div id="layerSwitch" class="panel-collapse collapse">
                <div class="panel-body">
                  <!--<button type="button" data-toggle="collapse" data-target="#layers"><b>LAYERS</b></button>
                  <div id="layers" class="collapse">-->
                    <div class="checkbox input-md"><label><input type="checkbox" value="buildingson" id="buildingon" onClick="buildControl(this);" autocomplete="off" checked>Buildings</label></div>
                    <div class="checkbox input-md"><label><input type="checkbox" value="buildextson" id="buildexton" onClick="buildextControl(this);" autocomplete="off" checked>Buildings in Extent</label></div>
                    <div class="checkbox input-md"><label><input type="checkbox" value="3dbuildson" id="3dbuildon" onClick="build3dControl(this);" autocomplete="off" checked>3D Buildings</label></div>
                    <div class="checkbox input-md"><label><input type="checkbox" value="maneuverson" id="maneuveron" onClick="maneuverControl(this);" autocomplete="off" checked>Maneuvers</label></div>
                    <div class="checkbox input-md"><label><input type="checkbox" value="textson" id="texton" onClick="textControl(this);" autocomplete="off" checked>True Headings</label></div>
                    <div class="checkbox input-md"><label><input type="checkbox" value="overlayson" id="overlayon" onClick="overlayControl(this);" autocomplete="off" checked>Overlay</label></div>   
                    <div class="checkbox input-md"><label><input type="checkbox" value="showcenterson" id="showcenteron" onClick="showcenterControl(this);" autocomplete="off" checked>Show Center</label></div>       
                    <div class="checkbox input-md"><label><input type="checkbox" value="bombburstson" id="bombburston" onClick="bombburstControl(this);" autocomplete="off" checked>Bomb Burst</label></div>                   
		          </div>
                </div>
              </div>  <!----sidebar-body-->
            </div> <!--sidebar left-->
          </div> <!--row main-row-->
        <!--</div>-->
      <div class="mini-submenu mini-submenu-left pull-left">
        <i class="fa fa-caret-square-o-right fa-2x"></i>
      </div>
      <div class="toggle-3d" id ="toggle3d" title= "Toggle 3D" onclick="javascript:ol3d.setEnabled(!ol3d.getEnabled())">
        <i class="fa fa-globe fa-2x fa-rotate"></i>
      </div>
                          </div> <!--test close-->
  <!--=============================/Side Bar============================-->
  
  <div class="row-fluid">
  <div class="span12">
    <div id="map" class="map">
	</div>
  </div>
</div>
<script>
//Zoom to airshow location
function zoomto() {
  var show = document.getElementById('selectshow').value;
  if(show != "Choose a Show Location") {
    $.ajax({
      type: "GET",
      url: "getgeom.php?show=" + show,
      success: function(data) {
        var showlong = parseFloat(data[0]);
        var showlat = parseFloat(data[1]);
        var showcoords = [showlong,showlat];
        map.getView().setCenter(ol.proj.transform(showcoords, 'EPSG:4326', 'EPSG:3857'));
		view.setZoom(13);
     }
    });
  }
}
//Layer Visibility
function buildControl(buildingslayer) {
	if(buildingslayer.value == "buildingson")
		NVbuildings.setVisible(buildingslayer.checked);
		NVbuildings.setExtent();
};
function maneuverControl(maneuverslayer) {
	if(maneuverslayer.value == "maneuverson")
		maneuverpts.setVisible(maneuverslayer.checked);
		maneuverpts.setExtent();
};
function buildextControl(buildextlayer) {
	if(buildextlayer.value == "buildextson")
		buildings3d.setVisible(buildextlayer.checked);
		buildings3d.setExtent();
};
function build3dontrol(build3dlayer) {
	if(buildextlayer.value == "buildextson")
		buildings3d.setVisible(buildextlayer.checked);
		buildings3d.setExtent();
};
function textControl(textlayer) {
	if(textlayer.value == "textson")
		trueheadings.setVisible(textlayer.checked);
		trueheadings.setExtent();
};
function overlayControl(overlaylayer) {
	if(overlaylayer.value == "overlayson")
		flightlines.setVisible(overlaylayer.checked);
		flightlines.setExtent();
};
function showcenterControl(showcenterlayer) {
	if(showcenterlayer.value == "showcenterson")
		centerlocations.setVisible(showcenterlayer.checked);
		centerlocations.setExtent();
};
function bombburstControl(bombburstlayer) {
	if(bombburstlayer.value == "bombburstson")
		bblocations.setVisible(bombburstlayer.checked);
		bblocations.setExtent();
};
//Set center with Forms
$(document).ready(function() {
	var initcenter = ol.proj.transform(map.getView().getCenter(),'EPSG:3857', 'EPSG:4326');
//Convert Decimal Degrees to Degree, Decimal Minute
	longcoord = initcenter[0];
	latcoord = initcenter[1];
	if(longcoord < 0) {
		longdeg = Math.ceil(longcoord);
	} else {
		longdeg = Math.floor(longcoord);
	}
	if(latcoord < 0) {
		latdeg = Math.ceil(latcoord);
	} else {
		latdeg = Math.floor(latcoord);
	}
	longdec = Math.abs(longcoord - longdeg);
	longmin = (longdec * 60).toFixed(4);
	latdec = Math.abs(latcoord - latdeg);
	latmin = (latdec * 60).toFixed(4);
	$('#longdegrees').val(longdeg);
	$('#latdegrees').val(latdeg);
	$('#longdecmin').val(longmin);
	$('#latdecmin').val(latmin);
});
//Zoom to New Airshow Location
	$('#addshow').on('click', function() {
		var newlongdeg = parseInt($('#longdegrees').val());
      	var newlongmin = (parseFloat($('#longdecmin').val())/60);
        var newlatdeg = parseInt($('#latdegrees').val());
      	var newlatmin = (parseFloat($('#latdecmin').val())/60);
		if (newlongmin > 1) {
			newlongmin = (newlongmin - 1);
		} else if(newlatmin > 1) {
			newlatmin = (newlatmin - 1);
		}
		if(newlongdeg < 0) {
			var newcenter = [(newlongdeg-newlongmin),(newlatdeg+newlatmin)];
		} else if (newlatdeg < 0) {
			var newcenter = [(newlongdeg+newlongmin),(newlatdeg-newlatmin)];
		} else {
			var newcenter = [(newlongdeg+newlongmin),(newlatdeg+newlatmin)];
		}
		map.getView().setCenter(ol.proj.transform(newcenter, 'EPSG:4326', 'EPSG:3857'));
	});
	
//Defining Vector Layers
var buildingVector = new ol.source.Vector();

var buildings3d = new ol.layer.Vector({
	source: buildingVector
	});

var maneuversVector = new ol.source.Vector();
	
var maneuverpts = new ol.layer.Vector({
	source: maneuversVector
	});
	
var linesVector = new ol.source.Vector();

var flightlines = new ol.layer.Vector({
	source: linesVector
	});

var textsource = new ol.source.Vector();

var trueheadings = new ol.layer.Vector({
	source: textsource
	});
dirangle = [];
distance = [];
elv = [];
//Query Distances and Azimuth Dataset for routine values
<?php
	$db = pg_connect("host=localhost port=58079 dbname=routinelocations user=postgres password=Ri0grande22") 
		or die('Could not connect: ' .pg_last_error());
	$ang = 'SELECT azimuth FROM distandangle';
	$dist = 'SELECT distance FROM distandangle';
	$atelv = 'SELECT height FROM distandangle';
	$angresult = pg_query($ang) or die('Query failed: ' .pg_last_error());
	$distresult = pg_query($dist) or die('Query failed: ' .pg_last_error());
	$atelvresult = pg_query($atelv) or die('Query failed: ' .pg_last_error());
	while ($line = pg_fetch_assoc($angresult)) {
		echo "dirangle.push(" .$line['azimuth']. ");";
	}
	while ($line = pg_fetch_assoc($distresult)) {
		echo "distance.push(" .$line['distance']. ");";
	}
	while ($line = pg_fetch_assoc($atelvresult)) {
		echo "elv.push(" .$line['height']. ");";
	}
	pg_free_result($angresult,$distresult,$atelvresult);
	pg_close($db);
?>
//Create Routine Points
var createpts = function() {
	var routinebb = document.getElementById('selectBombbusrt').value;
//Choose a Bomb Burst Location from PHP as ajax response
	if(routinebb != "Choose a Bomb Burst") {
	$.ajax({
		type: "GET",
		url: "getbbgeom.php?routinebb=" + routinebb,
		success: function(bbdata) {
	var cntr = ol.proj.transform(map.getView().getCenter(),'EPSG:3857', 'EPSG:4326');
	var cntrlong = cntr[0] * Math.PI / 180;
	var cntrlat = cntr[1] * Math.PI / 180;
	var bblong = (parseFloat(bbdata[0]) * Math.PI / 180);
	var bblat = (parseFloat(bbdata[1]) * Math.PI / 180);
	var thetaY = Math.sin(bblong-cntrlong)*Math.cos(bblat);
	var thetaX = Math.cos(cntrlat)*Math.sin(bblat)-Math.sin(cntrlat)*Math.cos(bblat)*Math.cos(bblong-cntrlong);
	var theta = ((Math.atan2(thetaY,thetaX) * 180 / Math.PI) + 360) % 360;
	var features = [];
	var featurecoords = [];
	var bufferFeatures = [];
	R = 6371000; // Earth's radius in meters
//For Each Maneuver Point, calculate Location
	for (var i = 0; i < dirangle.length; ++i) {
		var brng = (dirangle[i] + theta) * Math.PI / 180;
		var angdist = ((distance[i]/3.2808)/R);
		var latit = Math.asin(Math.sin(cntrlat)*Math.cos(angdist)+Math.cos(cntrlat)*Math.sin(angdist)*Math.cos(brng));
		var longit = cntrlong+Math.atan2(Math.sin(brng)*Math.sin(angdist)*Math.cos(cntrlat),Math.cos(angdist)-Math.sin(cntrlat)*Math.sin(latit));
		var deglat = latit * 180 / Math.PI;
		var deglong = longit * 180 / Math.PI;
//Add 50m buffer as Cesium Primitive Circle Geometry
		var bufferInstance = new Cesium.GeometryInstance({
			geometry: new Cesium.CircleGeometry({
				center: Cesium.Cartesian3.fromDegrees(deglong,deglat),
				height: elv[i],
				radius: 75,
				vertexFormat: Cesium.PerInstanceColorAppearance.VERTEX_FORMAT
			}),
			attributes : {
				color : new Cesium.ColorGeometryInstanceAttribute(0.0, 1.0, 1.0, 0.8),
				
			}
		});
		scene.primitives.add(new Cesium.Primitive({
			geometryInstances: bufferInstance,
			appearance : new Cesium.PerInstanceColorAppearance({
				translucent: false
			})
		}));
//Create point for each routine maneuver
		var ptscoord = new ol.proj.transform([deglong,deglat,elv[i]], 'EPSG:4326', 'EPSG:3857');
		featurecoords.push(ptscoord);
		var finalpoints = new ol.Feature({
			geometry: new ol.geom.Point(ptscoord)
		});
		var showstyle = new ol.style.Style({
			image: new ol.style.Circle({
				radius: 5,
				fill: new ol.style.Fill({color: '#FF0000'}),
				stroke: new ol.style.Stroke({
					color: '#000000',
					width: 3
				})
			})
		});
//Set Style and add to Vector Layer
		finalpoints.setStyle(showstyle);
		finalpoints.setId(i+1);
		features.push(finalpoints);
	}
	maneuversVector.addFeatures(features);


//Create Flight Lines Overlay
	var linefeatures = [];
	var cntrproj = new ol.proj.transform([cntr[0],cntr[1],1000], 'EPSG:4326', 'EPSG:3857');
//Set Line Endpoint Locations
	var LRRL = [featurecoords[31],featurecoords[36]];
	var BFFB = [featurecoords[24],featurecoords[28]];
    var CR = [featurecoords[5][0],featurecoords[5][1],1000]
	var CRC = [cntrproj,CR];
	var linecoords = [LRRL,BFFB,CRC];
	for (var i = 0; i < linecoords.length; ++i) {
		var linegeom = new ol.Feature({
			geometry: new ol.geom.LineString(linecoords[i])
		});
		var linestyle = new ol.style.Style({
			stroke: new ol.style.Stroke({
				color: 'rgba(0,0,255,1.0)',
				width: 5
			})
		});
//Set Style and add to Vector Layer
		linegeom.setStyle(linestyle);
		linegeom.setId(i+1);
		linefeatures.push(linegeom);
	}
	linesVector.addFeatures(linefeatures);
//Select Buildings in Extent of Airshow
	var maneuversExt = maneuversVector.getExtent();
	var buildingsExt = buildingSource.getFeaturesInExtent(maneuversExt);	
	NVbuildings.setVisible(false);
	var buildingFeatures = [];
	var buildingpos = 0;
	var counter = 0;
//Create Building Points for buildings in extent
	for (var i = 0; i < buildingsExt.length; ++i) {
		var position = [Cesium.Cartographic.fromDegrees(buildingsExt[i].get('LongDD'),buildingsExt[i].get('LatDD'),0)];
		var promise = Cesium.sampleTerrain(terrain, 11, position);
//Asynchronously sample terrain height and add to extrusion height
		Cesium.when(promise, function(updatePosition) {
			console.log(position[0]);
			buildingpos = updatePosition[0];
		});
		var buildingCoord = new ol.proj.transform([buildingsExt[i].get('LongDD'),buildingsExt[i].get('LatDD'),(buildingsExt[i].get('AMSLHT')/3.2808)], 'EPSG:4326', 'EPSG:3857');
		var buildheight = buildingpos.height;
		var extHeight = (buildheight + (buildingsExt[i].get('AGLHT')/3.2808));
//Add extruded buildings as Cesium Primitives
		var grayPolygonInstance = new Cesium.GeometryInstance({
			geometry: new Cesium.CircleGeometry({
				center: Cesium.Cartesian3.fromDegrees(buildingsExt[i].get('LongDD'),buildingsExt[i].get('LatDD')),
				radius: 50,
				extrudedHeight: (buildingsExt[i].get('AMSLHT')/3.2808),
				vertexFormat: Cesium.PerInstanceColorAppearance.VERTEX_FORMAT
			}),
			attributes : {
				color : new Cesium.ColorGeometryInstanceAttribute(0.0, 0.0, 1.0, 0.8),
			}
		});
	scene.primitives.add(new Cesium.Primitive({
		geometryInstances: grayPolygonInstance,
		appearance : new Cesium.PerInstanceColorAppearance({
			translucent: false
		})
	}));
//Create location for each building
	var buildingpoints = new ol.Feature({
			geometry: new ol.geom.Point(buildingCoord)
		});
		var buildingstyle = new ol.style.Style({
			image: new ol.style.Circle({
				radius: 5,
				fill: new ol.style.Fill({color: '#FFFFFF'}),
				stroke: new ol.style.Stroke({
					color: '#000000',
					width: 3
				})
			})
		});
//Set Style and add to Vector Layer
		buildingpoints.setStyle(buildingstyle);
		buildingpoints.setId(i+1);
		buildingFeatures.push(buildingpoints);
	}
	buildingVector.addFeatures(buildingFeatures);
//Set new Rotation of Map
	view.setRotation((450-theta) * Math.PI / 180);
//Set Position of Flight Angles
	headingtext = [];
	textangles = [dirangle[31],dirangle[36],dirangle[24],dirangle[28],dirangle[5]];
	headings = [featurecoords[31],featurecoords[36],featurecoords[24],featurecoords[28],featurecoords[5]];
    var magndev = parseInt($('#magdev').val());
//Calculate Heading
	for (var i = 0; i < headings.length; i++) {
		var coord = headings[i];
		var textcoord = [coord[0],coord[1],1000];
		var inangle = Math.round((textangles[i] + theta + magndev) % 360);
		var outangle = Math.round((textangles[i] + theta + magndev + 180) % 360);
		var text = new ol.Feature({
			geometry: new ol.geom.Point(textcoord)
		});
		var textstyle = new ol.style.Style({
			text: new ol.style.Text({
				text: outangle + ' / ' + inangle,
				rotation: (textangles[i] + 90) * Math.PI / 180,
				font: 'bold 20px Times New Roman',
				offsetY: 5,
				offsetX: 5,
				fill: new ol.style.Fill({color: 'black'}),
				stroke: new ol.style.Stroke({ color: 'white', width: 3})
			})
		});
//Set Text Style and add to Vector Layer
		text.setStyle(textstyle);
		text.setId(i+1);
		headingtext.push(text);
	}
	textsource.addFeatures(headingtext);
			}
		});	
	}
};

//Clear Routine Points
var clearroutine = function() {
	maneuversVector.clear();
	linesVector.clear();
	buildingVector.clear();
	textsource.clear();
	scene.primitives.removeAll();
};
	
//Variables for select and mouse click
controlMouse = new ol.control.MousePosition({
	coordinateFormat: ol.coordinate.createStringXY(4),
});

selectPointerMove = new ol.interaction.Select({
	condition: ol.events.condition.pointerMove
	});

//loading WFS for show center with GeoJSON and JQuery
var geojsonFormat1 = new ol.format.GeoJSON();
var geojsonFormat2 = new ol.format.GeoJSON();
var geojsonFormat3 = new ol.format.GeoJSON();

//Add Buildings Vector Source from GeoServer as WFS
var buildingSource = new ol.source.Vector({
	loader: function(extent, resolution, projection) {
	var url = 'http://108.178.184.45:58088/geoserver/wfs?service=WFS&' +
        'version=1.1.0&request=GetFeature&typename=Thunderbirds:Buildings&' +
        'outputFormat=text/javascript&format_options=callback:loadFeatures2' +
        '&srsname=EPSG:3857&bbox=' + extent.join(',') + ',EPSG:3857';
		
    $.ajax({
		url: url, 
		dataType: 'jsonp', 
		jsonp: true
		}).done(function(response) {
			WFSformat = new ol.format.WFS(),
			sourceVector.addFeatures(WFSformat.readFeatures(response))
	});
  },
  strategy: ol.loadingstrategy.tile(ol.tilegrid.createXYZ({
    maxZoom: 19,
  }))
});

//Add Bomb Burst Vector Source from GeoServer as WFS
var BBSource = new ol.source.Vector({
	loader: function(extent, resolution, projection) {
	var url = 'http://108.178.184.45:58088/geoserver/wfs?service=WFS&' +
        'version=1.1.0&request=GetFeature&typename=Thunderbirds:bombburst&' +
        'outputFormat=text/javascript&format_options=callback:loadFeatures3' +
        '&srsname=EPSG:3857&bbox=' + extent.join(',') + ',EPSG:3857';
		
    $.ajax({
		url: url, 
		dataType: 'jsonp', 
		jsonp: true
		}).done(function(response) {
			WFSformat = new ol.format.WFS(),
			sourceVector.addFeatures(WFSformat.readFeatures(response))
	});
  },
  strategy: ol.loadingstrategy.tile(ol.tilegrid.createXYZ({
    maxZoom: 19,
  }))
});

//Add Show Center Vector Source from GeoServer as WFS
var vectorSource = new ol.source.Vector({
	loader: function(extent, resolution, projection) {
	var url = 'http://108.178.184.45:58088/geoserver/wfs?service=WFS&' +
        'version=1.1.0&request=GetFeature&typename=Thunderbirds:showlocation&' +
        'outputFormat=text/javascript&format_options=callback:loadFeatures1' +
        '&srsname=EPSG:3857&bbox=' + extent.join(',') + ',EPSG:3857';
		
    $.ajax({
		url: url, 
		dataType: 'jsonp', 
		jsonp: true
		}).done(function(response) {
			WFSformat = new ol.format.WFS(),
			sourceVector.addFeatures(WFSformat.readFeatures(response))
	});
  },
  strategy: ol.loadingstrategy.tile(ol.tilegrid.createXYZ({
    maxZoom: 19
  }))
});

//Load Vector Features
window.loadFeatures1 = function(response) {
  vectorSource.addFeatures(geojsonFormat1.readFeatures(response));
};

window.loadFeatures2 = function(response) {
  buildingSource.addFeatures(geojsonFormat2.readFeatures(response));
};

window.loadFeatures3 = function(response) {
  BBSource.addFeatures(geojsonFormat3.readFeatures(response));
};

//Setting up WFS transaction
var interaction;
var select = new ol.interaction.Select({
	style: new ol.style.Style({
		stroke: new ol.style.Stroke({
			color: '#FF2828'
		})
	})
});

//Setting variables for transaction
var actions = {};
var WFSformat = new ol.format.WFS();
var GMLformat = new ol.format.GML({
	featureNS: 'http://geoserver.org/Thunderbirds',
	featureType: 'showlocation',
	srsName: 'EPSG:3857'
	});
var BBGMLformat = new ol.format.GML({
	featureNS: 'http://geoserver.org/Thunderbirds',
	featureType: 'bombburst',
	srsName: 'EPSG:3857'
	});
//Setting Transaction Function
var WFStransaction = function(p,f) {
	switch(p) {
	case 'insert':
		node = WFSformat.writeTransaction([f],null,null,GMLformat);
		break;
	case 'BBinsert': 
		node = WFSformat.writeTransaction([f],null,null,BBGMLformat);
		break;
	case 'update':
		node = WFSformat.writeTransaction(null,[f],null,GMLformat);
		break;
	case 'delete':
		node = WFSformat.writeTransaction(null,null,[f],GMLformat);
		break;
	}
	s = new XMLSerializer();
	str = s.serializeToString(node);
	$.ajax('http://108.178.184.45:58088/geoserver/wfs', {
		type: 'POST',
		dataType: 'xml',
		crossDomain: true,
		username: 'admin1',
		password: 'Ri0grande22',
		sslmode: true,
		processData: false,
		contentType: 'text/xml',
		data: str,
		}).done();
}

//Transaction definition
$('.btn-toolbar').on('click', function(event) {
	map.removeInteraction(interaction);
	select.getFeatures().clear();
	map.removeInteraction(select);
	switch($(this).attr('id')) {
	
//Edit transaction	
	case 'editbtn':
		map.addInteraction(select);
		interaction = new ol.interaction.Modify({
			features: select.getFeatures()
		});
		map.addInteraction(interaction);
		
		snap = new ol.interaction.Snap({
			source: vectorSource
		});
		map.addInteraction(snap);
		actions = {};
		select.getFeatures().on('add', function(e) {
			e.element.on('change', function(e) {
				actions[e.target.getId()] = true;
			});
		});
//Select Feature, Clone at new location, delete old feature
		select.getFeatures().on('remove', function(e) {
			f = e.element;
			if (actions[f.getId()]){
				delete actions[f.getId()];
				featureProperties = f.getProperties();
				delete featureProperties.boundedBy;
				var clone = new ol.Feature();
				clone.setId(f.getId());
				clone.set('geom', f.getGeometry());
				WFStransaction('update',clone);
				}
			});
		break;
	
//Add show location	
	case 'addshow':
		interaction = new ol.interaction.Draw({
			type: 'Point',
			geometryName: 'geom',
			source: vectorSource
		});
		map.addInteraction(interaction);
		interaction.on('drawend', function(showe) {
			var feature = showe.feature;
			feature.set('location', $('#locname').val());
			feature.set('date', $('#showdate').val());
			var cntrlongdeg = parseInt($('#longdegrees').val());
			var cntrlongmin = (parseFloat($('#longdecmin').val())/60);
			var cntrlatdeg = parseInt($('#latdegrees').val());
			var cntrlatmin = (parseFloat($('#latdecmin').val())/60);
			if (cntrlongmin > 1) {
				cntrlongmin = (cntrlongmin - 1);
			} else if(cntrlatmin > 1) {
				cntrlatmin = (cntrlatmin - 1);
			}
			if(cntrlongdeg < 0) {
				var newpt = [(cntrlongdeg-cntrlongmin),(cntrlatdeg+cntrlatmin)];
			} else if (cntrlatdeg < 0) {
				var newpt = [(cntrlongdeg+cntrlongmin),(cntrlatdeg-cntrlatmin)];
			} else {
				var newpt = [(cntrlongdeg+cntrlongmin),(cntrlatdeg+cntrlatmin)];
			}
			feature.set('geom', new ol.geom.Point(newpt));
			WFStransaction('insert', feature);
			alert("Success! Added Show Center Location");			
		});
		break;
		
//Add Bomb Burst location
	case 'addBB':
		interaction = new ol.interaction.Draw({
			type: 'Point',
			geometryName: 'geom',
			source: BBSource
		});
		map.addInteraction(interaction);
		interaction.on('drawend', function(e) {
			var BBfeature = e.feature;
			BBfeature.set('location', $('#BBlocname').val());
			BBfeature.set('elevation', 1000);
			var BBlongdeg = parseInt($('#BBlongdegrees').val());
			var BBlongmin = (parseFloat($('#BBlongdecmin').val())/60);
			var BBlatdeg = parseInt($('#BBlatdegrees').val());
			var BBlatmin = (parseFloat($('#BBlatdecmin').val())/60);
			if (BBlongmin > 1) {
				BBlongmin = (BBlongmin - 1);
			} else if(BBlatmin > 1) {
				BBlatmin = (BBlatmin - 1);
			}
			if(BBlongdeg < 0) {
				var BBnewpt = [(BBlongdeg-BBlongmin),(BBlatdeg+BBlatmin)];
			} else if (BBlatdeg < 0) {
				var BBnewpt = [(BBlongdeg+BBlongmin),(BBlatdeg-BBlatmin)];
			} else {
				var BBnewpt = [(BBlongdeg+BBlongmin),(BBlatdeg+BBlatmin)];
			}
			BBfeature.set('geom', new ol.geom.Point(BBnewpt));
			WFStransaction('BBinsert', BBfeature);
			setTimeout(function(){location.reload();},5000);
			alert("Success! Added Bomb Burst Location");
		});
		break;
	
//Delete transaction	
	case 'delbtn':
		interaction = new ol.interaction.Select();
		map.addInteraction(interaction);
		interaction.getFeatures().once('change:length', function(e) {
			WFStransaction('delete',e.target.item(0));
		interaction.getFeatures().clear();
		selectPointerMove.getFeatures().clear();
		});
		break;
		
	default:
		break;
	}
});

//Adding vector layer for buildings in California and Nevada
var NVbuildings = new ol.layer.Vector({
	maxResolution: 50,
	source: buildingSource,
	visible: true,
	style: new ol.style.Style({
		image: new ol.style.Circle({
			radius: 5,
			fill: new ol.style.Fill({color: '#FFFFFF'}),
			stroke: new ol.style.Stroke({
				color: '#000000',
				width: 3
			})
		})
	})
});

//Adding vector layer for show centers
var centerlocations = new ol.layer.Vector({
	source: vectorSource,
	style: new ol.style.Style({
		image: new ol.style.RegularShape({
			points: 5,
			radius1: 10,
			radius2: 4,
			angle: 0,
			fill: new ol.style.Fill({color: '#0000FF'}),
			stroke: new ol.style.Stroke({
				color: '#0000FF',
				width: 3
			})
		})
	})
});	

//Adding vector layer for Bomb Burst
var bblocations = new ol.layer.Vector({
	maxResolution: 50,
	source: BBSource,
	style: new ol.style.Style({
		image: new ol.style.RegularShape({
			points: 4,
			radius1: 10,
			angle: 0,
			fill: new ol.style.Fill({color: '#ff6600'}),
			stroke: new ol.style.Stroke({
				color: '#ff6600',
				width: 3
			})
		})
	})
});

//Adding bing maps as basemap
var basemap = new ol.layer.Tile({
	source: new ol.source.BingMaps({
		key: 'Aus7MJ7cwStwMJSzpACJbkuIiOhMW4tv8YsyZAghu1P2SgO-wBvADgjqmo6m7jdT',
		imagerySet: 'Aerial'
	})
});

//Setting initial view settings
var view = new ol.View({
	center: ol.proj.transform([-115.031667,36.238],'EPSG:4326', 'EPSG:3857'),
	rotation: 0,
	zoom: 13,
	minZoom: 3
});

//Creating map
var map = new ol.Map({
	controls: ol.control.defaults().extend([]),
	interactions: ol.interaction.defaults().extend([
	new ol.interaction.DragRotateAndZoom()
	]),
	layers: [basemap,centerlocations,bblocations,NVbuildings,maneuverpts,flightlines,buildings3d,trueheadings],
	target: 'map',
	view: view
});
map.addInteraction(selectPointerMove);

//Export Map to JPEG
var exportPNGElement = document.getElementById('export-jpeg');

if ('download' in exportPNGElement) {
  exportPNGElement.addEventListener('click', function(e) {
    map.once('postcompose', function(event) {
      var canvas = event.context.canvas;
      exportPNGElement.href = canvas.toDataURL('image/jpeg');
    });
    map.renderSync();
  }, false);
} else {
  var info = document.getElementById('no-download');
  /**
   * display error message
   */
  info.style.display = '';
}

//Add 3D map visualizer
var ol3d = new olcs.OLCesium({map: map});
var scene = ol3d.getCesiumScene();
var globe = scene.globe;
globe.depthTestAgainstTerrain = true;
var terrain = new Cesium.CesiumTerrainProvider({
	url: '//assets.agi.com/stk-terrain/v1/tilesets/world/tiles'
});
scene.terrainProvider = terrain;
ol3d.setEnabled(false);
// ******* BEGIN CLICK TO POPULATE ENTRY BOXES ******************
  
var mousePositionControl = new ol.control.MousePosition({
  coordinateFormat: ol.coordinate.toStringHDMS,
//      coordinateFormat: ol.coordinate.createStringXY(4),
  projection: 'EPSG:4326',
//    projection: 'EPSG:3857',
  // comment the following two lines to have the mouse position
  // be placed within the map.
  // className: 'custom-mouse-position',
  // target: document.getElementById('mouse-position'),
  // undefinedHTML: '&nbsp;'
});

map.addControl(mousePositionControl);

  
map.on('click', function(evt) {
//  var clickCoord = ol.coordinate.toStringHDMS();
//  window.alert(clickCoord);
    var prettyCoord = ol.coordinate.toStringHDMS(ol.proj.transform(evt.coordinate, 'EPSG:3857', 'EPSG:4326'), 2);
//      var prettyCoord = ol.coordinate.toStringHDMS(evt.coordinate);
//    window.alert(evt.coordinate, '<div><h2>Coordinates</h2><p>' + prettyCoord + '</p></div>');

  
    var parts = prettyCoord.split(/[^\d\w]+/);
//  window.alert(parts);  
  
  var latDegrees = ConvertNegative(parts[0], parts[3]);
//  window.alert("LATDegrees" + " " + latDegrees);
  document.getElementById("latdegrees").value = latDegrees;
//  document.getElementById("latdecmin").value = latDegrees; 
  
    var latDecimal = ConvertDMSToDD(parts[1], parts[2]);
//    window.alert("LATDecimal" + " " + latDecimal);
   document.getElementById("latdecmin").value = latDecimal; 
//   document.getElementById("latdecmin").value = latDecimal; 
  
  var lngDegrees = ConvertNegative(parts[4], parts[7]);
//  window.alert("LNGDegrees" + " " + lngDegrees);
     document.getElementById("longdegrees").value = lngDegrees; 
//     document.getElementById("latdecmin").value = lngDegrees; 

    var lngDecimal = ConvertDMSToDD(parts[5], parts[6]);
//    window.alert("LNGDecimal" + " " + lngDecimal);
     document.getElementById("longdecmin").value = lngDecimal; 
//     document.getElementById("latdecmin").value = lngDecimal; 


});
  
function ConvertNegative(degrees, direction) {
//    window.alert(direction);
    if (direction == "S" || direction == "W") {
        var degreesCorrected = degrees * -1;
      return degreesCorrected;
    } 
//          window.alert("DEGREES" + " " + degrees);
// Don't do anything for N or E
    else {return degrees;}
}
  
  
function ConvertDMSToDD(minutes, seconds) {
var decimal = ((minutes / 60) + (seconds / 3600));
//  window.alert("DECIMAL" + " " + decimal);
    return decimal;
}

  
  // ******* END CLICK TO POPULATE ENTRY BOXES ******************
  
  
  
// ***********************************  
//  
// TO DO:
//  Input IDs on New BombBurst form need to be changed (currently same IDs as New Show Center) 
//  Need to check code on where BB's are being added to ensure they match IDs
//  Code needs cleaned and comments removed
//  Perhaps add a Decimal Display in the upper corner below the current mouseXY display
//  
// ***********************************   
</script>

</body>
</html>