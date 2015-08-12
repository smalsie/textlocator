/**
*
* Authors Hugh Tupper and Joshua Small
* Version 25/11/2014
* Locate JS file
* Used for all of the locating JS on teh userLocate page
*
*/      
   
/**
*
* Send a locate text to the users phone
*
* Param firstTime : wether this is the first time,
* i.e. there is no previous location data.
*
*/    
function sendText(firstTime) {
    //Send the user id and the keyword Bannanas to ask for a location 
    var formData = {id:userid, keyword: "Bananas"};

    //Show the loading spinner
    $("#loadingOverlay").show();

	$.ajax({
		url : "send_text.php",
		type: "POST",
		data : formData,
		success: function(data, textStatus, jqXHR)
		{
			
			if(firstTime) {
			
				interval = setInterval(function() {
				  getLocation();
				}, 1000 * 5);
			
			} else {
				interval = setInterval(function() {
				  checkNewLocation();
				}, 1000 * 5);
			
			
			} 
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
	        alert("Sorry, something wen't wrong, please try again");
		}
	});       

}
       
       	 
function checkNewLocation() {

	var formData = {id: id, userid: userid}; //Array 

	$.ajax({
		url : "check_new_location.php",
		type: "POST",
		data : formData,
		success: function(data, textStatus, jqXHR)
		{
			if(data != "") {
				clearInterval(interval);
			
				
			
				var arr = data.split(' ');
			
				id = arr[1];
				
				var lat = arr[3];
				var lng = arr[5];
				var accuracy = arr[7];
				
				var arr2 = data.split('time:');
				
				var time = arr2[1];
								
				clearOverlays();
			
				addpoint(lat, lng, accuracy, time);
				
				
				
					$("#loadingOverlay").hide();
					
					
			
			
			}
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
	        alert("Sorry, something wen't wrong, please try again");
		}
	});

}

function getLocation() {

	var formData = {userid: userid}; //Array 
	$.ajax({
		url : "check_new_location.php",
		type: "POST",
		data : formData,
		success: function(data, textStatus, jqXHR)
		{
			if(data != "") {
			clearInterval(interval);
				location.reload();
			}
		},
		error: function (jqXHR, textStatus, errorThrown)
		{
	        alert("Sorry, something wen't wrong, please try again");
		}
	});

}
       
     
       
       
       	
    	
