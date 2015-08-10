<?php
use App\Models\Exceptions\ModelNotFoundException;

$errors = $newcomment->errors;
if(empty($_GET["id"]))
{
throw new ModelNotFoundException();
}?>



<!-- Page Content -->
<div class="container">
    <div class="row">
        <!-- Blog Post Content Column -->
        <div class="col-lg-8">
            <!-- Blog Post -->
            <!-- Title -->
            <h1><?=$movie->title?></h1>
            <hr>
            <!-- Date/Time -->
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php echo date('l, F j Y, H:i', strtotime($movie->created));?></p>
            </p>
            <hr>
            <!-- Preview Image -->
            <!-- <img class="img-responsive" src="http://placehold.it/900x300" alt=""> -->
            <?php if($movie->poster != ""): ?>
            <a href="./?page=downloadoriginalposter&amp;filename=<?= $movie->poster ?>"><img src="./images/posters/300h/<?= $movie->poster ?>" alt=""></a>
            <?php else: ?>
            <p><small>No image found.</small></p>
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
                -->
            <li><span class="label label-primary"><?=ucfirst($tag->tag)?></span></li>
            <!--
                --><?php endforeach;?>
            <hr>
            <!-- Post Content -->
            
            <p> <?php echo $movie->message;?></p>
            <hr>
            <div class="media">
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
                        <h4 class="media-heading"><?=$count?>) <a href="#">
          
                        <?php

                          foreach ($comment->user() as $key ) {
                            
                            print_r($key['firstName']);
                            echo " ";
                            print_r($key['lastName']);
                          }

                         ?> 

                         </a></h4>
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
                    <input type="hidden" name="postID" value="<?=$movie->id?>">
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
        <!-- Blog Sidebar Widgets Column -->
        <div class="col-md-4">
            <!-- Blog Search Well -->
            <div class="well">
                <h4>Blog Search</h4>
                <div class="input-group">
                    <input type="text" class="form-control">
                    <span class="input-group-btn">
                    <button class="btn btn-default" type="button">
                    <span class="glyphicon glyphicon-search"></span>
                    </button>
                    </span>
                </div>
                <!-- /.input-group -->
            </div>
        </div>
    </div>
</div>
<!-- /.row -->
<hr>