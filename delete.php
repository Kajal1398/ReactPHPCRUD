<?php
	require 'connect.php';
    
header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');


	$postdata=file_get_contents("php://input");
	if (isset($postdata) && !empty($postdata)){
		$request=json_decode($postdata);
		//$first_name=$request->first_name;
		//$last_name=$request->last_name;
		$email=$request->email;
		$sql="DELETE FROM students WHERE email='{$email}'";
		//$sql="INSERT INTO sign values('{$fname}','{$lname}','{$email}')";
		//$sql="INSERT INTO sign values('Arana','Maha','shradha@gmail.com')";
		if (mysqli_query($con,$sql))
		{
            echo("success");
            http_response_code(201);
            
		}
		else{
			http_response_code(422);
		}

	}
	
?>
