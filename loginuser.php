<?php
require_once("config.php");

		$email = $_POST['email'];
		$password = md5($_POST['password']);
		$user_type = 1;
		
		$search = "select * from `users` where `email` = '$email' and `password` = '$password' and `user_type` = 1";
		$searchresult = mysqli_query($conn,$search)or die("Error in search query");
		if(mysqli_num_rows($searchresult) == 0)
		{
			header('Location: login.php?msg=Login fail.');
		}
		else
		{
			$result = mysqli_fetch_array($searchresult);
			$_SESSION['userid'] = $result['id'];
			$_SESSION['fullname'] = $result['fullname'];
			header('Location: index.php');
		}


?>