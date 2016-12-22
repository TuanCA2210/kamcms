<?php 
class Product{
    private $product;
    private $productDetail;
    private $productImage;
	private $manager;
	public function __construct(){
		global $_web;
		$this->lang                 = $_web['lang'];
        $this->product              = new system\Model($this->lang.'_product_basic');
        $this->productDetail        = new system\Model($this->lang.'_product_detail');
        $this->productImage         = new system\Model($this->lang.'_product_image');
        $this->manager              = new system\Model($this->lang.'_manager_view_home');
	}
	public function getProductHome(){
    	$this->manager->orderBy('position','ASC');
    	$result = $this->manager->get();
    	return $result;
    }
    public function getDetailProductByHome($id){
        $select = $this->lang."_product_basic.*, ".$this->lang."_product_image.id as id_image, ".$this->lang."_product_image.avatar, ".$this->lang."_product_image.image as image_list, user.id as id_user, user.username";;
        $this->product->where( $this->lang."_product_basic.status",1);
        $this->product->where( $this->lang."_product_basic.id",$id);
        $this->product->join($this->lang."_product_image", $this->lang."_product_image.id_product = ".$this->lang."_product_basic.id", "LEFT");
        $this->product->join('user', 'user.id = '.$this->lang.'_product_basic.create_author', 'LEFT');
        $result = $this->product->getOne(null,$select);
        return $result;
    }
}