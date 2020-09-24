<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Drop_in_center extends CI_Controller {

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
		
		$data['curl_response']=$this->curl_result();
		$this->load->view('partials/header');
        $this->load->view('admin/kit_request',$data);
        $this->load->view('partials/footer');
	}

	public function curl_result()
	{
		 /* API URL */
        $url = 'https://softonauts.com/clients/Android/get-drop-in-navigator-list';
        /* Array Parameter Data */
        $fields_string='';
        $fields = array ('user_id' =>urlencode($this->session->userdata('user_id')));
         foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
         rtrim($fields_string, '&');
          
        $ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MX0.By2r2BwheJsbrEGrHOaMQwrrmlY7wHVFzWtuEmv39fM'));
		curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
		$result = curl_exec($ch);
		curl_close($ch);
		$result=json_decode($result);
		$response = (array) $result;
		//print_r($response);;exit;
		return $response;
	}

	public function slots()
	{
		 /* API URL */
       $url = 'https://softonauts.com/clients/Android/get-time-slots';
        /* Array Parameter Data */
        $fields_string='';
        $fields = array ('location_id' =>urlencode($this->input->post('location_id')));
         foreach($fields as $key=>$value) { $fields_string .= $key.'='.$value.'&'; }
         rtrim($fields_string, '&');
          
        $ch = curl_init();
		curl_setopt($ch,CURLOPT_URL, $url);
		curl_setopt($ch,CURLOPT_POST, count($fields));
		curl_setopt($ch,CURLOPT_POSTFIELDS, $fields_string);
		curl_setopt($ch, CURLOPT_HTTPHEADER, array('Authorization:eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpZCI6MX0.By2r2BwheJsbrEGrHOaMQwrrmlY7wHVFzWtuEmv39fM'));
		//curl_setopt($ch,CURLOPT_RETURNTRANSFER,TRUE);
		$result = curl_exec($ch);
		curl_close($ch);
		// $result=json_decode($result);
		// $response = (array) $result;
		// print_r($response);;exit;
		//return $response;
	}

	public function appointment_details()
	{
		
		$this->load->view('partials/header');
        $this->load->view('admin/appointment_details');
        $this->load->view('partials/footer');
	}


}
