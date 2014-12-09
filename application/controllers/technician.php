<?php


class Technician extends CI_Controller{

	    public function __construct(){
        parent::__construct();
        $this->load->model('technician_model');
        $this->load->model('client_model');
        $this->load->model('assignment_model');
            
    }

    //main view
	function index(){
		$data['technician'] = $this->technician_model->getTechTable();
		$this->load->view('header');
		$this->load->view('nav_template');
		$this->load->view('technician',$data);	
		$this->load->view('footer');
	}

	//weekly assignment view
	function displayWork(){
		//add assignment to the technician
		$this->assignment_model->addAssignment();
		
		//update service for client
		$this->client_model->updateService();

		//get the assignments for the week
		$id = $this->input->post('techlist');
		$data['assignment'] = $this->assignment_model->getAssignment($id);
		$data['name'] = $this->technician_model->getName($id);

		//load new page
		$this->load->view('header');
		$this->load->view('nav_template');
		$this->load->view('display_assignment',$data);
		$this->load->view('footer');
	}

	//updates completed work
	function displayUpdate(){
		$data= $this->input->post('checked');
		$result = $this->assignment_model->updateAssignmentCompleted($data[0]);
		if($result === 0){
			redirect(base_url()."technician", 'refresh');
		}else{
			echo "Error";
		}
	}

	//add technician to the database
	function add(){
	
		$fname = $this->input->post('fname');
		$lname = $this->input->post('lname');

		$this->load->library('form_validation');

		$this->form_validation->set_rules('fname','First Name','trim|required|xss_clean');
   		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|xss_clean|callback_check_database');

   		//check if user input is valid
   		if($this->form_validation->run() == FALSE ){
   			echo "Error";
   		} else {

   			$data = Array(
			'tech_firstname'=> $fname,
			'tech_lastname'=> $lname
			);
		
			$result = $this->technician_model->add($data);
			if($result === 0){
				redirect(base_url()."technician", 'refresh');
			} else {
				echo "Error";
			}
   		}
	}
}


?>