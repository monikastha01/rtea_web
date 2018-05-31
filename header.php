<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
	<head>
	   	<title>Home page</title>
	   	<meta name="viewport" content="width=device-width, initial-scale=1">
	   	<link rel="stylesheet" type="text/css" href="<?php echo base_url('application/assets/css/bootstrap.min.css'); ?>" />
	    <link rel="stylesheet" type="text/css" href="<?php echo base_url('application/assets/css/rtea.css'); ?>" />
	   	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
	   	<script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.4/js/bootstrap.min.js"></script>
	   	<script
			src="http://maps.googleapis.com/maps/api/js">
		</script>
	   	<script>
			//var marker = new array();
			var marker1, marker2;
			function initialize()
			{
				var mapProp = {
				  center:new google.maps.LatLng(27.7098131,85.3149265),
				  zoom:17,
				  mapTypeId:google.maps.MapTypeId.ROADMAP
				 };
 				var directionsDisplay = new google.maps.DirectionsRenderer();
    			directionsDisplay.setPanel(document.getElementById("directionsPanel"));

				var map=new google.maps.Map(document.getElementById("googleMap"),mapProp);
				.setMap(map);
				var directionsService = new google.maps.DirectionsService();
			    var start = document.getElementById("start").value;
			    var end = document.getElementById("end").value;
			 
			    var request ={
			        origin:start, 
			        destination:end,
			        travelMode: google.maps.DirectionsTravelMode.DRIVING
			    };
			    directionsService.route(request, function(result, status) {
			        if (status == google.maps.DirectionsStatus.OK){
			            directionsDisplay.setDirections(result);
			        }
			    });

				var marker1=new google.maps.Marker({
				  position:new google.maps.LatLng(27.7098131,85.3149265),
				  animation:google.maps.Animation.BOUNCE
				  });

				var marker2=new google.maps.Marker({
				  position:new google.maps.LatLng(27.7145577,85.3142403),
				  animation:google.maps.Animation.BOUNCE
				  });

				directionsDisplay.marker1.setMap(map), directionsDisplay.marker2.setMap(map);
			}

			google.maps.event.addDomListener(window, 'load', initialize);
		</script>
		<?php echo $map['js']; ?>
	</head>
	<body>
   		<nav class="navbar navbar-inverse">
		  	<div class="container-fluid">
			    <div class="navbar-header">
			      	<a class="navbar-brand" href="<?php echo base_url('home'); ?>">
			      		<img class="img-responsive" alt="Rtea" src="application/assets/images/logo.jpg" alt="Chania" style="width:100%; height:100%">
			      	</a>
			    </div>
			    <ul class="nav navbar-nav navbar-left">
			      	<li class="Menu" id="search" style="margin-left:10px; margin-top:12px;">
  						<?php $search = array('trigger_id'=>'search', 'mobilenumber' => 'search', 'value'=>'',);
                    		echo form_open('home/search', $search);;
                    	?>
                    		<input type="text" size="90" class="form-control" name="triggered_id" placeholder="Search Victim History" />
                    </li>
                    <li style="margin-left:10px; margin-top:19px;">
                        	<button  id="searchbtn" type="submit">
                        		<span class="glyphicon glyphicon-search"> </span>
                        	</button>
                    	</form>
	  				</li>
			    </ul>
			    <ul class="nav navbar-nav navbar-right">
			    	<li>
	  					<a id="logged_in" class="dropdown-toggle" data-toggle="dropdown" href="#">
	  						<span class="glyphicon glyphicon-user"></span>&nbsp;Welcome <?php echo $username; ?> !
	  					</a>
				    </li>
                	<li style="margin-right:20px;" class="dropdown">
			    		<a id="logged_in" class="dropdown-toggle" data-toggle="dropdown" href="#"> &nbsp;Settings
			    			<span class="glyphicon glyphicon-menu-hamburger"></span>
			    		</a>
			    		<ul class="dropdown-menu">
	  						<li>
	  							<a href="<?php echo base_url('home/edituser');?>"><span class="glyphicon glyphicon-edit"></span> &nbsp;Edit Profile</a>
	  						</li>
			      			
				    	  	<li>
				    	  		<a href= "<?php echo base_url('home/add');?>"><span class="glyphicon glyphicon-plus-sign" ></span> &nbsp;Add New User</a>
				    	  	</li>

				    	  	<li>
				    	  		<a href="<?php echo base_url('home/logout');?>"><span class="glyphicon glyphicon-log-out"></span> &nbsp;Logout</a>
				    	  	</li>
				        </ul>
			      	</li>
			    </ul>
		 	</div>
		</nav>
