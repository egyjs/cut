<?php



//$file = "counter.txt" ; 
//$fp = fopen($file,"r") ; 
//$fr = fread($fp,filesize($file)) ; 
//echo "<center><h3>".$fr."</h3></center>" ; 
//$counter = $fr+1 ; 
//
//
//
//
//$fp2 = fopen($file,"w") ; 
//$fw = fwrite($fp2,$counter) ; 
//




?>
<html>
    <head>
        <title><?php echo $urlClass->get_title( $row['url_name'] ); ?></title>
        <link rel="shortcut icon" href="<?php echo $urlClass->get_icon( $row['url_name'],$row['url_name'] ); ?>">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
        
        <link href="to.css" rel="stylesheet" type="text/css"/>
        <link rel="stylesheet" href="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/reset.css">
        <link rel='stylesheet prefetch' href='https://cdnjs.cloudflare.com/ajax/libs/meyer-reset/2.0/reset.min.css'>

<script type="text/javascript">

window.onload = function(){

(function(){
  var counter = 5;

  setInterval(function() {
    counter--;
    if (counter >= 0) {
      span = document.getElementById("count");
      span.innerHTML = counter;
    }
    // Display 'counter' wherever you want to display it.
    if (counter === -1) {
        var div = "<a class='cd-img-replace  btn-5'  href='<?php echo $row['url_name']; ?>'><span class='fa fa-forward skip' aria-hidden='true'></a>"
        document.getElementById("cd-cart-trigger").innerHTML = div;
        clearInterval(counter);
    }

  }, 1000);

})();

}

</script>
    </head>
    <body>
            <header>
                    <div id="logo"><img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/cd-logo.svg" alt="Homepage"></div>

                            <div id="cd-hamburger-menu">
                                <a class="cd-img-replace" href="#0">
                                    <i class="fa fa-circle-o-notch fa-spin fa-3x fa-fw"></i>
                                    <span class="sr-only">Loading...</span>   
                                </a>
                            </div>
                    <div id="cd-cart-trigger" >
                        <a class='cd-img-replace  btn-2'>
                            <span class="fa skip" id='count'>5</span>
                        </a>
                    </div>
            </header>

            <nav id="main-nav">
                    <ul>
                        <li><a class="current" href="//<?php echo $_SERVER['HTTP_HOST']; ?>/api/">Add my 🌍 Like Ads</a></li>
                           
                    </ul>
            </nav>

            <main style="height: 648px;">
                    <div style="height: 100%;position:relative;display: flex;">
<!--                            <li>
                                    <img src="https://s3-us-west-2.amazonaws.com/s.cdpn.io/148866/thumb.jpg" alt="Preview image">
                            </li>-->
                            <iframe scrolling="auto"
                                    src="<?php echo $row2['url_name']; ?>"
                                    id="rf2" frameborder="0" allowtransparency="true"
                                    style="width:100%;height:100%"></iframe>
                                <!--<iframe src="<?php echo $row2['url_name']; ?>" style="border: 0; width: 100%; height: 100%">-->


                    </div> <!-- cd-gallery-items -->
            </main>



    </body>
</html>