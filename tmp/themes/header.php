<!-- BEGIN TOP BAR -->
<div class="pre-header">
    <div class="container">
        <div class="row">
            <!-- BEGIN TOP BAR LEFT PART -->
            <div class="col-md-6 col-sm-6 additional-shop-info">
                <ul class="list-unstyled list-inline">
                    <li><i class="fa fa-phone"></i><span><?php echo isset($_web['settings']['hotline']) ? $_web['settings']['hotline'] : '';?></span></li>
                    <!-- BEGIN LANGS -->
                    <li class="langs-block">
                        <a href="javascript:void(0);" class="current">
                        <?php 
                        switch ($_web['lang']) {
                            case 'en':
                                echo "English";
                                break;
                            
                            default:
                                echo "Vietnames";
                                break;
                        }
                        ?></a>
                        <div class="langs-block-others-wrapper"><div class="langs-block-others">
                          <a href="javascript:void(0);" title="Tiếng Việt" class="lang" data-lang="vi">Vietnames</a>
                          <a href="javascript:void(0);" title="English" class="lang" data-lang="en">English</a>
                        </div></div>
                    </li>
                    <!-- END LANGS -->
                </ul>
            </div>
            <!-- END TOP BAR LEFT PART -->
            <!-- BEGIN TOP BAR MENU -->
            <div class="col-md-6 col-sm-6 additional-nav">
                <ul class="list-unstyled list-inline pull-right">
                    <li><a href="shop-account.html">My Account</a></li>
                    <li><a href="shop-wishlist.html">My Wishlist</a></li>
                    <li><a href="shop-checkout.html">Checkout</a></li>
                    <li><a href="page-login.html">Log In</a></li>
                </ul>
            </div>
            <!-- END TOP BAR MENU -->
        </div>
    </div>        
</div>
<!-- END TOP BAR -->

<!-- BEGIN HEADER -->
<div class="header">
  <div class="container">
    <a class="site-logo" href="<?php echo base_url();?>"><img src="<?php echo $_web['base_url_cdn'].$_web['settings']['logo'];?>" alt="Metronic Shop UI"></a>

    <a href="javascript:void(0);" class="mobi-toggler"><i class="fa fa-bars"></i></a>

    <!-- BEGIN CART -->
    <div class="top-cart-block">
      <div class="top-cart-info">
        <a href="javascript:void(0);" class="top-cart-info-count">3 items</a>
        <a href="javascript:void(0);" class="top-cart-info-value">$1260</a>
      </div>
      <i class="fa fa-shopping-cart"></i>
                    
      <div class="top-cart-content-wrapper">
        <div class="top-cart-content">
          <ul class="scroller" style="height: 250px;">
            <li>
              <a href="shop-item.html"><img src="../../assets/frontend/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
              <span class="cart-content-count">x 1</span>
              <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
              <em>$1230</em>
              <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
            </li>
            <li>
              <a href="shop-item.html"><img src="../../assets/frontend/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
              <span class="cart-content-count">x 1</span>
              <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
              <em>$1230</em>
              <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
            </li>
            <li>
              <a href="shop-item.html"><img src="../../assets/frontend/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
              <span class="cart-content-count">x 1</span>
              <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
              <em>$1230</em>
              <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
            </li>
            <li>
              <a href="shop-item.html"><img src="../../assets/frontend/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
              <span class="cart-content-count">x 1</span>
              <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
              <em>$1230</em>
              <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
            </li>
            <li>
              <a href="shop-item.html"><img src="../../assets/frontend/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
              <span class="cart-content-count">x 1</span>
              <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
              <em>$1230</em>
              <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
            </li>
            <li>
              <a href="shop-item.html"><img src="../../assets/frontend/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
              <span class="cart-content-count">x 1</span>
              <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
              <em>$1230</em>
              <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
            </li>
            <li>
              <a href="shop-item.html"><img src="../../assets/frontend/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
              <span class="cart-content-count">x 1</span>
              <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
              <em>$1230</em>
              <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
            </li>
            <li>
              <a href="shop-item.html"><img src="../../assets/frontend/pages/img/cart-img.jpg" alt="Rolex Classic Watch" width="37" height="34"></a>
              <span class="cart-content-count">x 1</span>
              <strong><a href="shop-item.html">Rolex Classic Watch</a></strong>
              <em>$1230</em>
              <a href="javascript:void(0);" class="del-goods">&nbsp;</a>
            </li>
          </ul>
          <div class="text-right">
            <a href="shop-shopping-cart.html" class="btn btn-default">View Cart</a>
            <a href="shop-checkout.html" class="btn btn-primary">Checkout</a>
          </div>
        </div>
      </div>            
    </div>
    <!--END CART -->

    <!-- BEGIN NAVIGATION -->
    <div class="header-navigation">
      <?php
        $newArrayMenu = array();
        foreach ($_web['menu'] as $value) {
            $parent = $value['parent_id'];
            $newArrayMenu[$parent][] = $value;
        }
        recursiveMenu($newArrayMenu);
        ?>
      
    <!-- END NAVIGATION -->
  </div>
</div>
</div>
<!-- Header END -->























