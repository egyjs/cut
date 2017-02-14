    <!-- Header -->
    <header>
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <img class="img-responsive  logo" 
<?php if($this->user_login->is_logged_in() ==""){ ?>src="img/profile.png"
<?php }else { 
        echo 'src="'.$this->user_login->get_gravatar($this->Urow['u_email']).'"';
     }  ?> alt="">
                    <div class="intro-text">
                        <?php if(!isset($this->msg)){ ?>
                        <span class="name">Start Bootstrap</span>
                        <?php }  else { 
                            
                            echo $this->msg ;
                            
                        } ?>
                        <hr class="star-light">
                        <div class="skills">
                        <form method="POST"  id="contactForm" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <input type="url" class="form-control" placeholder="http://" name="link" id="copyText"  
                                    <?php echo 'value="'.$_SESSION['urlresult'].'"'; ?>>
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit"  name="suburl" class="btn btn-success btn-block">Get short URL</button>
                            </div>
                            <!--div class="form-group col-xs-6">
                                <button type="submit" class="btn btn-success btn-block">Delete last result</button>
                            </div-->
                        </div>
                    </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>