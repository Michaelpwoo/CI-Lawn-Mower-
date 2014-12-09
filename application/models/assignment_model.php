<?php

class Assignment_model extends CI_Model {

	//display the list of assignment for a technician
	function getAssignment($id){
		$mysql = 'SELECT a1.creation_date, a1.AID, c1.firstname, c1.lastname, c1.TID, c1.CID
				  FROM client c1
				  INNER JOIN assignment a1 on c1.CID=a1.CID
				  WHERE c1.TID = ?
				  AND a1.completed = 0
				  ';
		$query = $this->db->query($mysql,$id);
		if ($query->num_rows() > 0){
			foreach($query->result() as $row){
				$result[]	=	$row;
			}
			return $result;
		}
	}

	//update the assignment for the technician
	function updateAssignmentCompleted($data){
		$mysql = 'UPDATE assignment 
				  SET completed_date = CURDATE(), completed = 1
				  WHERE AID =?';
		$this->db->query($mysql,$data);
		return $this->db->_error_number();
	}
	
	//add new assignment 
	function addAssignment(){
		$mysql = "INSERT INTO assignment (CID,creation_date,task,amount)
				  SELECT CID,DATE_ADD(last_service_date,INTERVAL 2 WEEK),'Lawn Mower',50 FROM client c1
				  WHERE c1.last_service_date BETWEEN DATE_SUB(CURDATE(), INTERVAL 2 WEEK) AND DATE_SUB(CURDATE(), INTERVAL 1 WEEK)
				  .
				  ";	  
		$this->db->query($mysql);
		return $this->db->_error_number();
	}


}

?>