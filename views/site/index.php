<?php

use yii\helpers\Url;
$this->title = Yii::$app->params['panelClienteNombre'];

$theme = $this->theme;

?>


<section class="main-wrap">
    <div class="container">
      <div class="row">
        <div class="col-xl-2 col-lg-3 col-lgmd-20per mt-30 left-side float-none-sm ">
          <div class="sidebar-block open1">
            <div class="sidebar-box sidebar-item mb-30"> <span class="opener plus"></span>
              <div class="sidebar-title">
                <h3><?php echo \Yii::t('app', 'products of interest'); ?></h3> <span></span>
              </div>
              <div class="sidebar-contant">
                <div class="row">
                  <div id="sidebar-product" class="owl-carousel">
                    <div class="item">
                      <ul id="productos-izq-9">
                      </ul>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="col-xl-10 col-lg-9 col-lgmd-80per mt-30 right-side float-none-sm float-right-imp">
          <section class="banner-main">
                <div class="banner">
                  <div class="main-banner">
                            <?php foreach($modelbanners  as $key => $val) { ?>

                    <div class="banner-1"> <img src="<?php print $theme->getUrl('resources/images/banners/'.$val->banner_imagen);?>"  style=""alt="nextTouch">
                    </div>
                    <?php } ?>
                  </div>
                </div>
          </section>
          <section class="mt-60 mt-sm-15 mt-xs-15">
            <div class="">
              <div class="product-listing">
                <div class="row">
                  <div class="col-12">
                    <div class="heading-part line-bottom mb-30">
                      <h2 class="main_title heading"><span><?php echo \Yii::t('app', 'New Arrivals'); ?></span></h2>
                    </div>
                  </div>
                </div>
                <div class="pro_cat">
                  <div class="row">

                    <div class="alert alert-success  fade out" id="success-alert">
                        <button type="button" class="close" data-dismiss="alert">x</button>
                        <strong>Success! </strong>
                        
                        <?php echo \Yii::t('app', 'carprod'); ?>
                    </div>
                    <div class="owl-carousel pro-cat-slider " id="producto-index">
                        <?php
                          foreach($modelIndex  as $keyIndex => $valIndex) { 
                          ?>
                      <div class="item">
                        <div class="product-item">
                          <div class="product-image"> <a href="productodetalle<?php print $lang;?>&idproducto=<?php print $valIndex->producto_id?>"> <img src="<?php print $theme->getUrl('resources/images/productos/'.$valIndex->producto_imagen_pequeno);?>" alt="nextTouch"> </a>
                            <div class="product-detail-inner">
                              <div class="detail-inner-left align-center">
                                <ul>
                                  <li class="pro-cart-icon">
                                      <button  onclick='agregarCarrito(<?php print  $valIndex->producto_id;?>,
                                      "<?php print  addslashes($valIndex->producto_titulo);?>",
                                      "\"<?php print  $valIndex->producto_imagen_pequeno;?>\"",
                                      "\"<?php print  $valIndex->producto_precio;?>\"",
                                      "\"<?php print  $valIndex->producto_precio;?>\"")' title="Add to Cart"><i class="fa fa-shopping-basket"></i></button>
                                  </li>
                                  <li class="pro-quick-view-icon"><a class="product-item-name" href="productodetalle<?php print $lang?>&idproducto=<?php print $valIndex->producto_id?>" title="quick-view"><i class="fa fa-eye"></i></a></li>
                                </ul>
                              </div>
                            </div>
                          </div>
                          <div class="product-item-details">
                            <div class="product-item-name"> <a href="#"><?php print $valIndex->producto_titulo; ?></a> </div>
                            <div class="price-box"> <span class="price"><?php echo \Yii::t('app', '$'); ?><?php print $valIndex->producto_precio; ?></span> </div>
                          </div>
                        </div>
                      </div>
                      <?php  } ?>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </section>          
        </div>
      </div>
    </div>
  </section>
  <script>
    
    jQuery(document).ready(function(){

        getProductoInfo()

    })

function getProductoInfo() {

   var  menuCaSub = "",
         meuSearch = ''

                 
      
      jQuery.ajax({
        type: 'GET',
        url: CONFIGURATION.API_V2+"products/countries/<?php print $country?>/9", 
        dataType: "json",
  
          success: function (data) {
      
            if(data.status=="ok") {

              for (var  i = 0; i < data.data.length; i++) {
                
                var result = data.data[i]

                $("#productos-izq-9").append('\
                  <li>\
                    <div class="pro-media">\
                    <a href="productodetalle<?php print $lang?>&idproducto='+result.producto_id+'"><img alt="T-shirt" src="<?php print $theme->getUrl('resources/images/productos/');?>'+result.producto_imagen_pequeno+'"></a>\
                    </div>\
                    <div class="pro-detail-info">\
                    <a href="productodetalle<?php print $lang?>&idproducto='+result.producto_id+'">'+result.producto_titulo+'</a>\
                    <div class="rating-summary-block">\
                      <div class="" title="53%"> <span style="width:53%"></span>\
                      </div>\
                    </div>\
                    <div class="price-box">\
                      <span class="price"><?php echo \Yii::t('app', '$'); ?>'+result.producto_precio+'</span> </div>\
                    </div>\
                    </li>')
              }

        
 
                        
 
                    
            

      }
    },
    beforeSend: function (xhr) { },
    error: function (xhr, status) { }
})



}
       
  </script>