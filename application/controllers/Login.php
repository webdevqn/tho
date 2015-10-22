<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function index()
	{
        $data['test'] = 1234;
		$this->load->view('Login_view', $data);
	}
}
