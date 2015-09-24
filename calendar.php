<?php
require_once 'core/init.php';
$user2=new user();
if(!$user2->isLoggedIn()){
	Redirect::to('login.php');
}

header("Cache-Control: no-store, no-cache, must-revalidate, max-age=0");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma: no-cache");

include('php/connect.php'); 
include('classes/class_calendar.php');

$calendar = new booking_diary($link);

if(isset($_GET['month'])) $month = $_GET['month']; else $month = date("m");
if(isset($_GET['year'])) $year = $_GET['year']; else $year = date("Y");
if(isset($_GET['day'])) $day = $_GET['day']; else $day = 0;


// Unix Timestamp of the date a user has clicked on
$selected_date = mktime(0, 0, 0, $month, 01, $year); 

// Unix Timestamp of the previous month which is used to give the back arrow the correct month and year 
$back = strtotime("-1 month", $selected_date); 

// Unix Timestamp of the next month which is used to give the forward arrow the correct month and year 
$forward = strtotime("+1 month", $selected_date);

?>


<?php
	include 'includes/header.php';
?>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<title>Calendar</title>
<link href="style.css" rel="stylesheet" type="text/css">

<link href="http://fonts.googleapis.com/css?family=Droid+Serif" rel="stylesheet" type="text/css">
<link href="http://fonts.googleapis.com/css?family=Droid+Sans" rel="stylesheet" type="text/css">
<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script>

<script type="text/javascript">

var check_array = [];

$(document).ready(function(){

	$(".fields").click(function(){
	
		dataval = $(this).data('val');
	
		// Show the Selected Slots box if someone selects a slot
		if($("#outer_basket").css("display") == 'none') { 
			$("#outer_basket").css("display", "block");
		}

		if(jQuery.inArray(dataval, check_array) == -1) {
			check_array.push(dataval);
		} else {
			// Remove clicked value from the array
			check_array.splice($.inArray(dataval, check_array) ,1);	
		}
		
		slots=''; hidden=''; basket = 0;
		
		cost_per_slot = $("#cost_per_slot").val();
		//cost_per_slot = parseFloat(cost_per_slot).toFixed(2)

		for (i=0; i< check_array.length; i++) {
			slots += check_array[i] + '\r\n';
			hidden += check_array[i].substring(0, 8) + '|';
			basket = (basket + parseFloat(cost_per_slot));
		}
		
		// Populate the Selected Slots section
		$("#selected_slots").html(slots);
		
		// Update hidden slots_booked form element with booked slots
		$("#slots_booked").val(hidden);		

		// Update basket total box
		basket = basket.toFixed(2);
		$("#total").html(basket);	

		// Hide the basket section if a user un-checks all the slots
		if(check_array.length == 0)
		$("#outer_basket").css("display", "none");
		
	});
	
	
	$(".classname").click(function(){
	
		msg = '';
	
		if($("#car make").val() == '')
		msg += 'Please enter a car make\r\n';

		if($("#car model").val() == '')
		msg += 'Please enter an car model\r\n';

		if($("#service").val() == '')
		msg += 'Please enter a service\r\n';	

		if(msg != '') {
			alert(msg);
			return false;
		}

	});

	// Firefox caches the checkbox state.  This resets all checkboxes on each page load 
	$('input:checkbox').removeAttr('checked');
	
});




</script>

</head>
<body>
<div class="box3 v2">
			<div class="container">
						<h2>Appointment scheduale</h2>
			<?php     
			        
			if($_SERVER['REQUEST_METHOD'] == 'POST') {
			    $calendar->after_post($month, $day, $year);  
			}   

			// Call calendar function
			$calendar->make_calendar($selected_date, $back, $forward, $day, $month, $year);
			?>


</div>
</div>
<?php
	include 'includes/footer.php';
?>


