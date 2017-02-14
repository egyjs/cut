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
                    <h2><i class="fa fa-user-plus" aria-hidden="true"></i>&nbsp;Sign up</h2>
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
                                <label for="name">Name</label>
                                <input type="text" name="name" class="form-control" value="<?php echo @$name; ?>" placeholder="Name" id="name" required data-validation-required-message="Please enter your name.">
                                <p class="help-block text-danger"></p>
                            </div>
                            <div class="form-group col-xs-6 floating-label-form-group controls">
                                <label for="username">Username</label>
                                <input type="text" value="<?php echo @$username; ?>"  class="form-control" placeholder="Username" name="username"   id="username" required data-validation-required-message="Please enter your Username.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="email">Email Address</label>
                                <input type="email" value="<?php echo @$email; ?>" class="form-control" placeholder="Email Address"  name="email"   id="email" required data-validation-required-message="Please enter your Email Address.">
                                <p class="help-block text-danger"></p>
                            </div>
                        </div>
                        <div class="row control-group">
                            <div class="form-group col-xs-12 floating-label-form-group controls">
                                <label for="password">Password</label>
                                <input type="password"  class="form-control" placeholder="Password"  name="password"    id="password" required data-validation-required-message="Please enter your Password">
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

      