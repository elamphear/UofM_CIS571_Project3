<?php   
   
	session_start();
   
	$error = "\t";  
      
   if($_SERVER["REQUEST_METHOD"] == "POST") 
   {

    $myusername = $_POST['username'];
	
	
	$url = "http://localhost/myvacation/$service.php?param=$myservice";
	$results = @file_get_contents($url);
	$resultsObj = json_decode($results,true);
	
	$status = $resultsObj['status'];

	if($status == "200")
	{
		$newprice = $resultsObj['data'];
			
		$_SESSION['login_user'] = $myusername;
			
	}
	else
	{
		$error = "Invalid user entered!";
	}

	if(preg_match('/[a-m]/i', substr($myusername, 0, 1)))	
		header("location: welcome.php");
	elseif(preg_match('/[n-z]/i', substr($myusername, 0, 1)))
		header("location: welcome.php");	
	else
		$error = "Invalid name entered."; 	

   }
?>
<html>

	<head>
	
    	<title>myVacation Info</title>

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
        
		    <div style = "background-color:#333333; color:#FFFFFF; padding:3px;" align="center"><b>myVacation Info</b></div>
				
	            <div style = "margin:30px">
               
	               	<form action = "" method = "post">
	               
	               		<div class="auto-style1">
						
						
						   	<label>Enter Your Name  : </label><input type = "text" name = "username" class = "box"/><br /><br />
		                			                	
		                	<input type = "submit" value = " Enter "/><br />
		                													
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