        <!-- Contact Section -->
    <section id="contact">
        <div class="container">
            <!--
<div class="alert alert-success" role="alert">...</div>
<div class="alert alert-info" role="alert">...</div>
<div class="alert alert-warning" role="alert">...</div>
            -->
<!--
<div class="alert alert-danger" role="alert"> 
    <strong>Oh snap!</strong> Change a few things up and try submitting again. 
</div>-->
            <?php echo $this->msg; ?>
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2><i class="fa fa-sign-in" aria-hidden="true"></i>&nbsp;Sign in</h2>
                    <hr class="star-primary">
                </div>
            </div>
            <div class="row">
                <div class="col-lg-8 col-lg-offset-2">
                    <!-- To configure the contact form email address, go to mail/contact_me.php and update the email address in the PHP file on line 19. -->
                    <!-- The form should work on most web servers, but if the form is not working you may need to configure your web server differently. -->
                    <form  method="post" novalidate>
                        <div class="row control-group">
                            <div class="form-group col-xs-6 floating-label-form-group controls">
                                <input type="text" name="Uemail" class="form-control" placeholder="Email Address" required data-validation-required-message="Please enter your Email Address.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group col-xs-6 floating-label-form-group controls">
                                <input type="password" name="Upass"  class="form-control" placeholder="Password"  required data-validation-required-message="Please enter your Password.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <br>
                        <div id="success"></div>
                        <div class="row">
                            <div class="form-group col-xs-12">
                                <button type="submit" name="submit"  class="btn btn-success btn-lg btn-block">Send</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

      