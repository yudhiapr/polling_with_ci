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

class Verifylogin extends CI_Controller {

 	function __construct(){
   		parent::__construct();
	 	date_default_timezone_set('Asia/Jakarta');
	 	$this->load->model('Model_global');
   		$bahasa	= $this->Model_global->setting_bahasa();
   		$this->load->language('pool',$bahasa);
	 	
 	}

 	function index(){
   		//Aksi untuk melakukan validasi
   		$this->load->library('form_validation');

   		$this->form_validation->set_rules('username', 'Username', 'trim|required|xss_clean');
   		$this->form_validation->set_rules('password', 'Password', 'trim|required|xss_clean|callback_check_database');

   		if($this->form_validation->run() == FALSE){
     		//Jika validasi gagal user akan diarahkan kembali ke halaman login
     		$data['title']		= $this->lang->line('login_title');
   			$data['subtitle']	= $this->lang->line('login_sub_title');
   			$data['btn']		= $this->lang->line('login_btn');
      		$this->load->view('login',$data);
   		}else{
	     	//Jika berhasil user akan di arahkan ke private area 
   			redirect('pool/index', 'refresh');
   		}

 	}

 	function check_database($password){
   		//validasi field terhadap database 
   		$username = $this->input->post('username');

   		//query ke database
		$this->db->where('username',$username);
		$this->db->where('password',md5($password));
   		$result = $this->db->get('tbl_user')->result();

   		if($result){
     		$sess_array = array();
     		foreach($result as $row){
       			$sess_array = array(
         			'id' => $row->id,
         			'nama' => $row->nama,
					'level' => $row->level
       			);
       			$this->session->set_userdata('logged_in', $sess_array);
     		}
     		return TRUE;
   		}else{
	    	$this->form_validation->set_message('check_database', $this->lang->line('login_msg_error') );
    		return false;
   		}
 	}
}