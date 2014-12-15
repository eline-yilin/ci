<?php
class product_model extends CI_Model {

	var $main_table   = 'product';
	var $content = '';
	var $data    = array(
			'id' => array(
			'default'=> 0,
			//'required'=>true,
			'type'=>'int'		
			),
			'name' => array(
			'required'=>true,
			'type'=>'string'		
			),
			'price' => array(
					'required'=>true,
					'type'=>'int'
			),
			'description'=> array(
					'type'=>'string'
			),
			'category_id'=> array(
					'type'=>'int'
			),
			'img'=> array(
					'type'=>'string'
			),
			'is_deleted'=> array(
					'type'=>'int',
					'default' => 0
			)
	);

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database('default');
		$this->load->helper('db');
	}

	function getDetail($id)
	{
		$query = $this->db->get_where('entity', array('id' => $id,'is_deleted'=>0));
		foreach ($query->result() as $row)
		{
			return $row;
		}
	}

	function updateDetail($obj)
	{
		$request = my_process_db_request($obj, $this->data);
		return $request;
		

		$this->db->update('entity', $request, array('id' => $_POST['id']));
	}
	
	function createDetail($obj)
	{

		$request = my_process_db_request($obj, $this->data, false);

		$request['id'] = null;
		$this->db->insert('product', $request);
		return $this->db->insert_id();
		//return $obj;
	}
	
	function deleteDetail($id)
	{
		return $id;
		$this->title   = $_POST['title'];
		$this->content = $_POST['content'];
		$this->date    = time();
	
		$this->db->update('entries', $this, array('id' => $_POST['id']));
	}
}
?>