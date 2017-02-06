<?php
session_start();
require_once 'class/user.php';

$reg_user = new USER();

if($reg_user->is_logged_in()!="")
{
	$reg_user->redirect('index.php');
}


if(isset($_POST['btn-signup'])){
    
	$uname = $reg_user->security_input($_POST['name']);
	$email = $reg_user->security_input($_POST['email']);
	$pass = $reg_user->security_input($_POST['pass']);
        if($uname == "" || $email == "" || $pass == ""){
	    $msg ='<div class="alert-message error">
  <div class="box-icon"></div>
  <strong>Sorry !</strong>  Please enter all information
  <a href="#" class="close">&times;</a>
</div>';
}  else {
    $code = md5(uniqid(rand()));
	
	$stmtEmail = $reg_user->runQuery("SELECT * FROM tbl_users WHERE user_email=:email");
	$stmtEmail->execute(array(":email"=>$email));
	$rowEmail = $stmtEmail->fetch(PDO::FETCH_ASSOC);

        $stmtName = $reg_user->runQuery("SELECT * FROM tbl_users WHERE user_name=:username");
	$stmtName->execute(array(":username"=>$uname));
	$rowName = $stmtName->fetch(PDO::FETCH_ASSOC);
	
	if($stmtEmail->rowCount() > 0)
	{
            $msg ='<div class="alert-message error">
  <div class="box-icon"></div>
  <strong>Sorry !</strong>  email allready exists , Please Try another one
  <a href="#" class="close">&times;</a>
</div>';

	}elseif ($stmtName->rowCount() > 0) {
            $msg ='<div class="alert-message error">
  <div class="box-icon"></div>
  <strong>Sorry !</strong>  Username allready exists , Please Try another one
  <a href="#" class="close">&times;</a>
</div>';
            }else{
            
            
		if($reg_user->register($uname,$email,$pass,$code))
		{			
			$id = $reg_user->lasdID();		
			$key = base64_encode($id);
			$id = $key;
			
			$message = "					
						Hello $uname,
						<br /><br />
						Welcome to Coding Cage!<br/>
						To complete your registration  please , just click following link<br/>
						<br /><br />
						<a href='http://".$_SERVER['HTTP_HOST'].dirname($_SERVER['REQUEST_URI'])."/verify.php?id=$id&code=$code'>Click HERE to Activate :)</a>
						<br /><br />
						Thanks,";
						
			$subject = "Confirm Registration";
						
			$reg_user->send_mail($email,$message,$subject);	
			$msg = '          <div class="alert-message success">
            <div class="box-icon"></div>
           <strong>Success!</strong>  We`ve sent an email to . <strong>'.$email.'</strong>
                    Please click on the confirmation link in the email to create your account.
                    <a href="#" class="close">&times;</a>
          </div>
					';

		}
		else
		{
			echo "sorry , Query could no execute...";
		}		
	}
}

   }
?>
<!DOCTYPE html>
<html>
    <head>
        <title>
                Sign up
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
<style>
.inner-container {
    width: 400px;
    height: 470px;
    position: absolute;
    top: calc(50vh - 200px);
    left: calc(50vw - 200px);
    overflow: hidden;
}
</style>
<?php echo @$msg; ?>
            <div class="box">
                <form method="post" >
                    <h1>Sign up</h1>
                    <input value="<?php echo @$email; ?>" name="email" type="email" placeholder="Email"/>
                    <input value="<?php echo @$uname; ?>" name="name" type="text" placeholder="Username"/>
                    <input name="pass" type="password" placeholder="Password"/>
                    <button name="btn-signup" type="submit">Sign up</button>
                    <p>Are you a member? <a href="signin.php" ><span>Sign in</span></a></p>
                </form>
            </div>                  <?php include 'includes/footer.php' ?>

          </div>
        </div>
        <script src="script.js"></script>
    </body>
</html>