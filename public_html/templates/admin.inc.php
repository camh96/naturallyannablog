<h1>The Users are:</h1>

<?php

foreach ($users as $user):

// echo "<pre>";
		// $profileImg = $user->gravatar(48);
		// echo "<img src=\"$profileImg\">";
		// echo $profileImg;
// 		echo " ";
// 		print_r($user->firstName);
// 		echo " ";
// 		print_r($user->lastName);
// 	   	$timePosted = strtotime($user->created);
// 		echo " made an account on ".date('l, F j, Y', $timePosted)." at ".date('H:i', $timePosted);
// echo "</pre>";


?>
      </div>
        <div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-xs-offset-0 col-sm-offset-0 col-md-offset-3 col-lg-offset-3 toppad" >
   
   
          <div class="panel panel-info">
            <div class="panel-heading">
              <h3 class="panel-title"><?=$user->firstName?> <?=$user->lastName?></h3>
            </div>
            <div class="panel-body">
              <div class="row">
                <div class="col-md-3 col-lg-3 " align="center"> <img alt="User Pic" src="<?=$user->gravatar()?>" class="img-circle img-responsive"> </div>
                
                <div class=" col-md-9 col-lg-9 "> 
                  <table class="table table-user-information">
                    <tbody>
                      <tr>
                        <td>Join date:</td>
                        <td><?php $timePosted = strtotime($user->created); echo date('l, F j, Y', $timePosted)." at ".date('H:i', $timePosted) ?></td>
                      </tr>
                         <tr>
                             <tr>
                      </tr>
                      <tr>
                        <td>Email</td>
                        <td><a href="mailto:<?=$user->email?>"><?=$user->email?></a></td>
                      </tr>
                        <td>Status</td>
                        <?php if(!$user->banned == 0): ?>
                        <td><span class="label label-danger">BANNED</span><br>
                    	<?php else: ?>
                    	<td><span class="label label-success">Active</span><br>	
                    <?php endif ?>
                        </td>
                           
                      </tr>
                      </tr>
                        <td>Access Level</td>
                        <?php if($user->role == "user"): ?>
                        <td><span class="label label-warning">User</span><br>
                    	<?php else: ?>
                    	<td><span class="label label-success">Admin</span><br>	
                    <?php endif ?>
                        </td>
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
                 <div class="panel-footer">
                        <a data-original-title="Broadcast Message" data-toggle="tooltip" type="button" class="btn btn-sm btn-primary"><i class="glyphicon glyphicon-envelope"></i></a>
                        <span class="pull-right">
                            <a href="edit.html" data-original-title="Edit this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-warning"><i class="glyphicon glyphicon-edit"></i></a>
                            <a data-original-title="Remove this user" data-toggle="tooltip" type="button" class="btn btn-sm btn-danger"><i class="glyphicon glyphicon-remove"></i></a>
                        </span>
                    </div>
            
          </div>
        </div>
      </div>
    </div>

   <?php endforeach ?> 