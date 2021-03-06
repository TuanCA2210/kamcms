<?php 
namespace system;
class Model {
     protected $name;
	private $db; 
	public function __construct($name=null,$db=null){
		global $_web;				
		if($name==null)			
			$this->name = get_class($this);		
		else			
			$this->name = $name;
		if($db == null){
			$this->db = $_web['db']; 
		}
		else
		{
			$this->db = $db;
		}
	} 
     /*
     @raw Querry
     */
     public function rawQuery($sql){
          return $this->db->rawQuery($sql);
     }	
	/*
	 *@columns array(string) so truong can lay
	 *@numRows int (0,limit), array (v0,v1)
	 */
	public function get($as = null,$numRows = null,$columns='*'){		
		if($as == null)
			return $this->db->get($this->name, $numRows, $columns);
		else
			return $this->db->get($this->name." ".$as, $numRows, $columns);
	}		
 	/**
     * A convenient SELECT * function to get one record.
     *
     * @param string  $tableName The name of the database table to work with.
     *
     * @return array Contains the returned rows from the select query.
     */
     public function getOne($as=null,$columns = '*'){
          if($as == null)
               return $this->db->getOne($this->name,$columns);
          else
               return $this->db->getOne($this->name." ".$as, $columns);
     } 
     /**
     * This method allows you to specify multiple (method chaining optional) AND WHERE statements for SQL queries.
     *
     * @uses $MySqliDb->where('id', 7)->where('title', 'MyTitle');
     *
     * @param string $whereProp  The name of the database field.
     * @param mixed  $whereValue The value of the database field.
     *
     * @return MysqliDb
     */
 	public function where($whereProp, $whereValue = null, $operator = null){
 		$this->db->where($whereProp, $whereValue, $operator);
 	}
 	/**
     * This method allows you to specify multiple (method chaining optional) OR WHERE statements for SQL queries.
     *
     * @uses $MySqliDb->orWhere('id', 7)->orWhere('title', 'MyTitle');
     *
     * @param string $whereProp  The name of the database field.
     * @param mixed  $whereValue The value of the database field.
     *
     * @return MysqliDb
     */
 	public function orWhere($whereProp, $whereValue = null, $operator = null){
 		$this->db->orWhere($whereProp, $whereValue, $operator);
 	}
 	 /**
     * This method allows you to specify multiple (method chaining optional) ORDER BY statements for SQL queries.
     *
     * @uses $MySqliDb->orderBy('id', 'desc')->orderBy('name', 'desc');
     *
     * @param string $orderByField The name of the database field.
     * @param string $orderByDirection Order direction.
     *
     * @return MysqliDb
     */
 	public function orderBy($orderByField, $orderbyDirection = "DESC"){
 		$this->db->orderBy($orderByField,$orderbyDirection);
 	}
 	 /**
     * This method allows you to specify multiple (method chaining optional) GROUP BY statements for SQL queries.
     *
     * @uses $MySqliDb->groupBy('name');
     *
     * @param string $groupByField The name of the database field.
     *
     * @return MysqliDb
     */
 	public function groupBy($groupByField){
 		$this->db->groupBy($groupByField);
 	}
 	/**
     * This method allows you to concatenate joins for the final SQL statement.
     *
     * @uses $MySqliDb->join('table1', 'field1 <> field2', 'LEFT')
     *
     * @param string $joinTable The name of the table.
     * @param string $joinCondition the condition.
     * @param string $joinType 'LEFT', 'INNER' etc.
     *
     * @return MysqliDb
     */
 	public function join($as, $joinCondition, $joinType = ''){
 		$this->db->join($as, $joinCondition, $joinType);
 	}
 	
     public function getLastError(){
          return  $this->db->getLastError();
     } 
     /**
     * A convenient num_rows
     *
     * @param string  $tableName The name of the database table to work with. 
     *
     * @return int number rows from the select query.
     */
     public function num_rows(){
          return  $this->db->num_rows($this->name);
          //return $this->db->withTotalCount();
     }   
     public function num_rows_new(){
          return  $this->db->num_rows_new();
          //return $this->db->withTotalCount();
     }  
     /*
      *@data  array
      */       
     public function insert($data){       
          return $this->db->insert($this->name,$data); 
     }  
      /*
      *@data  array
      */       
     public function insert_core($data){       
          return $this->db->insert($this->name,$data); 
     }         
     /*
      *@data  array 
      */
     public function update($data){  
          return $this->db->update($this->name,$data);
     }         
     /* 
      */
     public function delete(){      
          return $this->db->delete($this->name);
     }

     /* 
      */
     public function existTable(){      
          return $this->db->table_exist($this->name);
     }
     /* 
      */
     public function setTrace ($enabled, $stripPrefix = null){      
          return $this->db->setTrace($enabled, $stripPrefix = null);
     }
     public function getTraces(){
          return $this->db->getTraces();
     }

}
?>
