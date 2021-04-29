<?php
header("Content-Type:application/json");

if(!empty($_GET['param']))
{
	$param=$_GET['param'];
	$value = get_value($param);
	
	if(empty($value))
	{
		response(201,"Selection Not Found",NULL);
	}
	else
	{
		response(200,"Selection Found",$value);
	}
	
}
else
{
	response(400,"Invalid Request",NULL);
}

function response($status,$status_message,$data)
{
	header("HTTP/1.1 ".$status);
	
	$response['status']=$status;
	$response['status_message']=$status_message;
	$response['data']=$data;
	
	$json_response = json_encode($response);
	echo $json_response;
}

function get_value($param)
{
	$selections = [
		"Yes"=>1,
		"No"=>0,
		"no"=>0,
		"yes"=>1
	];
	
	foreach($selections as $selection=>$value)
	{
		if($selection==$param)
		{
			return $value;
			break;
		}
	}
}