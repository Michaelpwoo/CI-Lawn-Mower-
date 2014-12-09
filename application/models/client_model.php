<?php

class Client_model extends CI_Model {

	//insert new customer firstname and lastname
	function add($data) {
		//access technician database
		$this->db->set('last_service_date','NOW()',FALSE);
		//insert in database
		$this->db->insert('client',$data); 
		return $this->db->_error_number();
	}
	//get all information from client
	function getClientTable(){
		$query = $this->db->get('client');
		if ($query->num_rows() > 0) {
			foreach($query->result() as $row){
				$result[]	=	$row;
			}
			return $result;
		}
	}

	//checks and updates the time 
	function updateService(){
		$mysql = 'UPDATE client c1 
				  SET c1.last_service_date = DATE_ADD(c1.last_service_date, INTERVAL 2 WEEK)
				  WHERE c1.last_service_date BETWEEN DATE_SUB(CURDATE(),INTERVAL 2 WEEK) AND DATE_SUB(CURDATE(), INTERVAL 1 WEEK)';
		$this->db->query($mysql);
		return $this->db->_error_number();
	}

	function getInvoice($id){
		$mysql = 'SELECT task,amount,completed_date,cid
					FROM assignment a1
					WHERE a1.completed_date BETWEEN DATE_SUB(CURDATE(),INTERVAL 1 MONTH) AND CURDATE()
					AND cid = ?
					AND a1.completed = 1';
		$query = $this->db->query($mysql,$id);
		if ($query->num_rows() > 0){
			foreach($query->result() as $row){
				$result[]	=	$row;
			}
			return $result;
		}
	}

}

?>