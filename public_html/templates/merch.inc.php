<style type="text/css">

.product{
  border: 1px solid #dddddd;
  height: 321px;
}

.product>img{
  max-width: 230px;
}
.product-title{
  font-size: 20px;
}

.product-desc{
  font-size: 14px;
}

.product-price{
  font-size: 22px;
}

.product-instock{
  color: #74DF00;
  font-size: 20px;
  margin-top: 10px;
}

.product-outstock{
  color: #ce4844;
  font-size: 20px;
  margin-top: 10px;
}

.product-info{
    margin-top: 50px;
}

/*********************************************
          VIEW
*********************************************/

.content-wrapper {
  max-width: 1140px;
  background: #fff;
  margin: 0 auto;
  margin-top: 25px;
  margin-bottom: 10px;
  border: 0px;
  border-radius: 0px;
}

.container-fluid{
  max-width: 1140px;
  margin: 0 auto;
}

.view-wrapper {
  float: right;
  max-width: 70%;
  margin-top: 25px;
}

.container {
  padding-left: 0px;
  padding-right: 0px;
  max-width: 100%;
}



</style>

  
<?php foreach($merchandise as $merch): ?>
<div class="container-fluid">
    <div class="content-wrapper"> 
    <div class="item-container">  
      <div class="container"> 
        <div class="col-md-12">
          <div class="product col-md-3 service-image-left">
              <img id="item-display" src="<? echo $merch->image;?>" style="max-height:300px"; alt=""></img>
          </div>
          
          
        <div class="col-md-7">
          <div class="product-title"> <?= $merch->name; ?></div>
          <div class="product-desc"> <? echo $merch->description; ?></div>
          <hr>
          <div class="product-price"><? echo "$".$merch->price; ?></div>
          <?php if($merch->stock >= 1): ?>
          <div class="product-instock" >In Stock</div>
        <?php else: ?>
          <div class="product-outstock" >Out Of Stock</div>
          <?php endif ?>
          <hr>
          <div class="btn-group cart">
          <?php if($merch->stock >= 1): ?>
            <button type="button" class="btn btn-success">
            <?php else: ?>
              <button type="button" class="btn btn-success" disabled="">
            <?php endif ?>
              Add to cart 
            </button>
          </div>
          <div class="btn-group wishlist">
            <button type="button" class="btn btn-info">
              Add to wishlist 
            </button>
          </div>
        </div>
      </div> 
    </div>
    <div class="container-fluid">   
      <div class="col-md-12 product-info">
        <div id="myTabContent" class="tab-content">
          
          <div class="tab-pane fade" id="service-three">
                        
          </div>
        </div>
        <hr>
      </div>
    </div>
  </div>
</div>
<?php endforeach ?>