<div class="row">
       <div class="col-xs-12">
<h1>DEVELOPMENT MODE - UNDER CONSTRUCTION</h1>
         <h1>Blog - Posts</h1>
<?php if (static ::$auth->isAdmin()):?>
<p>
            <a href="./?page=post.create" class="btn btn-default">
              <span class="glyphicon glyphicon-plus"></span> New Post
            </a>
          </p>
<?php endif?>
<ol>
<?php foreach ($movies as $movie):?>
                <h2><li><a href="./?page=blog.post&amp;id=<?=$movie->id?>">
<?=$movie->title;
?>
</a></li></h2>
<?php endforeach;?>

<?php $this->paginate("./?page=blog", $p, $recordCount, $pageSize);?>
</ol>

