<?php   

	include('session.php');
	ini_set("allow_url_fopen", 1);

	$myusername = $login_session;
	$error = "";


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

							<h1><b>Congrats on your booking!</h1><br>
							
							<b>Your credit card will be charged to your credit card on file.</b><br><br>
							<b>Your booking packet and details will be emailed to your email on file.</b><br><br>
							<h1>Enjoy your trip!</h1><br><br>
							
							<b><a href=welcome.php><u>Return to booking page.</u></a>
		                													
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