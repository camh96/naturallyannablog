<?php
    $errors = $movie->errors;
    $verb = ( $movie->id ? "Edit" : "Add" );
    if ($movie->id) {
      $submitAction = "./?page=movie.update";
    } else {
      $submitAction = "./?page=movie.store";
    }
?>
<div class="row">
       <form method="POST" action="<?= $submitAction ?>">
                 <?php if($movie->id): ?>
              <input type="hidden" name="id" value="<?= $movie->id ?>">
            <?php endif; ?>
        
          <h1 style="text-align:center"><?= $verb; ?> Movie</h1>
         <hr />
         
           <div class="form-group<?php if ($errors['title']): ?> has-error <?php endif; ?>">
             <label for="title" class="col-sm-2 control-label">Movie Title</label>
             <div class="col-sm-10">
               <input id="title" class="form-control input-lg" name="title" 
                 placeholder="Lion King"
                 value="<?= $movie->title; ?>">
               <div class="help-block"><?= $errors['title']; ?></div>
             </div>
           </div>

           <div class="form-group <?php if ($errors['year']): ?> has-error <?php endif; ?>">
             <label for="year" class="col-sm-2 control-label">Release Year</label>
             <div class="col-sm-10">
               <input id="year" class="form-control" name="year" size="5"
                 placeholder="1994"
                 value="<?= $movie->year; ?>">
               <div class="help-block"><?= $errors['year']; ?></div>
             </div>
           </div>

           <div class="form-group <?php if ($errors['description']): ?> has-error <?php endif; ?>">
             <label for="description" class="col-sm-2 control-label">Description</label>
             <div class="col-sm-10">
               <textarea id="description" class="form-control" name="description" rows="5"
                 placeholder="Disney Movies from the 90s"><?= $movie->description; ?></textarea>
               <div class="help-block"><?= $errors['description']; ?></div>
             </div>
           </div>


            <div class="form-group form-group-lg<?php if ($errors['tags']): ?> has-error <?php endif; ?>">
              <label for="tags" class="col-sm-4 col-md-2 control-label">Tags</label>
              <div class="col-sm-8 col-md-10">
                <div id="tags" class="form-control"></div>
                <script>
                  var inputTags = "<?= $movie->tags ?>";
                </script>
                <div class="help-block"><?= $errors['tags']; ?></div>
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
                 <?php if ($movie->id): ?>
            <form method="POST" action="./?page=movie.destroy" class="form-horizontal">
              <div class="form-group">
                <div class="col-sm-offset-4 col-sm-10 col-md-offset-2 col-md-10">
                  <input type="hidden" name="id" value="<?= $movie->id ?>">                  
                  <button class="btn btn-danger">
                    <span class="glyphicon glyphicon-trash"></span> Delete Movie
                  </button>

                </div>
              </div>
            </form>
          <?php endif; ?>
     </div>