<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * Pooling Application for Hostinger Test
 *
 * Yudhi Aprianto (c) 10-2014
 * yudhiapr@gmail.com - +6281314747969
 * http://software.munjalindra.com
 *
 */

// ------------------------------------------------------------------------

class Setting extends MY_Controller{
	
	function __construct(){
		parent::__construct();
		$this->cek_login();
	}
	
	function index(){
		$data 				= $this->data;
		$data['controller']	= 'setting';
		
		$data['bahasa']		= $this->direktori();
		$data['isi_bahasa'] = $this->Model_setting->ambil_isi_setting( 1 );

		$this->load->view('header' , $data);
     	$this->load->view('setting/index');
		$this->load->view('footer');
	}
	
	function simpan_setting(){
		$aksi = $this->Model_setting->simpan_setting();
		$alert = $this->lang->line('update_success');
		$this->session->set_flashdata('message','<div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  '.$alert.'
                        </div>');
		redirect('setting/index');
	}
	
}