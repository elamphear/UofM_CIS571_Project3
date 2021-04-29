<?php   

	include('session.php');   
	ini_set("allow_url_fopen", 1);

    $mydestination = "";
	$mydepature = "";
    $myleavedate = ""; 
    $myreturndate = ""; 
    $myairline = ""; 
    $myseattype = ""; 
    $myrentalcar = ""; 
    $myhotel = ""; 
    $mymeal = ""; 
	
	$myusername = $login_session;
	$error = "";  
	$price = 0;
	$newprice = 0;
   
   if($_SERVER["REQUEST_METHOD"] == "POST") 
   {

    $mydestination = $_POST['destination']; 
	$mydeparture = $_POST['departure']; 
    $myleavedate = $_POST['leavedate']; 
    $myreturndate = $_POST['returndate']; 
    $myairline = $_POST['airline']; 
    $myseattype = $_POST['seattype']; 
    $myrentalcar = $_POST['rentalcar']; 
    $myhotel = $_POST['hotel']; 
    $mymeal = $_POST['meal']; 

	$myservice = "";
	$url = "";

	foreach (array('destination','departure','leavedate','returndate','airline','seattype','rentalcar','hotel','meal') as &$service)
	{
		$myservice = "$"."my".$service;
		eval("\$myservice = \"$myservice\";");
		//echo $service;
		//echo $myservice;
								
		$url = "http://localhost/myvacation/$service.php?param=$myservice";
		$results = @file_get_contents($url);
		$resultsObj = json_decode($results,true);
	
		$status = $resultsObj['status'];

		if($status == "200")
		{
			$newprice = $resultsObj['data'];
			
			//echo $newprice;
			
			$price += $newprice;
			
			$_SESSION['price'] = $price;
			$_SESSION[$service] = $myservice;
			
		}
		else
		{
			$error = "Invalid $service entered!";
		}

		//echo $price;
	}	

	//echo $price;
	echo $error;

	if ($error == "")
		header("location: confirmation.php");	

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
												
						   	<label>Enter Destination  : </label><input type = "text" name = "destination" class = "box"/><br />
							<i>Select from Detroit, Paris, London</i><br><br>
							
						   	<label>Departure From  : </label><input type = "text" name = "departure" class = "box"/><br />
							<i>Select from Detroit, Flint, Oakland</i><br><br>
														
						   	<label>Leave Date  : </label><input type = "text" name = "leavedate" class = "box"/><br />
							<i>Select from Monday - Sunday</i><br><br>

						   	<label>Return Date  : </label><input type = "text" name = "returndate" class = "box"/><br />
							<i>Select from Monday - Sunday</i><br><br>

						   	<label>Airline  : </label><input type = "text" name = "airline" class = "box"/><br />		
							<i>Select from Delta, Spirit, United</i><br><br>
							
						   	<label>Seat Type  : </label><input type = "text" name = "seattype" class = "box"/><br />
							<i>Select from FirstClass, Coach, Business</i><br><br>
							
						   	<label>Rental Car Choice  : </label><input type = "text" name = "rentalcar" class = "box"/><br />
							<i>Select from None, Midsize, Luxury</i><br><br>

						   	<label>Hotel Choice : </label><input type = "text" name = "hotel" class = "box"/><br />						
							<i>Select from None, Economy, Midrange, Luxury</i><br><br>

						   	<label>Meal Plan Choice : </label><input type = "text" name = "meal" class = "box"/><br />
							<i>Select from None, Breakfast, Lunch, Dinner, All</i><br><br>

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