<div class="row">
       <div class="col-xs-12">
<h1>DEVELOPER - UNDER CONSTRUCTION</h1>
         <h1>Blog - Posts</h1>
<?php if (static ::$auth->isAdmin()):?>
<p>
            <a href="./?page=movie.create" class="btn btn-default">
              <span class="glyphicon glyphicon-plus"></span> Add Movie
            </a>
          </p>
<?php endif?>
<ol>
<?php foreach ($movies as $movie):?>
                <li><a href="./?page=recipes&amp;id=<?=$movie->id?>">
<?=$movie->title;
?> (<?=$movie->year;?>)
                </a></li>
<?php endforeach;?>

<?php $this->paginate("./?page=movies", $p, $recordCount, $pageSize, 5);?>
</ol>

