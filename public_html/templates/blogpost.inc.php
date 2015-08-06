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
        <div class="col-xs-12">
          <form method="POST" action="<?= $submitAction ?>" class="form-horizontal" enctype="multipart/form-data">
            <?php if($movie->id): ?>
              <input type="hidden" name="id" value="<?= $movie->id ?>">
            <?php endif; ?>
            <h1 style="text-align: center"><?= $verb; ?> Post</h1>

            <div class="form-group form-group-lg<?php if ($errors['title']): ?> has-error <?php endif; ?>">
              <label for="title" class="col-sm-4 col-md-2 control-label">Post Title</label>
              <div class="col-sm-8 col-md-10">
                <input id="title" class="form-control input-lg" name="title"
                  placeholder="Today I did this and it was good..."
                  value="<?= $movie->title; ?>">
                <div class="help-block"><?= $errors['title']; ?></div>
              </div>
            </div>

          <div class="form-group form-group-lg<?php if ($errors['message']): ?> has-error <?php endif; ?>">
              <label for="message" class="col-sm-4 col-md-2 control-label">Message Body</label>
              <div class="col-sm-8 col-md-10">
               <textarea id="message" class="form-control" name="message" rows="5"
                 placeholder="Today I ate a vegetable and it was fun."><?=$movie->message;?></textarea>
                <div class="help-block"><?= $errors['message']; ?></div>
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

            <div class="form-group form-group-lg<?php if ($errors['poster']): ?> has-error <?php endif; ?>">
              <label for="poster" class="col-sm-4 col-md-2 control-label">Poster Image</label>
              <div class="col-sm-5 col-md-7">
                <input id="poster" class="form-control input-lg" name="poster"
                  type="file">
                <div class="help-block"><?= $errors['poster']; ?></div>
              </div>
              <?php if($movie->poster != ""): ?>
                <div class="col-sm-1 col-md-1">
                  <img src="./images/posters/100h/<?= $movie->poster ?>" alt="">
                </div>
                <div class="col-sm-2 col-md-2">
                  <div class="checkbox">
                    <label><input type="checkbox" name="remove-image" value="TRUE"> Remove Image</label>
                  </div>
                </div>
              <?php else: ?>
                <div class="col-sm-3 col-md-3">
                  <p><small>No image set</small></p>
                </div>
              <?php endif; ?>
            </div>

            <div class="form-group">
              <div class="col-sm-offset-4 col-sm-10 col-md-offset-2 col-md-10">
                <button class="btn btn-success">
                  <span class="glyphicon glyphicon-ok"></span> <?= $verb; ?> Movie
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
      </div>