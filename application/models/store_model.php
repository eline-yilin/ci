<?php
class store_model extends CI_Model {

	var $title   = '';
	var $content = '';
	var $date    = '';

	function __construct()
	{
		// Call the Model constructor
		parent::__construct();
		$this->load->database('default');
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
		return $obj;
		$this->title   = $_POST['title'];
		$this->content = $_POST['content'];
		$this->date    = time();

		$this->db->update('entries', $this, array('id' => $_POST['id']));
	}
	
	function createEntityDetail($obj)
	{
		return $obj;
		$this->title   = $_POST['title'];
		$this->content = $_POST['content'];
		$this->date    = time();
	
			$this->db->insert('entries', $this);
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