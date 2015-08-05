<style type="text/css">
  body {
    background-color: white;
}

#loginbox {
    margin-top: 30px;
}

#loginbox > div:first-child {
    padding-bottom: 10px;
}

.iconmelon {
    display: block;
    margin: auto;
}

#form > div {
    margin-bottom: 25px;
}

#form > div:last-child {
    margin-top: 10px;
    margin-bottom: 10px;
}

.panel {
    background-color: transparent;
}

.panel-body {
    padding-top: 30px;
    background-color: rgba(2555,255,255,.3);
}

#particles {
    width: 100%;
    height: 100%;
    overflow: hidden;
    top: 0;
    bottom: 0;
    left: 0;
    right: 0;
    position: absolute;
    z-index: -2;
}

.iconmelon,
.im {
  position: relative;
  width: 150px;
  height: 150px;
  display: block;
  fill: #525151;
}

.iconmelon:after,
.im:after {
  content: '';
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
}
</style>
<div class="container">

    <div id="loginbox" class="mainbox col-md-6 col-md-offset-3 col-sm-6 col-sm-offset-3">


        <div class="panel panel-default" >
            <div class="panel-heading">
                <div class="panel-title text-center">Naturally Anna Login</div>
            </div>

            <div class="panel-body" >


<?php if ($error):?>
<div class="alert alert-danger alert-dismissible" role="alert">
               <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>
               <strong>Oh snap! </strong>Your login details are incorrect. Please try again.
        </div>
<?php endif;?>
<form name="form" id="form" action="./?page=auth.attempt" class="form-horizontal" enctype="multipart/form-data" method="POST">

                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-user"></i></span>
                        <input id="user" type="text" class="form-control" name="email" value="" placeholder="Email Address">
                    </div>

                    <div class="input-group">
                        <span class="input-group-addon"><i class="glyphicon glyphicon-lock"></i></span>
                        <input id="password" type="password" class="form-control" name="password" placeholder="••••••••••••••••••••">
                    </div>

                    <div class="form-group">
                        <!-- Button -->
                        <div class="col-sm-12 controls">
                            <button type="submit" href="#" class="btn btn-primary pull-right"><i class="glyphicon glyphicon-log-in"></i> Log in</button>
                        </div>
                    </div>

                </form>

            </div>
        </div>
    </div>
</div>

