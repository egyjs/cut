<?php
require_once 'class/user.php';
$user = new USER();

if(empty($_GET['id']) && empty($_GET['code']))
{
	$user->redirect('signin.php');
}

if(isset($_GET['id']) && isset($_GET['code']))
{
	$id = base64_decode($_GET['id']);
	$code = $_GET['code'];
	
	$statusY = "Y";
	$statusN = "N";
	
	$stmt = $user->runQuery("SELECT user_id,user_status FROM tbl_users WHERE user_id=:uID AND token_code=:code LIMIT 1");
	$stmt->execute(array(":uID"=>$id,":code"=>$code));
	$row=$stmt->fetch(PDO::FETCH_ASSOC);
	if($stmt->rowCount() > 0)
	{
		if($row['user_status'] == $statusN)
		{
			$stmt = $user->runQuery("UPDATE tbl_users SET user_status=:status WHERE user_id=:uID");
			$stmt->bindparam(":status",$statusY);
			$stmt->bindparam(":uID",$id);
			$stmt->execute();	
                        
			
			$msg = '          <div class="alert-message success">
            <div class="box-icon"></div>
            <strong>WoW !</strong>  Your Account is Now Activated  : <a href="signin.php">Login here</a>
            <a href="#" class="close">&times;</a>
          </div>';
                        header("refresh:2;signin.php");
		}
		else
		{
			$msg = '    
                            <div class="alert-message info">
            <div class="box-icon"></div>
            <strong>sorry !</strong>  Your Account is allready Activated : <a href="signin.php">Login here</a>
            <a href="#" class="close">&times;</a>
          </div>';
                         header("refresh:2;signin.php");
		}
	}
	else
	{
		$msg = '
          <div class="alert-message warning">
            <div class="box-icon"></div>
            <strong>sorry !</strong>  No Account Found : <a href="signup.php">Signup here</a>
                <a href="#" class="close">&times;</a>
          </div>';

	}	
}

?>

<!DOCTYPE html>
<html>
    <head>
        <title>
                verify
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

                <?php if(isset($msg)) { echo $msg; } ?>
          </div>
        </div>
    </body>
</html>