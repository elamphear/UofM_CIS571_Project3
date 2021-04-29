<?php
header("Content-Type:application/json");

if(!empty($_GET['param']))
{
	$param=$_GET['param'];
	$user = get_user($param);
	
	if(empty($user))
	{
		response($param,201,"User Not Found",NULL);
	}
	else
	{
		response($param,200,"User Found",$user);
	}
	
}
else
{
	response(400,"Invalid Request",NULL);
}

function response($param,$status,$status_message,$data)
{
	header("HTTP/1.1 ".$status);

	date_default_timezone_set('America/Detroit');
	
	if(preg_match('/[a-m]/i', substr($param, 0, 1)))	
	{
		$response['status']=$status;
		$response['status_message']=$status_message;
		$response['data']=$data;
		$response['dttm']=date('l jS \of F Y h:i:s A');
	
		$json_response = json_encode($response);
		echo $json_response;
	}
	
	elseif(preg_match('/[n-z]/i', substr($param, 0, 1)))
	{

		$dttm=date('l jS \of F Y h:i:s A');
		$response = array ("status"=>$status, "status_message"=>$status_message, "data"=>$data, "dttm"=>$dttm);
		$xml_response = xmlrpc_encode($response);
		echo $xml_response;	
	}
}

function get_user($param)
{
	$selections = [
		"Eric Lamphear"=>"valid",
		"Luke Skywalker"=>"valid",
		"Leia Organa"=>"valid",
		"Obiwan Kenobi"=>"valid",
		"Mace Windu"=>"valid",
		"Sabine Wren"=>"valid"
	];
	
	foreach($selections as $selection=>$user)
	{
		if($selection==$param)
		{
			return $user;
			break;
		}
	}
}