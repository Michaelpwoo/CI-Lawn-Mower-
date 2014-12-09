<?php

class Technician_model extends CI_Model {

	// add a new technician to the database
	function add($data){
		$this->db->set('tech_assignment_date','NOW()',FALSE);
		$this->db->insert('technician',$data);
		return $this->db->_error_number();
	}

	//get technician ID with the lowest number of jobs
	function getLowestJobId(){
		$mysql = 'SELECT TID FROM technician ORDER BY tech_num_jobs ASC LIMIT 1';
		$q = $this->db->query($mysql);

		//get the row and return the ID
		$data= $q->row('TID');
		return $data;
	}

	// add +1 to the current number jobs
	function updateJob($id){
		$this->db->set('tech_num_jobs', 'tech_num_jobs + 1 ', FALSE);
		$this->db->where('TID',$id);
		$this->db->update('technician');
		return $this->db->_error_number();
	}

	function getTechTable(){
		$query = $this->db->get('technician');
		if ($query->num_rows() > 0){
			foreach($query->result() as $row){
				$result[]	=	$row;
			}
			return $result;
		}
	}
	//get name from id
	function getName($id){
		$mysql = 'SELECT tech_firstname FROM technician WHERE TID = ?  LIMIT 1';
		$query = $this->db->query($mysql,$id);
		if($query->num_rows() > 0){
			foreach ($query->result() as $row) {
				$result[] = $row;
			}
			return $result;
		}
	}

}

?>