<?php 
class Cart{
    private $cart;
    private $order;
	public function __construct(){
		global $_web;
		$this->lang                   = $_web['lang'];
        $this->cart                   = new system\Model($this->lang.'_product_cart');
        $this->order                   = new system\Model($this->lang.'_product_order_product');
	}
	public function addCart($data) {
        $lastid = $this->cart->insert($data);
        return $lastid;
    }
    public function addCartProduct($data) {
        $this->order->insert($data);
    }
}