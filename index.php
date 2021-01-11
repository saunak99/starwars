<?php include("config.php");?>
<!DOCTYPE html>
<html lang="en">
<head>
  <title>Starwars Voting</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
 <style>
#myInput {
  background-image: url('/css/searchicon.png');
  background-position: 10px 12px;
  background-repeat: no-repeat;
  width: 100%;
  font-size: 16px;
  padding: 12px 20px 12px 40px;
  border: 1px solid #ddd;
  margin-bottom: 12px;
}
#myUL {
  list-style-type: none;
  padding: 0;
  margin: 0;
}

#myUL li a {
  border: 1px solid #ddd;
  margin-top: -1px; /* Prevent double borders */
  background-color: #f6f6f6;
  padding: 12px;
  text-decoration: none;
  font-size: 18px;
  color: black;
  display: block
}

#myUL li a:hover:not(.header) {
  background-color: #eee;
}
</style> 
</head>
<body>

<div class="container">
  <h2>Star Wars Characters List</h2>
  <?php if(!empty($_GET['msg'])){
	  echo "<b>".$_GET['msg']."</b>";
  }
  if(!empty($_SESSION['fullname']))
  {
	  echo "<span style='float:right'><b>Welcome</b> ".$_SESSION['fullname']." | <a href='logout.php'>Sign Out</a></span>";
	  
  }
  else
  {
	  echo "<span style='float:right'><a href='login.php'>SignIn</a></span>";
  }
  ?>


 <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

  <ul id="myUL">
  <?php
	$result = mysqli_query($conn,"select * from `characters_master`")or die("Error in select category query");
	while($rows = mysqli_fetch_array($result))
	{
  ?>
    <li><a href="postvoting.php?id=<?php echo $rows['id'];?>" class="list-group-item active"><?php echo $rows['character_name'];?></a></li>
	<?php
	}
	?>
 </ul>
</div>
<script>
function myFunction() {
    var input, filter, ul, li, a, i, txtValue;
    input = document.getElementById("myInput");
    filter = input.value.toUpperCase();
    ul = document.getElementById("myUL");
    li = ul.getElementsByTagName("li");
    for (i = 0; i < li.length; i++) {
        a = li[i].getElementsByTagName("a")[0];
        txtValue = a.textContent || a.innerText;
        if (txtValue.toUpperCase().indexOf(filter) > -1) {
            li[i].style.display = "";
        } else {
            li[i].style.display = "none";
        }
    }
}
</script>
</body>
</html>
