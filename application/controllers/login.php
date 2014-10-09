<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Pooling Application for Hostinger Test
 *
 * Yudhi Aprianto (c) 10-2014
 * yudhiapr@gmail.com - +6281314747969
 * http://software.munjalindra.com
 *
 */

// ------------------------------------------------------------------------

class Login extends CI_Controller {

 	function __construct(){
   		parent::__construct();
   		$this->load->model('Model_global');
   		$bahasa	= $this->Model_global->setting_bahasa();
   		$this->load->language('pool',$bahasa);
 	}

 	function index(){
		$cek = $this->session->userdata('logged_in');
   		if(!empty($cek)){
     		redirect('pool/index', 'refresh');
   		}else{
   			$data['title']		= $this->lang->line('login_title');
   			$data['subtitle']	= $this->lang->line('login_sub_title');
   			$data['btn']		= $this->lang->line('login_btn');
      		$this->load->view('login',$data);
   		}
 	}

}
