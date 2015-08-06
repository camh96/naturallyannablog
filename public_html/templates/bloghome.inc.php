<!-- Page Content -->
<div class="container">
<h1>asdasdasda</h1>
    <div class="row">
        <!-- Blog Entries Column -->
        <div class="col-md-8">
            <h1 class="page-header">Naturally Anna Blog</h1>
            <!-- Blog Posts as foreach loop -->

<?php if (static ::$auth->isAdmin()):?>
<p>
            <a href="./?page=post.create" class="btn btn-default">
              <span class="glyphicon glyphicon-plus"></span> New Post
            </a>
          </p>
<?php endif?>

            <?php foreach ($movies as $movie):?>
            <h2>
                <a href="./?page=blog.post&amp;id=<?=$movie->id?>"><?=$movie->title;?></a>
            </h2>
            <p><span class="glyphicon glyphicon-time"></span> Posted on <?php $timePosted = strtotime($movie->created);
                echo date('l, F j, Y H:i', $timePosted)?> </p>
            <hr>
            <img class="img-responsive" src="http://placehold.it/900x300" alt="">
            <hr>
            <p><?= $movie->message ?></p>
            <a class="btn btn-primary" href="./?page=blog.post&amp;id=<?=$movie->id?>">Read More <span class="glyphicon glyphicon-chevron-right"></span></a>
            <hr>
            <?php endforeach ?>
            <?php $this->paginate("./?page=blog", $p, $recordCount, $pageSize, 5);?>
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
            <!-- Blog Categories Well -->
        </div>
    </div>
    <!-- /.row -->
    <hr>
    <!-- Footer -->
</div>
<!-- /.container -->
<!-- jQuery -->
<script src="js/jquery.js"></script>
<!-- Bootstrap Core JavaScript -->
<script src="js/bootstrap.min.js"></script>
</body>
</html>