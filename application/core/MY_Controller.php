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

class MY_Controller extends CI_Controller{
	
	public $data;
	public $menubar;
		
	public function __construct(){
		parent::__construct();
		date_default_timezone_set('Asia/Jakarta');
		$this->load->helper('cookie');
		$this->load->model('Model_global');
		$this->load->model('Model_pool');
		$this->load->model('Model_question');
		$this->load->model('Model_user');
		$this->load->model('Model_setting');
		
   		$sess 			= $this->session->userdata('logged_in');
   		$ambil_bahasa	= $this->Model_user->ambil_detail_user( $sess['id'] );
   		$bahasa			= $ambil_bahasa[0]['bahasa'];
   		$this->load->language('pool',$bahasa);
   		 
		$session 	= array(
			'user_nama'			=> $sess['nama'],
			'user_level'		=> $sess['level'],
			'logout_word'		=> $this->lang->line('logout'),
			'menu1'				=> $this->lang->line('menu1'),
			'menu2'				=> $this->lang->line('menu2'),
			'menu3'				=> $this->lang->line('menu3'),
			'menu4'				=> $this->lang->line('menu4'),
			'menu5'				=> $this->lang->line('menu5'),
			'menu6'				=> $this->lang->line('menu6'),
			'menu7'				=> $this->lang->line('menu7'),
			'field_is_active'	=> $this->lang->line('field_is_active'),
			'field_action'		=> $this->lang->line('field_action'),
			'msg_error1'		=> $this->lang->line('msg_error1'),
			'msg_error2'		=> $this->lang->line('msg_error2'),
			'btn_add'			=> $this->lang->line('btn_add'),
			'btn_edit'			=> $this->lang->line('btn_edit'),
			'btn_delete'		=> $this->lang->line('btn_delete'),
			'btn_submit'		=> $this->lang->line('btn_submit'),
			'btn_cancel'		=> $this->lang->line('btn_cancel'),
			'is_active_yes'		=> $this->lang->line('is_active_yes'),
			'is_active_no'		=> $this->lang->line('is_active_no'),
			'delete_msg'		=> $this->lang->line('delete_msg')
		);
		$this->data = $session;
		
	}
	
	public function cek_login(){
		if( $this->session->userdata('logged_in') ){
			return $this->session->userdata('logged_in');
		}else{
			redirect('login', 'refresh');
		}
	}
	
	function direktori( $folder = "" ){
		$dir    = getcwd().'/application/language'.$folder;
		$files 	= scandir($dir);
	
		$data = array();
		foreach( $files as $f ){
			if( ( $f != "." ) && ( $f != ".." ) && ( $f != "index.html" ) ) $data[] = $f;
		}
		return $data;
	}
	
}