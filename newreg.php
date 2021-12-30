<?php
session_start();

require_once 'utilities/user.php';

if (isset($_POST['user-name'])) {
    $user_name = $_POST['user-name'];
    $user_pass = $_POST['user-pass'];
    $user_full_name = $_POST['user-full-name'];

    $res = do_register($user_name, $user_pass, $user_full_name);
    if ($res == 'REGISTERED') {
        $user = do_login($user_name, $user_pass);
        if ($user != null) {
            $_SESSION["_user"] = $user;
            header("Location: home.php");
        }
    } else {
        $login_fail_message = "user name already taken";
    }
}
?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="UTF-8">
    <title> Registration Form | Anam Asghar </title>
    <link rel="stylesheet" href="a.css">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
   </head>
<body>
  <div class="container">
  <div class="title">Registration</div>
  <p>Developer | <a  style="color:dodgerblue"> AnamAsghar(2K18/CSM/19) </a> </p>
    <div class="content">
      <form action="newreg.php" method="post">
      
      
      <?php if (isset($login_fail_message)) : ?>
            <div class="error-message"><?= $login_fail_message; ?></div>
        <?php endif; ?>

        <form method="POST" action="<?= $_SERVER['PHP_SELF'] ?>">


      <div class="user-details">
          <div class="input-box">
            <span for="user_name">Username</span>
            <input type="text" name="user-name" placeholder="Enter your username" required>
          </div>
          <div class="input-box">
            <span for="user_pass">Password</span>
            <input type="password" name="user-pass" placeholder="Enter your password" required>
          </div>
          <div class="input-box">
            <span for="user_full_name">Full Name</span>
            <input type="text" name="user-full-name" placeholder="Enter your name" required>
          </div>
          </div>
          
        <div class="button">
          <input type="submit" class="from-control btn btn-primary" value="Register">
</div>
          <div class="button">
					  <input type="button" onclick="myFunction()" value="Go to Login">
					  <script>
						  function myFunction()
						  {
							  location.replace("http://localhost/blog-host/index.php")
						  }
						  </script>         
     
              </div>
              <div class="button">
              <a href="https://github.com/AnamAsghr/WebProgramming_Todo-Assignment/blob/main/todo.php">
        
					  <input type="button" value="Go to Todo Code" ></a> 
        </div>
    </div>
  </div>
</form>
</body>
</html>
