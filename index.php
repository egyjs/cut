<?php
session_start();
include_once("class/url.php");
include_once("class/user.php");




$urlClass = new URL();
$user = new USER();


$urlInput = @$urlClass->security_input($_POST['urlInput']);
$urlInput = $urlClass->addhttp($urlInput);
$urlClass->checkurl($urlInput);

if (isset($_GET['f'])) {

$stmt = $urlClass->runQuery("SELECT * FROM tbl_url WHERE url_code=:urlCode");
$stmt->execute(array(":urlCode"=>$_GET['f']));
$row = $stmt->fetch(PDO::FETCH_ASSOC);

}


if ($user->is_logged_in()!="") {
$Ustmt = $user->runQuery("SELECT * FROM tbl_users WHERE user_id=:uid");
$Ustmt->execute(array(":uid"=>$_SESSION['userSession']));
$Urow = $Ustmt->fetch(PDO::FETCH_ASSOC);
$u = "1";
}
// if (isset($u)) {echo $Urow['user_name'];}
?>


<!DOCTYPE html>
<?php if(!isset($_GET['f'])){ ?>
<?php include 'home.php'; ?>
<?php }
else{ 
    /* $row['url_name'];  = The original site 
     * $row2['url_name']; = The ads site
     *  
     */ 

$stmt2 = $urlClass->runQuery("SELECT * FROM tbl_url ORDER BY RAND() LIMIT 1");
$stmt2->execute();
$row2  = $stmt2->fetch(PDO::FETCH_ASSOC);

if ($row['url_name'] == "") {
    $urlClass->redirect("index.php");
}

    ?>
<?php include 'to.php'; ?>

    
<?php } 
