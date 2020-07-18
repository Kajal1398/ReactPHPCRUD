<?php
require 'connect.php';

/*$sql="INSERT INTO students VALUES ('kajal','kkankariya','kkkkk@gmail.com')";
        if(mysqli_query($con,$sql))
        {
            echo("   success");
        }
        else
        {
            echo("fail");
        }
*/

header('Access-Control-Allow-Origin: *');
header('Access-Control-Allow-Methods: GET, POST, PATCH, PUT, DELETE, OPTIONS');
header('Access-Control-Allow-Headers: Origin, Content-Type, X-Auth-Token');

$postdata=file_get_contents("php://input");


if(isset($postdata) && !empty($postdata))
{
    $request=json_decode($postdata);

    
    $first_name=$request->first_name;
    $last_name=$request->last_name;
    $email=$request->email;

    $sql="INSERT INTO students VALUES
        ('{$first_name}',
        '{$last_name}',
        '{$email}')";
        if(mysqli_query($con,$sql))
        {
            http_response_code(201);
            
        }
        else{
            http_response_code(422);
        }
}







