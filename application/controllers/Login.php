<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

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
        $this->load->view('admin/login');
        //$this->load->view('partials/footer');
	}

	public function check()

   {

        $this->form_validation->set_rules('password', 'Password', 'required');

        $this->form_validation->set_rules('email', 'Email', 'required|valid_email');

        if ($this->form_validation->run() == FALSE){

            $errors = validation_errors();

            echo json_encode(['error'=>$errors,'code'=>'201']);

        }else{
            /* API URL */
        $url = 'https://softonauts.com/clients/Android/users-login';
        /* Array Parameter Data */
        $fields_string='';
        $fields = array ('username' =>urlencode($this->input->post('email')),
                          'password' => urlencode($this->input->post('password')));
         foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
         rtrim($fields_string, '&');
          
        $ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MX0.By2r2BwheJsbrEGrHOaMQwrrmlY7wHVFzWtuEmv39fM'));
		$result = curl_exec($ch);
		curl_close($ch);

        }

    }

    public function dashboard()
	{
		if(empty($this->session->userdata('email'))){
		     redirect('/');
		}else{
		    $this->load->view('partials/header');
			 $this->load->view('admin/dashboard');
			 $this->load->view('partials/footer');
		}
		
	}

	public function logout()
	{
		$this->session->unset_userdata('email');
		redirect('/');
	}


}
