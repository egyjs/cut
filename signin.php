<?php
session_start();
require_once 'class/user.php';
$user_login = new USER();

if($user_login->is_logged_in()!="")
{
	$user_login->redirect('index.php');
}

if(isset($_POST['btn-login']))
{
	$uname= $user_login->security_input($_POST['user']);
	$upass = $user_login->security_input($_POST['pass']);
	
	if($user_login->login($uname,$upass))
	{
		$user_login->redirect('index.php');
	}
}
?>

<!DOCTYPE html>
<html>
    <head>
        <title>
                Sign In
        </title>
        <link href="style.css" rel="stylesheet" type="text/css"/>
        <link href="signup.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" type="text/css" href="rtl.css"/>
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        <link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
    </head>
    <body>
        <?php include 'includes/nav.php';?>
        <div class="vid-container">

          <div class="inner-container">
                <?php 
  if(isset($_GET['inactive']))
  { ?>
<div class="alert-message error">
  <div class="box-icon"></div>
   <strong>Sorry!</strong> This Account is not Activated Go to your Inbox and Activate it. 
  <a href="#" class="close">&times;</a>
</div>
<?php } if(isset($_GET['error'])){ ?>
<div class="alert-message warning">
<div class="box-icon"></div>
 <strong>Wrong Details!</strong> 
    <a href="#" class="close">&times;</a>
</div>
<?php } ?>
            <div class="box">
                <form method="post"  action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                    <h1>Sign in</h1>
                    <input name="user" type="text" placeholder="Username"/>
                    <input name="pass" type="password" placeholder="Password"/>
                    <button type="submit" name="btn-login" >Login</button>
                    <p>Not a member? <a href="signup.php"><span>Sign Up</span></a></p>
                </form>
            </div>
          </div>
        </div>
    </body>
</html>