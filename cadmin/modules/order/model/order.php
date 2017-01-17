<?php 
class Order{
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->order     = new system\Model($this->lang.'_product_cart');
		$this->statusOrder     = new system\Model('vi_order_status');
	}
	
	public function getAllOrder(){
		$select ='*';
		$this->order->orderBy('id','DESC');
		$result  = $this->order->get(null,null,$select);
		return $result;
	}

	public function getStatusOrder(){
		$select ='*';
		$result  = $this->statusOrder->get(null,null,$select);
		return $result;
	}
}