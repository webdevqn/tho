<!-- http://tutsnare.com/creating-a-layout-in-codeigniter/ -->
<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class MY_Controller extends CI_Controller 
{ 
  protected $template = array();
   //Load layout    
  public function setPage($page, $data) {      
    $this->template['content'] = $this->load->view($page, $data, true);
    $this->load->view('main_layout', $this->template);
  }
}