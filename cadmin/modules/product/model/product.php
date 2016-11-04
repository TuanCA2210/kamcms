<?php 
class Product{
	private $category;
	private $product;
	private $productDescription;
	private $productDetail;
	private $productImage;
	public function __construct(){
		global $_web;
		$this->lang        				= $_web['lang'];
		$this->category     			= new system\Model($this->lang.'_category');
		$this->product     				= new system\Model($this->lang.'_product_basic');
		$this->productDescription     	= new system\Model($this->lang.'_product_description');
		$this->productDetail     		= new system\Model($this->lang.'_product_detail');
		$this->productImage     		= new system\Model($this->lang.'_product_image');
	}
	public function getUserById($id){
		$result  = $this->product->get();
		return $result;
	}
}