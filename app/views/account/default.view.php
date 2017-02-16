    <!-- Portfolio Grid Section -->
    <section id="portfolio">
        <div class="container">

            <div class="row">
                <div class="col-sm-4 portfolio-item">
<link rel='stylesheet prefetch' href='http://maxcdn.bootstrapcdn.com/font-awesome/4.2.0/css/font-awesome.min.css'>

<div class="wrapper">
        <div class="container">
        	<div class="row">
                <div class="col-md-12">
                <header id="header">
                <div class="slider">
                <div id="carousel-example-generic" class="carousel slide " data-ride="carousel">
                <!-- Wrapper for slides -->
                <div class="carousel-inner " role="listbox">
                  <div class="item active">
                    <img src="http://lorempixel.com/1200/400/people/">
                  </div>
                  <div class="item ">
                    <img src="http://lorempixel.com/1200/400/people/">
                  </div>
                  <div class="item ">
                    <img src="http://lorempixel.com/1200/400/people/">
                  </div>
                  <div class="item ">
                    <img src="http://lorempixel.com/1200/400/people/">
                  </div>
                  <div class="item">
                    <img src="http://placehold.it/1200x400/20BFA9/ffffff&text=CLEAN %26 SMART">
                  </div>
                </div>

                <!-- Controls -->
                <a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
                  <span class="fa fa-angle-left" aria-hidden="true"></span>
                  <span class="sr-only">Previous</span>
                </a>
                <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
                  <span class="fa fa-angle-right" aria-hidden="true"></span>
                  <span class="sr-only">Next</span>
                </a>
              </div>
                                      </div>
                    <!--slider-->
                                      
                	<nav class="navbar navbar-default">
                        <!-- Brand and toggle get grouped for better mobile display -->
                        <div class="navbar-header">

                          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#mainNav">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                          </button>
                          <a class="navbar-brand navbar-brand-user" href="#">
                              <img class="img-responsive" src="<?php echo $this->user_login->get_gravatar($this->Urow['u_email']); ?>">
                          </a>
                          <span class="site-name"><b><?php echo $this->Fname."</b> ".$this->Lname; ?></span>
                          <span class="site-description">Cutter</span>
                        </div>
                    
                        <!-- Collect the nav links, forms, and other content for toggling -->
                        <div class="collapse navbar-collapse" id="mainNav" >
                          <ul class="nav main-menu navbar-nav">
                                <li><a href="/"><i class="fa fa-home"></i> HOME</a></li>
                                <li class="active"><a href="#timeline" data-toggle="tab">Timeline</a></li>
                                <li><a href="#about" data-toggle="tab">About</a></li>
                                <li><a href="#site" data-toggle="tab">Site</a></li>
                                <li><a href="#link" data-toggle="tab">Links</a></li>
                          </ul>
                            
                           <ul class="nav  navbar-nav navbar-right">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-google-plus"></i></a></li>
                          </ul>
                        </div><!-- /.navbar-collapse -->
					</nav>
                    
                </header><!--/#HEADER-->                
                </div>
                <div class="row ">
                    <div class="col-lg-4 col-lg-offset-2">
            <div id="my-tab-content" class="tab-content">
            <div class="tab-pane active" id="timeline">
                <h1>Timeline</h1>
                <p>none</p>
            </div>
            <div class="tab-pane" id="about">
                <h1>About</h1>
<div class="container">
<div class="col-sm-11" style="float:left;">
<div class="hve-pro">
<p>Hello I’m Jenifer Smith, a leading expert in interactive and creative design specializing in the mobile medium. 
My graduation from Massey University with a Bachelor of Design majoring in visual communication.</p>
</div><!--hve-pro close-->
</div><!--col-sm-12 close-->
<br clear="all" />
<div class="row">
<div class="col-md-12">
<h4 class="pro-title">Bio Graph</h4>
</div><!--col-md-12 close-->


<div class="col-md-6">

<div class="table-responsive responsiv-table">
  <table class="table bio-table">
      <tbody>
     <tr>      
        <td>Firstname:</td>
        <td><?php echo $this->Fname; ?></td> 
     </tr>
     <tr>    
        <td>Lastname:</td>
        <td><?php echo $this->Lname; ?></td>       
     </tr>
    <tr>    
        <td>Contury:</td>
        <td><?php echo $this->Urow['u_country']; ?></td>       
    </tr>
    <tr>
        <td>my links CUT:</td>
        <td><?php
        while ($this->row) {
            echo 'd<br>';
        }
        
        
        ?></td> 
     </tr>

    </tbody>
  </table>
  </div><!--table-responsive close-->
</div><!--col-md-6 close-->
</div><!--row close-->




</div><!--container close-->            
            </div>
            <div class="tab-pane" id="site">
                <h1>Yellow</h1>
                <p>yellow yellow yellow yellow yellow</p>
            </div>
            <div class="tab-pane" id="link">
                <h1>Green</h1>
                <p>green green green green green</p>
            </div>
            <div class="tab-pane" id="blue">
                <h1>Blue</h1>
                <p>blue blue blue blue blue</p>
            </div>
        </div>                </div>
                </div>
            </div>
       </div>
       </div>
       </div>
       </div>
       </div>
    </section>
    
  
    
    
