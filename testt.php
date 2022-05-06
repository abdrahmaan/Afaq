<?php 

header("Access-Control-Allow-Origin: *");


$con = mysqli_connect("localhost","root","","threepoint");


if($_SERVER["REQUEST_METHOD"] == "POST"){



$row = json_decode(file_get_contents('php://input'));

$hall = $row->hall;
$st = $row->st;
$ed = $row->ed;

$status = 1;
$data = array("hall"=>$hall,
				"Start_time"=>$st,
				"End_time"=>$ed);

$response = array("status"=>$status,
					"data"=>$data);


echo json_encode($response);

}			
		






?>