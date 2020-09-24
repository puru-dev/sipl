<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//$this->load->view('partials/header');
        $this->load->view('admin/register');
        //$this->load->view('partials/footer');
	}

	public function insert()

   {
        $this->form_validation->set_rules('fullname', 'Fullname', 'required|callback_space_check');
        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|min_length[5]');

        if ($this->form_validation->run() == FALSE){

            $errors = validation_errors();

            echo json_encode(['error'=>$errors,'code'=>'201']);

        }else{
            /* API URL */
        $url = 'https://softonauts.com/clients/Android/register-user';
        /* Array Parameter Data */
        $fields_string='';
        list($firstname,$lastname) = explode(' ', $this->input->post('fullname'));
        $fields = array ('first_name' =>urlencode($firstname),
                         'middle_name' => 'c',
                         'last_name' => urlencode($lastname),
                         'dob' => '09/09/2020',
                         'gender' => 'Male',
                         'contact_number' =>'7698769878',
                         'email' => urlencode($this->input->post('email')),
                         'address_one' => '1866 Deer Ridge Drive',
                         'address_two' => 'abc',
                         'city'=> 'Piscataway',
						 'state'=> 'NJ',
						 'zipcode'=> '08854',
						 'password'=> urlencode($this->input->post('password')),
						  'login_type'=> 'internal',
						  'ssn_digits'=> '4554' 
                     );
        
         foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
         rtrim($fields_string, '&');
          
        $ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MX0.By2r2BwheJsbrEGrHOaMQwrrmlY7wHVFzWtuEmv39fM'));
		$result = curl_exec($ch);
		curl_close($ch);
		//echo $result;
        }

    }

    public function space_check($str) {
	   $pos = strrpos($str, " ");
	   if ($pos === false) { // note: three equal signs
	    // not found...
	    $this->form_validation->set_message('space_check', 'The %s field can not contain SPACE BTW First name and Last Name');
	    return FALSE;
	  }
	  else  {
	    return true;
	  }
	}
}
