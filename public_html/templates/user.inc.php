<?php
if(empty($_GET["id"]))
{
throw new ModelNotFoundException();
}
?>
<h1>
<?=$user->firstName?> <?=$user->lastName?>'s profile
</h1>
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
                     
                      </tr>
                      </tr>
                      
                           
                      </tr>
                     
                    </tbody>
                  </table>
                  
                </div>
              </div>
            </div>
                 
          </div>
        </div>
      </div>
    </div>
