<?php
require_once("config.php");
$characterid = $_GET['id'];


if(!empty(get_client_ip()))
{
	if(empty($_SESSION['userid']))
	{
		$fullname = "Guest";
		$email = "";
		$password = "";
		$user_type = 2;
		$mac_address = get_client_ip();
		$search = "select * from `users` where `mac_address` = '$mac_address'";
		$searchresult = mysqli_query($conn,$search)or die("Error in search query");
		if(mysqli_num_rows($searchresult) == 0)
		{
			$insert_query = "insert into `users`(`fullname`, `email`, `password`, `user_type`, `mac_address`) values('$fullname','','','$user_type','$mac_address')";
			mysqli_query($conn,$insert_query)or die("Error in Insert query");
			$recid = mysqli_insert_id($conn);
			$vote_query = "insert into `vote_log`(`userid`, `character_id`) values('$recid','$characterid')";
			mysqli_query($conn,$vote_query)or die("Error in Insert query");
			$msg = "Vote register succesfully";
		}
		else
		{
			$msg = "Your Vote already registered.";
		}
	}
	else
	{
		$userid = $_SESSION['userid'];
		$search = "select * from `vote_log` where `userid` = '$userid'";
		$searchresult = mysqli_query($conn,$search)or die("Error in search query");
		if(mysqli_num_rows($searchresult) == 0)
		{
			$vote_query = "insert into `vote_log`(`userid`, `character_id`) values('$userid','$characterid')";
			mysqli_query($conn,$vote_query)or die("Error in Insert query");
			$msg = "Vote register succesfully";
		}
		else
		{
			$msg = "Your Vote already registered";
		}
	}
header('Location: index.php?msg='.$msg);
}
?>