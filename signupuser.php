<?php
require_once("config.php");
if(get_client_ip() !='UNKNOWN')
{
	if(empty($_SESSION))
	{
		$fullname = $_POST['fullname'];
		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$user_type = 1;
		$mac_address = get_client_ip();
		
		 $search = "select * from `users` where `mac_address` = '$mac_address'";
		
		$searchresult = mysqli_query($conn,$search)or die("Error in search query");
		$result = mysqli_fetch_array($searchresult);
		if(mysqli_num_rows($searchresult) == 0)
		{
			$insert_query = "insert into `users`(`fullname`, `email`, `password`, `user_type`, `mac_address`) values('$fullname','$email','$password','$user_type','$mac_address')";
			mysqli_query($conn,$insert_query)or die("Error in Insert query");
			$msg = "Signup succesfully done";
		}
		else if($result['user_type'] == 2)
		{
			$update_query = "update `users` set `fullname`='$fullname',`email`='$email',`password`='$password',`user_type`='$user_type' where `mac_address`='$mac_address'";
			mysqli_query($conn,$update_query)or die("Error in Insert query");
			$msg = "Signup succesfully done";
		}
		else
		{
			$msg = "You are already registered.";	
		}
	}
header('Location: signup.php?msg='.$msg);
}
?>