<style>
.error-template {padding: 40px 15px;text-align: center;}
.error-actions {margin-top:15px;margin-bottom:15px;}
.error-actions .btn { margin-right:10px; }
#padding{padding: 20px;}
</style>
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="error-template">
                <h1>
                    We messed up!</h1>
                <h1>
                    500 Internal Server Error</h1>
                <div class="error-details">
                    Soz, an error has occured, Requested page not found.
                </div>
                <div class="error-actions">
                    <a href="./" class="btn btn-primary btn-lg"><span class="glyphicon glyphicon-home"></span>
                        Take Me Home </a><a href="./" class="btn btn-default btn-lg"><span class="glyphicon glyphicon-envelope"></span> Contact Support </a>
                  <div id="padding">
                  </div>

             <?php if (DEV_ENVIRONMENT): ?>
              <style type="text/css">
              pre{ text-align: left; }  </style>
              <div class="alert alert-danger" role="alert">
                <h2>Error: <?= get_class($e) ?></h2>
                <h3><?= $e->getMessage() ?></h3>
                <p>File: <?= $e->getFile() ?> Line <?= $e->getLine() ?></p>

                <?php foreach($e->getTrace() as $level => $trace): ?>
                  <pre>#<?= $level ?> <?php print_r($trace); ?></pre>
                <?php endforeach; ?>

              </div>
            <?php endif; ?>
                </div>
            </div>
        </div>
    </div>
</div>
