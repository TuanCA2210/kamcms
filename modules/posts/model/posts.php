<?php 
class Posts{
	private $cate;
	private $posts;
	public function __construct(){
		global $_web;
		$this->lang        = $_web['lang'];
		$this->posts     = new system\Model($this->lang.'_posts');
		$this->cate     = new system\Model($this->lang.'_categories_posts');
	}
	public function getBreadcrumbsCategory($idCate, $data = array()) {
        $this->cate->where("id",$idCate);
        $this->cate->where("status",1);
        $category = $this->cate->getOne();

        $category['link'] = base_url().alias($category['title']).'-c'.$category['id'].'.htm';
        $data[]           = array(
            'name' => (isset($category['title']) ? $category['title'] : ''),
            'href'  => $category['link'],
        );
        if (isset($category['parent_id']) && $category['parent_id'] > 0) {
            $data = $this->getBreadcrumbsCategory($category['parent_id'], $data);
        }
        return $data;
    }
}