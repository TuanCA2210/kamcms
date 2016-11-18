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
	public function getProduct(){
		$result  = $this->product->get();
		return $result;
	}
	public function getPagiProduct($start,$limit){
		$select = $this->lang."_product_basic.*, user.id as id_user, user.username";
		$this->product->join('user', 'user.id = '.$this->lang.'_product_basic.create_author', 'LEFT');
		$result  = $this->product->get(null, array($start,$limit),$select);
		//$result  = $this->categories->rawQuery($sql);
		return $result;
	}
	public function update($data,$id){
		$this->product->where('id',$id);
		$this->product->update($data);
	}
	public function delete($id){
		$this->product->where('id',$id);
		$this->product->delete();
	}
	public function insertData($data_insert){
		$this->product->insert($data_insert);
	}
	public function getDataById($id){
		$this->product->where('id',$id);
		$result  = $this->product->getOne();
		return $result;
	}
	public function checkId($id){
		$this->product->where('id',$id);
		$result  = $this->product->num_rows();
		if ($result>0) {
			return FALSE;
		}else{
			return TRUE;
		}
	}
	public function findSearch($search){
		$select = $this->lang."_product_basic.*, user.id as id_user, user.username";
		$this->product->where($this->lang.'_product_basic.title', '%'.$search.'%', 'like');
		$this->product->join('user', 'user.id = '.$this->lang.'_product_basic.create_author', 'LEFT');
		$result  = $this->product->get(null,null,$select);
		return $result;
	}
	public function dellWhereInArray($name_id){
		$name = implode(",",$name_id);
		$sql = "DELETE FROM ".$this->lang."_product_basic WHERE id IN (".$name.")";
		$this->product->rawQuery($sql);
	}
}