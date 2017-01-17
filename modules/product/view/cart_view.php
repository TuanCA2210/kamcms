<?php 
$arr_color = array('Red','Blue','Black');
$arr_size = array('L','M','XL');
?>
<!-- BEGIN SIDEBAR & CONTENT -->
<div class="row margin-bottom-40">
  <!-- BEGIN CONTENT -->
  <div class="col-md-12 col-sm-12">
    <h1>Shopping cart</h1>
    <?php 
    if (!empty($this->data['cart'])) { ?>
            <div class="goods-page">
              <div class="goods-data clearfix">
                <div class="table-wrapper-responsive">
                <table summary="Shopping cart" id="data_shopping_cart">
                  <tr>
                    <th class="goods-page-image">Image</th>
                    <th class="goods-page-description">Description</th>
                    <th class="goods-page-quantity">Quantity</th>
                    <th class="goods-page-price">Unit price</th>
                    <th class="goods-page-total" colspan="2">Total</th>
                  </tr>
                  <?php 
                  foreach ($this->data['cart'] as $key => $value) { ?>
                          <tr data-identifier="<?php echo $value->identifier;?>" data-id="<?php echo $value->id;?>">
                            <td class="goods-page-image">
                              <a href="<?php echo base_url().'product/'.alias($value->name).'-'.$value->id.'.htm';?>"><img src="<?php echo $_web['base_url_cdn'].$value->options['image']; ?>" alt="<?php echo $value->name; ?>"></a>
                            </td>
                            <td class="goods-page-description">
                              <h3><a href="<?php echo base_url().'product/'.alias($value->name).'-'.$value->id.'.htm';?>"><?php echo $value->name; ?></a></h3>
                              <p>
                              
                                
                              
                              <?php 
                              echo '<select id="choose_color">';
                              echo '<option value="">Chọn</option>';
                              foreach ($arr_color as $v) {
                                  $selected = ($v==$value->options['color']) ? ' selected' : '';
                                  echo '<option value="'.$v.'" '.$selected.'>'.$v.'</option>';
                              }
                              echo '</select>';
                              ?>
                              <?php 
                              echo '<select id="choose_size">';
                              echo '<option value="">Chọn</option>';
                              foreach ($arr_size as $v) {
                                  $selected = ($v==$value->options['size']) ? ' selected' : '';
                                  echo '<option value="'.$v.'" '.$selected.'>'.$v.'</option>';
                              }
                              echo '</select>';
                              ?>
                              </p>
                              <em>More info is <a href="<?php echo base_url().'product/'.alias($value->name).'-'.$value->id.'.htm';?>">here</a></em>
                            </td>
                            <td class="goods-page-quantity">
                              <div class="product-quantity">
                                  <input id="product-quantity" type="number" min="1" value="<?php echo $value->quantity;?>" readonly class="form-control input-sm">
                              </div>
                            </td>
                            <td class="goods-page-price">
                              <strong><span>$</span> <?php echo number_format($value->price,0,'','.'); ?></strong>
                            </td>
                            <td class="goods-page-total">
                              <strong><span>$</span> <?php echo number_format($value->total,0,'','.'); ?></strong>
                            </td>
                            <td class="del-goods-col">
                              <a class="del-goods del-cart-checkout" data-id="<?php echo $value->id;?>" data-identifier="<?php echo $value->identifier;?>" href="#">&nbsp;</a>
                            </td>
                          </tr>
                  <?php 
                  }
                  ?>
                </table>
                </div>

                <div class="shopping-total">
                  <ul>
                    <li class="sub-total">
                      <em>Sub total</em>
                      <strong class="price"><span>$</span> <?php echo number_format($this->data['total_cart'],0,'','.'); ?></strong>
                    </li>
                    <li>
                      <em>Shipping cost</em>
                      <strong class="price"><span>$</span> 0</strong>
                    </li>
                    <li class="shopping-total-price">
                      <em>Total</em>
                      <strong class="price"><span>$</span> <?php echo number_format($this->data['total_cart'],0,'','.'); ?></strong>
                    </li>
                  </ul>
                </div>
              </div>
              <button class="btn btn-default" type="submit">Continue shopping <i class="fa fa-shopping-cart"></i></button>
              <a href="<?php echo base_url().'checkout';?>" class="btn btn-primary" type="submit">Checkout <i class="fa fa-check"></i></a>
            </div>
    <?php               
    }else{
      echo '<div class="shopping-cart-page">
              <div class="shopping-cart-data clearfix">
                <p>Your shopping cart is empty!</p>
              </div>
            </div>';
    }
    ?>
  </div>
  <!-- END CONTENT -->
</div>
<!-- END SIDEBAR & CONTENT -->

<!-- BEGIN SIMILAR PRODUCTS -->
<div class="row margin-bottom-40">
  <div class="col-md-12 col-sm-12">
    <h2>Most popular products</h2>
    <div class="owl-carousel owl-carousel4">
      <div>
        <div class="product-item">
          <div class="pi-img-wrapper">
            <img src="../../assets/frontend/pages/img/products/k1.jpg" class="img-responsive" alt="Berry Lace Dress">
            <div>
              <a href="../../assets/frontend/pages/img/products/k1.jpg" class="btn btn-default fancybox-button">Zoom</a>
              <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
            </div>
          </div>
          <h3><a href="shop-item.html">Berry Lace Dress</a></h3>
          <div class="pi-price">$29.00</div>
          <a href="#" class="btn btn-default add2cart">Add to cart</a>
          <div class="sticker sticker-new"></div>
        </div>
      </div>
      <div>
        <div class="product-item">
          <div class="pi-img-wrapper">
            <img src="../../assets/frontend/pages/img/products/k2.jpg" class="img-responsive" alt="Berry Lace Dress">
            <div>
              <a href="../../assets/frontend/pages/img/products/k2.jpg" class="btn btn-default fancybox-button">Zoom</a>
              <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
            </div>
          </div>
          <h3><a href="shop-item.html">Berry Lace Dress2</a></h3>
          <div class="pi-price">$29.00</div>
          <a href="#" class="btn btn-default add2cart">Add to cart</a>
        </div>
      </div>
      <div>
        <div class="product-item">
          <div class="pi-img-wrapper">
            <img src="../../assets/frontend/pages/img/products/k3.jpg" class="img-responsive" alt="Berry Lace Dress">
            <div>
              <a href="../../assets/frontend/pages/img/products/k3.jpg" class="btn btn-default fancybox-button">Zoom</a>
              <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
            </div>
          </div>
          <h3><a href="shop-item.html">Berry Lace Dress3</a></h3>
          <div class="pi-price">$29.00</div>
          <a href="#" class="btn btn-default add2cart">Add to cart</a>
        </div>
      </div>
      <div>
        <div class="product-item">
          <div class="pi-img-wrapper">
            <img src="../../assets/frontend/pages/img/products/k4.jpg" class="img-responsive" alt="Berry Lace Dress">
            <div>
              <a href="../../assets/frontend/pages/img/products/k4.jpg" class="btn btn-default fancybox-button">Zoom</a>
              <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
            </div>
          </div>
          <h3><a href="shop-item.html">Berry Lace Dress4</a></h3>
          <div class="pi-price">$29.00</div>
          <a href="#" class="btn btn-default add2cart">Add to cart</a>
          <div class="sticker sticker-sale"></div>
        </div>
      </div>
      <div>
        <div class="product-item">
          <div class="pi-img-wrapper">
            <img src="../../assets/frontend/pages/img/products/k1.jpg" class="img-responsive" alt="Berry Lace Dress">
            <div>
              <a href="../../assets/frontend/pages/img/products/k1.jpg" class="btn btn-default fancybox-button">Zoom</a>
              <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
            </div>
          </div>
          <h3><a href="shop-item.html">Berry Lace Dress5</a></h3>
          <div class="pi-price">$29.00</div>
          <a href="#" class="btn btn-default add2cart">Add to cart</a>
        </div>
      </div>
      <div>
        <div class="product-item">
          <div class="pi-img-wrapper">
            <img src="../../assets/frontend/pages/img/products/k2.jpg" class="img-responsive" alt="Berry Lace Dress">
            <div>
              <a href="../../assets/frontend/pages/img/products/k2.jpg" class="btn btn-default fancybox-button">Zoom</a>
              <a href="#product-pop-up" class="btn btn-default fancybox-fast-view">View</a>
            </div>
          </div>
          <h3><a href="shop-item.html">Berry Lace Dress6</a></h3>
          <div class="pi-price">$29.00</div>
          <a href="#" class="btn btn-default add2cart">Add to cart</a>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- END SIMILAR PRODUCTS -->