<div class="row">
       <div class="col-xs-12">
         <ol class="breadcrumb">
         <li><a href="./">Home</a></li>
         <li><a href="./?page=blog">Posts</a></li>
         <li class="active"><?=$movie->title?></li>
       </ol>
         <h1 style="text-align:center">Post</h1>


           <h2> <?=$movie->title;?></h2>
           <p>This was posted on <?php echo date('l, F j Y, H:i', strtotime($movie->created));?></p>
           <p style="padding:5px;"> <?echo $movie->message;
?></p>
<?php if($movie->poster != ""): ?>
          <a href="./?page=downloadoriginalposter&amp;filename=<?= $movie->poster ?>"><img src="./images/posters/300h/<?= $movie->poster ?>" alt=""></a>
          <?php else: ?>
            <p><small>no poster found</small></p>
          <?php endif; ?>
<?php if (static ::$auth->isAdmin()):?>
            <p>
            <a href="./?page=post.edit&amp;id=<?=$movie->id?>" class="btn btn-default">
              <span class="glyphicon glyphicon-pencil"></span> Edit Post
            </a>
          </p>
<?php endif?>
<ul class="list-inline">
<?php foreach ($tags as $tag):?><!--
            --><li><span class="label label-primary"><?=ucfirst($tag->tag)?></span></li><!--
          --><?php endforeach;?>
</ul>



<?php if (count($comments) > 0):?>
            <?php $count = 0;?>
<h2 style="text-align:center; clear:both;">Comments</h2>
<?php foreach ($comments as $comment):?>
              <?php $count += 1;?>
              <?php if ($count%2 == 0):?>
                <article id="comment-<?=$comment->id?>" class="media" style="background-color: #e9e9e9; margin-bottom: 10px; padding-top: 10px;">
<?php  elseif (!$count%2 == 0):?>
                <article id="comment-<?=$comment->id?>" class="media" style="margin-bottom: 10px; padding-top: 10px; clear:both">
<?php endif?>

                <div class="media-left">
                  <img src="<?=$comment->user()->gravatar(48)?>" alt="">
                </div>
                <div class="media-body">
                  <h4 class="media-heading"><?=$count?>) <a href="#"><?=ucwords($comment->user()->username)?></a></h4>
                  <p><small>Comment submitted: <?php $timePosted = strtotime($comment->created);
echo date('l, F j, Y H:i', $timePosted);
?></small></p>
                  <p><?=$comment->comment?></p>
                </div>

                </article>
<?php endforeach;?>
          <?php  else :?>
<p>No comments. Yet…</p>
<?php endif;?>


<?php
$errors = $newcomment->errors;
?>
<?php if(empty($movie)): ?>
<div class="alert alert-danger" style="margin-top: 20px;">
  <strong>ERROR!</strong>
  <br />
  WHOA.
</div>
<?php endif ?>









<pre>
<?php 
if (!static ::$auth->user()->id) 
{
  echo "NOT LOGGED IN";
}
else
{
  echo "logged in";
}


?>
</pre>
<pre>
<?php print_r($newcomment);
      
 ?>
</pre>






<?php if(is_null(static ::$auth->user())): ?>
  <p>You need to be <a href="./login">logged in</a> to add a comment.</p>
<?php elseif(static ::$auth->user()->banned): ?>
<div class="alert alert-danger" style="margin-top: 20px;">
  <strong>Sorry!</strong>
  <br />
  You have been banned from commenting.
</div>

<?php elseif (!static ::$auth->user()->banned):?>
  <h3>Add Comment to '<?=$movie->title?>'</h3>
            <form method="POST" action="./?page=comment.create" class="form-horizontal">
              <input type="hidden" name="movieID" value="<?=$movie->id?>">

              <div class="form-group <?php if ($errors['comment']):?> has-error <?php endif;?>">
                <label for="comment" class="col-sm-4 col-md-2 control-label">Comment</label>
                <div class="col-sm-8 col-md-10">
                  <textarea id="comment" class="form-control" name="comment" rows="5"><?=$newcomment->comment?></textarea>
                  <div class="help-block"><?=$errors['comment'];?></div>

              </div>
              </div>
              <div class="form-group">
                <div class="col-sm-offset-4 col-sm-10 col-md-offset-2 col-md-10">
                  <button class="btn btn-success">
                    <span class="glyphicon glyphicon-ok"></span> Add Comment
                  </button>
                </div>
              </div>
            </form>

<?php endif;?>






       </div>
     </div>