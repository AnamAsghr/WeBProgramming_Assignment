<?php  
function function_alert($message) {
       
    echo "<script>alert('$message');</script>";
}
function_alert("Wellcome to Anam Asghar Blog Host");
?>
<?php

session_start();

require_once 'utilities/user.php';
require_once 'utilities/post.php';

if (isset($_POST['user-name'])) {
	$user_name = $_POST['user-name'];
	$user_pass = $_POST['user-pass'];

	$user = do_login($user_name, $user_pass);

	if ($user != null) {
		
		$user_id = $user['user_id'];
		$user['user_likes'] = get_user_likes($user_id);
		$user['user_reads'] = get_user_reads($user_id);
		$user['user_comments'] = get_user_comments($user_id);
		$user['user_follows'] = get_user_follows($user_id);
		$user['user_posts'] = sizeof(get_user_posts($user_id));

		
		$_SESSION["_user"] = $user;
		header("Location: home.php");
	}
	$login_fail_message = "Username or password mismatched";
}
?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" />
		<link rel="stylesheet" href="a.css">
		<title>Main</title>
	</head>
	<body>
	<div class="container">
			<h1>Login Form</h1>
			<?php if(isset($login_fail_message)):?>
			<div class="error-message"><?=$login_fail_message;?></div>
			<?php endif;?>

		
			<form method="POST" action="<?=$_SERVER['PHP_SELF']?>">
				<div>
				<div class="user-details">
          <div class="input-box">
            <span for="success" class="control-label">User Name</span>
            <input type="text" name="user-name" class="form-control" required="required" id="success">
          </div>
		  <br>
          <div class="input-box">
            <span for="success" class="control-label">Password</span>
            <input type="password" name="user-pass" class="form-control" required="required" id="success">
          </div>
				
				</div>
				</div>
					<div class="button">
          			<input type="submit" value="Sign In"> 
			</div>
					  <div class="button">
					  <input type="button" onclick="myFunction()" value=" Sign Up">
					  <script>
						  function myFunction()
						  {
							  location.replace("http://localhost/blog-host/newreg.php")
						  }
						  </script>
					  					<form name="form1" action="" method="post">
					
					</from>						
				
				</div>
				
			</form>
		</div>
	</body>
	<style>
body {background-color: #80ffc8;}
</style>

</html>
