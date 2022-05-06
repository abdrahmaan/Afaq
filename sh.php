<?php 

header("Access-Control-Allow-Origin: *");


$con = mysqli_connect("localhost","root","","threepoint");

if($_SERVER["REQUEST_METHOD"] == "POST"){


   if(isset($_POST["datee"])){
    $date = $_POST["datee"];
   
$q = "SELECT * FROM tbl_book WHERE datee = '$date'";
$res = mysqli_query($con,$q);
if(mysqli_num_rows($res) > 0){
echo "yes";
}
}
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
        <input type="date" name="datee">
        <input type="submit">
    </form>
</body>
</html>
