<?php include 'include/signed-in-check.php'; ?>
<!--Navbar Section-->
<?php include 'include/top-header.php';?>
<title>LocateMe</title>
<style type="text/css">
  html { height: 100% }
  body { height: 100%; margin: 0; padding: 0 }
  #map-canvas { height: 75%; margin-bottom:80px; }
</style>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>
    <script type="text/javascript"
      src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDuJ2A07anIoosTEzGodAovRuZWt8OpMjI">
    </script>
<script src="js/locate.js"></script>
<?php include 'include/header.php';?>
<!--Header Section-->

<?php

	$userid = $_COOKIE['User'];
	
	include 'include/connection.php';
	
	$firstTime = false;

	$query = mysqli_query($connection, "Select * from `location` where `userid` = '$userid' ORDER BY `id` DESC");
	
	if(mysqli_num_rows($query) == 0) {
	
		$lat = 0;
		$lng = 0;
		$id = 0;
		$accuracy = 0;
		$time = "";
		
		$locate = true;
		
		
		include 'locateOverlay.php';
		
		die;
		
		
	} else {
		
		$row = mysqli_fetch_array($query);
	
		$id = $row['id'];
	
		$lat = $row['lat'];
		$lng = $row['lng'];
		$accuracy = $row['accuracy'];
		$time = date("l jS F Y", strtotime ($row['time'])) . " at ". date("G:i", strtotime ($row['time']));
	
	}

?>

<div id="header-link" class="anchor-move">
<div class="header-background">
	<div class="container">
		<div class="row">
			<div id="userHome-info" class="col-md-7">
				
				<h1>Locate your phone! </h1> 
			</div>
			
		</div>
		
		 <div id="map-canvas"/>
		
		<div class="bottom-space"></div>
		
</div>
	</div>
	</div>
</div>

<?php include 'locateOverlay.php'; ?>


<script>

$("#loadingOverlay").hide();

var markersArray = [];
  


var address;
var contentString;

var map; 

var lat = <?php echo $lat; ?>;
var lng = <?php echo $lng; ?>;

var userid = <?php echo $userid; ?>;
var id = <?php echo $id; ?>;
var accuracy = <?php echo $accuracy;?>;
var time = '<?php echo $time; ?>';      
                  
var mapOptions = {

zoom: 14,
center: new google.maps.LatLng(lat, lng)

};

map = new google.maps.Map(document.getElementById('map-canvas'), mapOptions);    
             
            
addpoint(lat, lng, accuracy, time);




function addpoint(lat, lng, accuracy, time) {

	$.ajax({
	  url: "https://maps.googleapis.com/maps/api/geocode/json?latlng="+lat+","+lng+"&sensor=true",
	  type: "POST",
	  success: function(res){
		    
		    address = res.results[0].formatted_address;
		    
		    $('#add').text("At: " + address);
		    
		    contentString = '<div id="content">'+
		      '<div id="siteNotice"></div>'+
		      '<h4 id="firstHeading" class="firstHeading">Your Phone</h4>'+
		      '<div id="bodyContent">'+
		      '<p>Your phone was found on <br><b>' + time + '</b>' +
		      '<br><b>'+address+ '</br>' +
		      '</b>To an accuracy of ' + accuracy + ' metres</p>'+
		      '<button type="button" onclick="sendText(false);" style="width:96%;" class="btn btn-primary">Relocate Phone</button>'+
		      '</div>'+
		      '</div>';
		      
		      var infowindow = new google.maps.InfoWindow({
		
		            content: contentString
		            
		        });
		        
		        var myLatlng = new google.maps.LatLng(lat,lng);
		                
			/* To add the marker to the map, use the 'map' property*/
			var marker = new google.maps.Marker({
				position: myLatlng,
				map: map,
				title:"Your Phone!"
			});

			infowindow.open(map,marker);

			google.maps.event.addListener(marker, 'click', function() {

					infowindow.open(map,marker);
			 
			  });

			markersArray.push(marker);
		        
		        
		              
		    
	  			}		
		        
		  });
		  
		  


}

       
function clearOverlays() {
  for (var i = 0; i < markersArray.length; i++ ) {
	markersArray[i].setMap(null);
  }
  markersArray.length = 0;
}
  

    </script>

<!--Footer Section-->
<?php include 'include/footer.php';?>
