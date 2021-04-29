<?php
header("Content-Type:application/json");

if(!empty($_GET['param']))
{
	$param=$_GET['param'];
	$price = get_price($param);
	
	if(empty($price))
	{
		response(201,"Selection Not Found",NULL);
	}
	else
	{
		response(200,"Selection Found",$price);
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

function get_price($param)
{
	$selections = [
		"Detroit"=>200,
		"Paris"=>1000,
		"London"=>500
	];
	
	foreach($selections as $selection=>$price)
	{
		if($selection==$param)
		{
			return $price;
			break;
		}
	}
}