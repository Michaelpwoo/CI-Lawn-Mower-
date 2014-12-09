<?php
/**
* 
*/
class Client extends CI_Controller {

	    public function __construct(){
        parent::__construct();
        $this->load->model('technician_model');
        $this->load->model('client_model');
        $this->load->model('assignment_model');
            
    }
//-----Display Views

	function index(){
		$data['client'] = $this->client_model->getClientTable();
		$this->load->view('header');
		$this->load->view('nav_template');
		$this->load->view('client',$data);
		$this->load->view('footer');
	}

	function displayInvoice(){
		$id = $this->input->post('clientlist');
		$data['invoice'] = $this->client_model->getInvoice($id);
		$this->load->view('header');
		$this->load->view('nav_template');
		$this->load->view('display_invoice',$data);
		$this->load->view('footer');
	}

	function add(){
		//prevent sql injection
		$this->load->library('form_validation');

		$this->form_validation->set_rules('fname','First Name','trim|required|xss_clean');
   		$this->form_validation->set_rules('lname', 'Last Name', 'trim|required|xss_clean|callback_check_database');

   		//check if data is valid
   		if($this->form_validation->run() == FALSE ){
   			echo "Error";
   		//add to database
   		} else {

			//get data
			$fname = $this->input->post('fname');
			$lname = $this->input->post('lname');
			$techID = $this->technician_model->getLowestJobId();
		
			$data = Array(
			'firstname' =>$fname,
			'lastname' =>$lname,
			'TID' => $techID
			);

			//add to client
			$result = $this->client_model->add($data);
			//update technician with the lowest jobs number
			$this->technician_model->updateJob($techID);
			if($result === 0){
				redirect(base_url()."client", 'refresh');
			} else {
				echo 'Error';
			}	
   		}		
	}


	
}

?>