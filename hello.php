<?php

		$con = mysqli_connect("localhost","root","","threepoint");




		if($_SERVER["REQUEST_METHOD"] == "POST"){


				if(isset($_POST['sendtwo'])){

					$hall = $_POST["hall"];
					$start = $_POST["start_time"];
					$end = $_POST["end_time"];

					echo "You Need Start ";
					echo "";



					$qMax = "SELECT max(ed) AS max FROM tbl_book WHERE hall = '$hall'";
					$resMax = mysqli_query($con,$qMax);
					$row = mysqli_fetch_assoc($resMax);

					$maxTime = $row["max"];


					$qSameTime = "SELECT * FROM tbl_book WHERE hall = '$hall' AND st = '$st'";
					$resSameTime = mysqli_query($con,$qSameTime);

					if(mysqli_num_rows($resSameTime) > 0){

						echo "There Are Some One Booking At 'Same' Your Start Time" . "<br>";

						$row = mysqli_fetch_assoc($resSameTime);
							echo "His Start Time : " . $row['st'] . "<br>";
							echo "His Finished Time : " . $row['ed'] . "<br>";
							echo "Hall We Be Free In : " . $maxTime . "<br>";

					} else {

						$qBackTime = "SELECT * FROM tbl_book WHERE hall = '$hall' AND st < '$st' AND ed > '$st'";
						$resBackTime = mysqli_query($con,$qBackTime);
						if(mysqli_num_rows($resBackTime) > 0){

							echo "There Are Some One Bookine 'Back' Your Start Time And Finish After It" . "<br>";

							$row = mysqli_fetch_assoc($resBackTime);
							echo "His Start Time : " . $row['st'] . "<br>";
							echo "His Finished Time : " . $row['ed'] . "<br>";
							echo "Hall We Be Free In : " . $maxTime . "<br>";
						} else {
							$qNextTime = "SELECT * FROM tbl_book WHERE hall = '$hall' AND st > '$st' AND st < '$ed'";
							$resNextTime = mysqli_query($con,$qNextTime);

							if(mysqli_num_rows($resNextTime) > 0){

								echo "There Are Some One Bookine 'After' Your Start Time And In Your Arie Time" . "<br>";
								$row = mysqli_fetch_assoc($resNextTime);
								echo "His Start Time : " . $row['st'] . "<br>";
								echo "His Finished Time : " . $row['ed'] . "<br>";
								echo "Hall We Be Free In : " . $maxTime . "<br>";

							} else {
								echo "You Can Booking This Hall";
							}
						}

					}


				}
		}

?>