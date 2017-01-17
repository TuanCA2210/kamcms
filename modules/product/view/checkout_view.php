<!-- BEGIN SIDEBAR & CONTENT -->
<div class="row margin-bottom-40">
  <!-- BEGIN CONTENT -->
  <div class="col-md-12 col-sm-12">
    <h1>Checkout</h1>
    <!-- BEGIN CHECKOUT PAGE -->
    <div class="panel-group checkout-page accordion scrollable" id="checkout-page" data-error-fullname="<?php echo lang('fullname_checkout');?>" data-error-email="<?php echo lang('email_checkout');?>" data-error-email-valid="<?php echo lang('invalid_email');?>" data-error-phone="<?php echo lang('phone_checkout');?>" data-error-phone-valid="<?php echo lang('invalid_phone');?>" data-error-province="<?php echo lang('province_checkout');?>" data-error-district="<?php echo lang('district_checkout');?>" data-error-address="<?php echo lang('address_checkout');?>">

    <form action="<?php echo base_url().'product/product/confirmOrder';?>" method="post" name="form_checkout_succ" id="form_checkout_succ">

      

      <!-- BEGIN SHIPPING ADDRESS -->
      <div id="shipping-address" class="panel panel-default">
        <div class="panel-heading">
          <h2 class="panel-title">
            <a data-toggle="collapse" data-parent="#checkout-page" href="#shipping-address-content" class="accordion-toggle">
              <?php echo lang('step_one_fix');?>
            </a>
          </h2>
        </div>
        <div id="shipping-address-content" class="panel-collapse collapse in">
          <div class="panel-body row">
            <div class="col-md-6 col-sm-6 order_left">
              <div class="top"><span class="icon">1</span><?php echo lang('buyer_information');?></div>
              <br>
              <div class="form-group">
                <label for="firstname-dd"><?php echo lang('fullname');?> <span class="require">*</span></label>
                <input type="text" id="fullname-dd" name="left_fullname" class="form-control" placeholder="<?php echo lang('fullname');?>"/>
              </div>
              <div class="form-group">
                <label for="email-dd"><?php echo lang('email');?> <span class="require">*</span></label>
                <input type="text" id="email-dd" name="left_email" class="form-control" placeholder="<?php echo lang('email');?>"/>
              </div>
              <div class="form-group">
                <label for="telephone-dd"><?php echo lang('phone');?> <span class="require">*</span></label>
                <input type="text" id="telephone-dd" name="left_phone" class="form-control" placeholder="<?php echo lang('phone');?>"/>
              </div>
              <div class="form-group">
                <label for="country-dd"><?php echo lang('province');?> <span class="require">*</span></label>
                <select class="form-control input-sm" id="country-dd" name="left_province">
                  <option value=""> --- <?php echo lang('please_select');?> --- </option>
                  <?php 
                  foreach ($this->data['province'] as $key => $value) {
                    echo '<option value="'.$value['provinceid'].'">'.$value['name'].'</option>';
                  }
                  ?>
                </select>
              </div>
              <div class="form-group">
                <label for="region-state-dd"><?php echo lang('district');?> <span class="require">*</span></label>
                <select class="form-control input-sm" id="region-state-dd" name="left_district">
                  <option value=""> --- <?php echo lang('please_select');?> --- </option>
                </select>
              </div>
              <div class="form-group">
                <label for="address-dd"><?php echo lang('address');?></label>
                <input type="text" id="address-dd" name="left_address" class="form-control" placeholder="<?php echo lang('house_number');?>"/>
              </div>
            </div>
            <div class="col-md-6 col-sm-6 order_right">
                <div class="top"><span class="icon">2</span><?php echo lang('recipient_information');?> <span class="same-payment"><input type="checkbox" id="giong" name="giong" value="1">&nbsp;<?php echo lang('same_info_buyer');?></span></div>
                <br>
                <div class="form-group">
                  <label for="firstname-dd2"><?php echo lang('fullname');?> <span class="require">*</span></label>
                  <input type="text" id="fullname-dd2" name="right_fullname" class="form-control" placeholder="<?php echo lang('fullname');?>"/>
                </div>
                <div class="form-group">
                  <label for="email-dd2"><?php echo lang('email');?> <span class="require">*</span></label>
                  <input type="text" id="email-dd2" name="right_email" class="form-control" placeholder="<?php echo lang('email');?>" />
                </div>
                <div class="form-group">
                  <label for="telephone-dd2"><?php echo lang('phone');?> <span class="require">*</span></label>
                  <input type="text" id="telephone-dd2" name="right_phone" class="form-control" placeholder="<?php echo lang('phone');?>"/>
                </div>
                <div class="form-group">
                  <label for="country-dd2"><?php echo lang('province');?> <span class="require">*</span></label>
                  <select class="form-control input-sm" id="country-dd2" name="right_province">
                    <option value=""> --- <?php echo lang('please_select');?> --- </option>
                    <?php 
                    foreach ($this->data['province'] as $key => $value) {
                      echo '<option value="'.$value['provinceid'].'">'.$value['name'].'</option>';
                    }
                    ?>
                  </select>
                </div>
                <div class="form-group">
                  <label for="region-state-dd2"><?php echo lang('district');?> <span class="require">*</span></label>
                  <select class="form-control input-sm" id="region-state-dd2" name="right_district">
                    <option value=""> --- <?php echo lang('please_select');?> --- </option>
                  </select>
                </div>
                <div class="form-group">
                  <label for="address-dd2"><?php echo lang('address');?></label>
                  <input type="text" id="address-dd2" name="right_address" class="form-control" placeholder="<?php echo lang('house_number');?>" />
                </div>
            </div>
            <div class="col-md-12">
              <button class="btn btn-primary  pull-right" type="button" id="button-shipping-address"><?php echo lang('continue');?></button>
            </div>
          </div>
        </div>
      </div>
      <!-- END SHIPPING ADDRESS -->

      <!-- BEGIN PAYMENT METHOD -->
      <div id="payment-method" class="panel panel-default">
        <div class="panel-heading">
          <h2 class="panel-title">
            <a data-toggle="collapse" data-parent="#checkout-page" href="#payment-method-content" class="accordion-toggle">
              <?php echo lang('step_two_fix');?>
            </a>
          </h2>
        </div>
        <div id="payment-method-content" class="panel-collapse collapse">
          <div class="panel-body row">
            <div class="col-md-12">
              <p>Bạn hãy chọn hình thức thanh toán phù hợp với bạn.</p>
              <div class="radio-list">
                <label>
                  <input type="radio" name="payment" value="1" checked> Nhận hàng và thanh toán tại nhà (COD)
                </label>
                <label>
                  <input type="radio" name="payment" value="2"> Chuyển tiền qua tài khoản ngân hàng
                </label>
              </div>
              <button class="btn btn-primary  pull-right" type="button" id="button-payment-method"><?php echo lang('continue');?></button> 
            </div>
          </div>
        </div>
      </div>
      <!-- END PAYMENT METHOD -->

      <!-- BEGIN CONFIRM -->
      <div id="confirm" class="panel panel-default">
        <div class="panel-heading">
          <h2 class="panel-title">
            <a data-toggle="collapse" data-parent="#checkout-page" href="#confirm-content" class="accordion-toggle">
              <?php echo lang('step_three_fix');?>
            </a>
          </h2>
        </div>
        <div id="confirm-content" class="panel-collapse collapse">
          <div class="panel-body row">
            <div class="col-md-12 clearfix">
              <div class="table-wrapper-responsive">
              <table>
                <tr>
                  <th class="checkout-image">Image</th>
                  <th class="checkout-description">Description</th>
                  <th class="checkout-quantity">Quantity</th>
                  <th class="checkout-price">Price</th>
                  <th class="checkout-total">Total</th>
                </tr>
                <?php 
                  foreach ($this->data['cart'] as $key => $value) { ?>
                      
                      <tr>
                        <td class="checkout-image">
                          <a href="<?php echo base_url().'product/'.alias($value->name).'-'.$value->id.'.htm';?>"><img src="<?php echo $_web['base_url_cdn'].$value->options['image']; ?>" alt="<?php echo $value->name;?>"></a>
                        </td>
                        <td class="checkout-description">
                          <h3><a href="<?php echo base_url().'product/'.alias($value->name).'-'.$value->id.'.htm';?>"><?php echo $value->name;?></a></h3>
                          <p><?php echo ($value->options['color']!='') ? 'Color: '.$value->options['color'] : '';?> <?php echo ($value->options['size']!='') ? 'Size: '.$value->options['size'] : '';?></p>
                          <em>More info is <a href="<?php echo base_url().'product/'.alias($value->name).'-'.$value->id.'.htm';?>">here</a></em>
                        </td>
                        <td class="checkout-quantity"><?php echo $value->quantity;?></td>
                        <td class="checkout-price"><strong><span>$</span><?php echo number_format($value->price,0,'','.'); ?></strong></td>
                        <td class="checkout-total"><strong><span>$</span><?php echo number_format($value->total,0,'','.'); ?></strong></td>
                      </tr>

                <?php 
                  }
                ?>
                
              </table>
              </div>
              <div class="checkout-total-block">
                <ul>
                  <li>
                    <em><?php echo lang('sub_total');?></em>
                    <strong class="price"><span>$</span><?php echo number_format($this->data['total_cart'],0,'','.'); ?></strong>
                  </li>
                  <li>
                    <em><?php echo lang('ship_fee');?></em>
                    <strong class="price"><span>$</span>0</strong>
                  </li>
                  <li>
                    <em>VAT (0%)</em>
                    <strong class="price"><span>$</span>0</strong>
                  </li>
                  <li class="checkout-total-price">
                    <em><?php echo lang('total');?></em>
                    <strong class="price"><span>$</span><?php echo number_format($this->data['total_cart'],0,'','.'); ?></strong>
                  </li>
                </ul>
              </div>
              <div class="clearfix"></div>
              <button class="btn btn-primary pull-right" name="confirm_order" type="submit" id="button-confirm"><?php echo lang('confirm_order');?></button>
              <button type="button" class="btn btn-default pull-right margin-right-20">Cancel</button>
            </div>
          </div>
        </div>
      </div>
      <!-- END CONFIRM -->
    
    </form><!--END FORM-->


    </div>
    <!-- END CHECKOUT PAGE -->
  </div>
  <!-- END CONTENT -->
</div>
<!-- END SIDEBAR & CONTENT -->



<div class="loading"></div>
<div class="fade_loading"></div>