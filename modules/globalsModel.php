<?php 
class GlobalsModel{
	private $menu;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->menu     = new system\Model($this->lang.'_menu');
	}
	public function getAll($position){
		$this->menu->where('position',$position);
		$this->menu->orderBy('sort','asc');
		$result  = $this->menu->get();
		return $result;
	}
}