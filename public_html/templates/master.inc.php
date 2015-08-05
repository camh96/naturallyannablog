<!DOCTYPE html>
<html lang="en">
   <head>
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
      <title>Naturally Anna <?php if ($page_title) {echo "-";}?> <?=$page_title?></title>
      <!-- Bootstrap -->
      <link href="css/bootstrap.min.css" rel="stylesheet">
      <link rel="stylesheet" href="css/main.css">
   </head>
   <body>
      <div class="navbar navbar-inverse navbar-fixed-top">
         <div class="container">
            <div class="navbar-header">
               <a href="../" class="navbar-brand">Naturally Anna</a>
               <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
            </div>
            <div class="navbar-collapse collapse" id="navbar-main">
               <ul class="nav navbar-nav">
                  <li <?php if ($page === "index"):?> class="active" <?php endif;?> ><a href="./">Home</a></li>
                  <li <?php if ($page === "about"):?> class="active" <?php endif;?> ><a href="./about">About</a></li>
                  <li <?php if ($page === "recipes"):?> class="active" <?php endif;?> ><a href="./recipes">Recipes</a></li>
                  <li <?php if ($page === "blog"):?> class="active" <?php endif;?> ><a href="./blog">Blog</a></li>
                  <li <?php if ($page === "contact"):?> class="active" <?php endif;?> ><a href="./contact">Contact</a></li>
                  <li <?php if ($page === "faqs"):?> class="active" <?php endif;?>><a href="./faqs">FAQs</a></li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
<?php if (!static ::$auth->check()):?>
                  <li <?php if ($page === "auth.register"):?> class="active" <?php endif;?>><a href="./register">Register</a></li>
                  <li <?php if ($page === "auth.login"):?> class="active" <?php endif;?>><a href="./login">Login</a></li>
<?php  else :?>
                  <li><a href="#">Welcome back, <?=static ::$auth->user()->firstName;?>! </a></li>
                  <li><a href="./logout">Logout</a></li>
<?php endif;?>
</ul>
            </div>
         </div>
      </div>
      <div class="container">

<?php $this->content(); ?>
      <footer class="footer">
      <div class="container" id="wrap">
        <p class="text-muted">© <?php echo date("Y")?> Naturally Anna.</p>
      </div>
    </footer>
      </div>



      <!-- /.container -->
      <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
      <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
      <!-- Include all compiled plugins (below), or include individual files as needed -->
      <script src="js/bootstrap.min.js"></script>
      <script src="js/icheck.min.js"></script>
      <script src="js/taggle-ie9.min.js"></script>
      <script src="js/main.js"></script>
   </body>
</html>