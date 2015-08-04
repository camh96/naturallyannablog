<?php
$errors = $movie->errors;
$verb   = ($movie->id?"Edit":"Add");
if ($movie->id) {
	$submitAction = "./?page=post.update";
} else {
	$submitAction = "./?page=post.store";
}
?>
<div class="row">
       <form method="POST" action="<?=$submitAction?>"  enctype="multipart/form-data">
<?php if ($movie->id):?>
              <input type="hidden" name="id" value="<?=$movie->id?>">
<?php endif;?>

          <h1 style="text-align:center"><?=$verb;?> Post</h1>
         <hr />

           <div class="form-group<?php if ($errors['title']):?> has-error <?php endif;?>">
             <label for="title" class="col-sm-2 control-label">Post Title</label>
             <div class="col-sm-10">
               <input id="title" class="form-control input-lg" name="title"
                 placeholder="Today I did this and it was good..."
                 value="<?=$movie->title;?>">
               <div class="help-block"><?=$errors['title'];?></div>
             </div>
           </div>

           <div class="form-group <?php if ($errors['message']):?> has-error <?php endif;?>">
             <label for="message" class="col-sm-2 control-label">Message</label>
             <div class="col-sm-10">
               <textarea id="message" class="form-control" name="message" rows="5"
                 placeholder="Today I ate a vegetable and it was fun."><?=$movie->message;?></textarea>
               <div class="help-block"><?=$errors['message'];?></div>
             </div>
           </div>


           <div class="form-group <?php if ($errors['img']):?> has-error <?php endif;?>">
             <label for="img" class="col-sm-2 control-label">Image</label>
             <div class="col-sm-10">
               <input id="img" class="form-control" name="img" rows="5"
                 type="file"><?=$movie->img;?></textarea>
               <div class="help-block"><?=$errors['img'];?></div>
             </div>
           </div>

            <div class="form-group form-group-lg<?php if ($errors['tags']):?> has-error <?php endif;?>">
              <label for="tags" class="col-sm-4 col-md-2 control-label">Tags</label>
              <div class="col-sm-8 col-md-10">
                <div id="tags" class="form-control"></div>
                <script>
                  var inputTags = "<?=$movie->tags?>";
                </script>
                <div class="help-block"><?=$errors['tags'];?></div>
              </div>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-4 col-sm-10 col-md-offset-2 col-md-10">
                 <button class="btn btn-success">
                    <span class="glyphicon glyphicon-ok"></span> Add Movie
                 </button>
              </div>
           </div>
       </form>
<?php if ($movie->id):?>
            <form method="POST" action="./?page=movie.destroy" class="form-horizontal">
              <div class="form-group">
                <div class="col-sm-offset-4 col-sm-10 col-md-offset-2 col-md-10">
                  <input type="hidden" name="id" value="<?=$movie->id?>">
                  <button class="btn btn-danger">
                    <span class="glyphicon glyphicon-trash"></span> Delete Movie
                  </button>

                </div>
              </div>
            </form>
<?php endif;?>
     </div>