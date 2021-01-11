<html>
<title>Star Wars</title>
<link href="bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<body>
<div class="wrapper fadeInDown">
  <div id="formContent">
    <!-- Tabs Titles -->

   
<?php if(!empty($_GET['msg'])){
	  echo "<b>".$_GET['msg']."</b>";
  }
  ?>
    <!-- Login Form -->
	<h1>LOGIN</h1>
    <form action="loginuser.php" method="post">
      <input type="text" id="login" class="fadeIn second" required name="email" placeholder="Email">
      <input type="password" id="password" class="fadeIn third" name="password" required placeholder="password">
      <input type="submit" class="fadeIn fourth" value="Log In">
	  <a href="signup.php" class="fadeIn fourth"> Sign Up</a> | <a href="index.php" class="fadeIn fourth"> Vote</a>
    </form>
	
    

  </div>
</div>
</body>
</html>