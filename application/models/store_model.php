<?php
class store_model extends CI_Model {

	var $main_table   = 'entity';
	var $content = '';
	var $data    = array(
			'id' => array(
			'default'=> 0,
			'required'=>true,
			'type'=>'int'		
			),
			'name','description','category_id','address_id','is_deleted'
	);

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database('default');
		$this->load->helper('db');
	}

	function getEntityDetail($id)
	{
		$query = $this->db->get_where('entity', array('id' => $id,'is_deleted'=>0));
		foreach ($query->result() as $row)
		{
			return $row;
		}
	}

	function updateEntityDetail($obj)
	{
		$request = my_process_db_request($obj, $this->data);
		return $request;
		

		$this->db->update('entity', $request, array('id' => $_POST['id']));
	}
	
	function createEntityDetail($obj)
	{
		return $obj;
		
		my_process_db_request($obj, $this->data, true);

		$this->db->insert('entity', $this);
		return $this->db->insert_id();
		//return $obj;
	}
	
	function deleteEntityDetail($id)
	{
		return $id;
		$this->title   = $_POST['title'];
		$this->content = $_POST['content'];
		$this->date    = time();
	
		$this->db->update('entries', $this, array('id' => $_POST['id']));
	}
}
?>