<html>
	<head>
		<title>
			name
		</title>
		<link rel="stylesheet" type="text/css" href="style.css"/>
		<link rel="stylesheet" type="text/css" href="rtl.css"/>
                <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
		<link href="https://fonts.googleapis.com/css?family=Dosis" rel="stylesheet">
		<script type="text/javascript" rel="script" src="script.js"></script>        
        </head>
	<body>
		<div class="body">
                    <!-- 2. Include library -->
                       <script src="dist/clipboard.min.js"></script>

                       <!-- 3. Instantiate clipboard -->
                       <script>
                       var clipboard = new Clipboard('.copyBtn');

                       clipboard.on('success', function(e) {
                           console.log(e);
                       });

                       clipboard.on('error', function(e) {
                           console.log(e);
                       });
                       </script>
			<div class="outer">

				<div class="middle">
					<?php include 'includes/nav.php';
						include 'includes/header.php'; ?>
					<div class="inner">

                                                            <form method="POST" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]);?>">
                                                            <?php
                                                                if (isset($_GET['err'])){
                                                                    if(empty($urlInput)){
                                                                        $err = "INSERT A URl TO SHORT IT";
                                                                       
                                                                }  else {
                                                                    if ($urlClass->checkurl == "NOT VALID" ) {
                                                                        $err = "Please enter a valid URL.!!";
                                                                        
                                                                    }

                                                                     
                                                                }
                                                                ?>                                                            
                                                                <div   style="color: #f00;" ><?php echo @$err; ?> </div>
                                                                
                                                                <?php } ?>
                                                                <input type="text" id="copyText" name="urlInput" value="<?php 
                                                                //echo $_POST['urlInput']; 
                                                                //echo $urlInput;
                                                                //echo $_SESSION['urlresult'];
                                                                if(@$_SESSION['urlresult'] != "" ){
                                                                    echo $_SESSION['urlresult'];
                                                                }  else {
                                                                   echo $urlInput; 
                                                                }
                                                                ?>" placeholder="Insert your URL" <?php if (isset($_GET['result'])){
                                                                                                                                
                                                                echo  'readonly';} ?>>
                                                                						<?php
                                                    if (isset($_GET['result'])){ 
                                                       
                                                        ?>
                                                                
                                                                <input data-clipboard-action="copy" data-clipboard-target="#copyText" type="button" class="copyBtn" style="cursor: copy;" value="Copy url">
                                                                <a class="btn" href="index.php" >Return to home</a>
                                                            <?php }else{ ?>
                                                                    <input type="submit" name="suburl" value="Get short URL">
                                                                    <br>
                                                                    <input type="submit" class="btn" name="deleteresult" value="Delete last result">
                                                                    <?php
                                                                    if(isset($_POST['deleteresult'])){
                                                                       $_SESSION['urlresult'] = ""; 
                                                                       $_SESSION['timeresult'] = "";
                                                                       unset($_SESSION['urlresult']);
                                                                       unset($_SESSION['timeresult']);
                                                                       $urlClass->redirect($_SERVER["PHP_SELF"]);
                                                                    }
                                                                    
                                                                    }
                                                                    ?>

                                                            </form>
                                            <?php 
                                                            

                                            if (isset($_POST['suburl'])  ) {
//                                                echo $urlClass->checkurl ."  test" ;
                                                //$_SESSION['urlresult']  = $urlInput;                                                
                                                if(empty($_POST['urlInput'])){
                                                  
                                                    $urlClass->redirect('?err');                                                
                                               
                                                  }  else {
                                                    
                                                    if ($urlClass->checkurl == "NOT VALID" ) {
                                                        
                                                       $urlClass->redirect('?err');
                                                    
                                                       
                                                    }  else {
                                                        $url_code = $urlClass->getUrlRand(5);
                                                        $urlClass->shortURL($urlInput,$url_code);
                                                            if ($urlClass->checkurl == "NOT VALID") {

                                                               $urlClass->redirect('?err');


                                                            }  else {
                                                                $urlFind = 'http://'.$_SERVER['HTTP_HOST'].dirname($_SERVER['REQUEST_URI'])."/".$url_code;
                                                                $_SESSION['urlresult'] = $urlFind;                                                                
                                                            }                                                        $urlClass->redirect('?result');

                                                        
                                                        
                                                    }                                                   
                                                }

                                            }  else {
                                                
                                            }

                                            ?>
					</div>
					<?php include 'includes/footer.php' ?>
				</div>


			</div>

			<div id="menu" class="menu">
				<a href="javascript:void(0)" class="closeBtn" onclick="closeNav()"><i class="fa fa-times-circle"
				                                                                      aria-hidden="true"></i>
				</a>
				<div class="sideMenuButtons">
					<a href="#"><i class="fa fa-user-plus" aria-hidden="true"></i>
						&nbsp;Sign up</a>
					<a href="#"><i class="fa fa-sign-in" aria-hidden="true"></i>
						&nbsp;Sign in</a>
				</div>

			</div>

		</div>
            		<script>
//function c(){
//	var n=$('.c').attr('id');
//    var c=n;
//	$('.c').text(c);
//	setInterval(function(){
//		c--;
//		if(c>=0){
//			$('.c').text(c);
//		}
//        if(c==-1){
//            window.location = "<?php echo $_SERVER['PHP_SELF']; ?>";
//        }
//	},1000);
//}
//
//// Start
//c();

                        </script>

	</body>
</html>