<?php
$errors = $user->errors;
?>
      <div class="row">
        <div class="col-xs-12">
          <form method="POST" action="./?page=auth.store" class="form-horizontal">
            <h1 style="text-align:center">Register New User</h1>


      
      <div class="form-inline">
              <div class="form-group form-group-lg<?php if ($errors['firstName']):?> has-error <?php endif;?>">
              <label for="firstName" class="col-sm-4 col-md-4 control-label">First Name</label>
              <div class="col-sm-6 col-md-4">
                <input id="firstName" class="form-control input-lg" name="firstName"
                  placeholder="John"
                  value="<?=$user->firstName;?>">
                <div class="help-block"><?=$errors['firstName'];?></div>
              </div>
            </div>
            
            
              <div class="form-group form-group-lg<?php if ($errors['lastName']):?> has-error <?php endif;?>">
              <label for="lastName" class="col-sm-4 col-md-4 control-label">Last Name</label>
              <div class="col-sm-6 col-md-4">
                <input id="lastName" class="form-control input-lg" name="lastName"
                  placeholder="Doe"
                  value="<?=$user->lastName;?>">
                <div class="help-block"><?=$errors['lastName'];?></div>
              </div>
            </div>
        </div>



            <div class="form-group form-group-lg<?php if ($errors['email']):?> has-error <?php endif;?>">
              <label for="email" class="col-sm-4 col-md-2 control-label">Email Address</label>
              <div class="col-sm-8 col-md-10">
                <input id="email" class="form-control input-lg" name="email"
                  placeholder="user@domain.com"
                  value="<?=$user->email;?>">
                <div class="help-block"><?=$errors['email'];?></div>
              </div>
            </div>

            <div class="form-group form-group-lg<?php if ($errors['password']):?> has-error <?php endif;?>">
              <label for="password" class="col-sm-4 col-md-2 control-label">Password</label>
              <div class="col-sm-8 col-md-10">
                <input id="password" class="form-control input-lg" name="password" type="password" placeholder="••••••••••••••••••••">
                <div class="help-block"><?=$errors['password'];?></div>
              </div>
            </div>

            <div class="form-group form-group-lg<?php if ($errors['password2']):?> has-error <?php endif;?>">
              <label for="password2" class="col-sm-4 col-md-2 control-label">Confirm Password</label>
              <div class="col-sm-8 col-md-10">
                <input id="password2" class="form-control input-lg" name="password2" type="password" placeholder="••••••••••••••••••••">
                <div class="help-block"><?=$errors['password2'];?></div>
              </div>
            </div>


            <div class="form-group">
              <div class="col-sm-offset-4 col-sm-10 col-md-offset-2 col-md-10">
                <button class="btn btn-success">
                  <span class="glyphicon glyphicon-ok"></span> Register
                </button>
              </div>
            </div>
          </form>





        </div>
      </div>


