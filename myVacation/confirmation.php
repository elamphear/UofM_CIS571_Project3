<?php   

	include('session.php');
	ini_set("allow_url_fopen", 1);

	$myusername = $login_session;
	$error = "";

	$myconfirmation  = "";
	$booked = "";
   
   if($_SERVER["REQUEST_METHOD"] == "POST") 
   {
	    $myconfirmation = $_POST['confirmation']; 
		
		$url = "http://localhost/myvacation/booking.php?param=$myconfirmation";
		$results = file_get_contents($url);
		$resultsObj = json_decode($results,true);
	
		$status = $resultsObj['status'];

		echo $status;

		if($status == "200")
		{
			$booked = $resultsObj['data'];
									
			if ($booked == 1)
				header("location: booked.php");	

			elseif ($booked == 0)
				header("location: welcome.php");	

			else
				$error = "Invalid entry";	

		}
		else
		{
			$error = "Invalid entry!";
		}
   }   
?>
<html>

	<head>
	
    	<title>myVacation</title>

		<style type = "text/css">
        	body 
         	{
            	font-family:Arial, Helvetica, sans-serif;
            	font-size:14px;
         	}
         
         	label 
         	{
            	font-weight:bold;
            	width:100px;
            	font-size:14px;
         	}
         
         	.box 
         	{
            	border:#666666 solid 1px;
         	}

      		.auto-style1 
      		{
		  	text-align: center;
	  		}
	  	
	  		a { color: inherit; }
			a:link { text-decoration: none;}
			
      </style>
      
   </head>
   
   <body bgcolor = "#B2B1B1">
	
      <div align = "center">
 
		<img alt="myVacation" src="header.jpg" width="600px" height="240px">
		
		<br>

        <div style = "width:600px; border: solid 1px #333333; " align = "left">
        
		    <div style = "background-color:#333333; color:#FFFFFF; padding:3px;" align="center"><b>myVacation</b></div>
				
	            <div style = "margin:30px">
               
	               	<form action = "" method = "post">
	               
	               		<div class="auto-style1">
						
							<b>Welcome <?php echo $myusername; ?>! </b><br><?php echo $dttm; ?><br><br>

							<b>Please confirm your booking : <br><br>

							Destination : <?php echo $final_destination; ?><br>
							Departure From : <?php echo $final_departure; ?><br>
							Leave Day : <?php echo $final_leavedate; ?><br>
							Return Day : <?php echo $final_returndate; ?><br>
							Airline Choice : <?php echo $final_airline; ?><br>
							Airline Seating : <?php echo $final_seattype; ?><br>
							Rental Car Choice : <?php echo $final_rentalcar; ?><br>
							Hotel Choice : <?php echo $final_hotel; ?><br>
							Meal Plan Choice : <?php echo $final_meal; ?><br><br>

							Total Price: $<?php echo $overall_price; ?><br><br>
														
												
						   	<label>Enter Confirmation  : </label><input type = "text" name = "confirmation" class = "box"/><br />
							<i>Select from Yes or No</i><br><br>

		                	<input type = "submit" value = " Submit "/><br />
		                													
	               		</div>
               
					</form>
               
            		<div style = "font-size:11px; color:#cc0000; margin-top:10px">
            		
            			<?php echo $error; ?>
            	
            		</div>
					
				</div>
				
			</div>
			
		</div>

	</body>

</html>