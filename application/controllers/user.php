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

class User extends MY_Controller{
	
	function __construct(){
		parent::__construct();
		$this->cek_login();
	}
	
	function index( $no = 0 ){
		$data 				= $this->data;
		$data['controller']	= 'user';
		$data['no']			= $no + 1;
		$data['field1']		= $this->lang->line('field_user1');
		$data['field2']		= $this->lang->line('field_user2');
		$data['field3']		= $this->lang->line('field_user4');
		$data['result'] 	= $this->Model_user->ambil_user( $no );
		$this->load->view('header' , $data);
     	$this->load->view('user/index');
		$this->load->view('footer');
	}
	
	function tambah_user(){
		$data	= $this->data;
		
		$data['language']	= $this->direktori();
		$data['username']	= "";
		$data['nama']		= "";
		$data['password']	= "";
		$data['level']		= "";
		$data['is_active']	= "";
		$data['bahasa']		= "";
		$data['controller']	= 'user';
		$data['field1']		= $this->lang->line('field_user1');
		$data['field2']		= $this->lang->line('field_user2');
		$data['field3']		= $this->lang->line('field_user3');
		$data['field4']		= $this->lang->line('field_user4');
		$data['aksi']		= $data['btn_add'];
		$data['aksi_post']	= site_url('user/simpan_user');
		$data['alert']		= "";
		$data['readonly']	= '';
		$data['cek_username'] = 'false';
	
		$this->load->view('header' , $data);
     	$this->load->view('user/form');
		$this->load->view('footer');
	}
	
	function edit_user( $id = 0 ){
		$data	= $this->data;
		
		$data['language']	= $this->direktori();
		$result				= $this->Model_user->ambil_detail_user( $id );
		$data['username']	= $result[0]['username'];
		$data['nama']		= $result[0]['nama'];
		$data['password']	= $result[0]['password'];
		$data['level']		= $result[0]['level'];
		$data['bahasa']		= $result[0]['bahasa'];
		$data['is_active']	= $result[0]['is_active'];
		$data['controller']	= 'user';
		$data['field1']		= $this->lang->line('field_user1');
		$data['field2']		= $this->lang->line('field_user2');
		$data['field3']		= $this->lang->line('field_user3');
		$data['field4']		= $this->lang->line('field_user4');
		$data['aksi']		= $data['btn_edit'];
		$data['aksi_post']	= site_url('user/simpan_user/'.$id);
		$data['alert']		= $this->lang->line('pass_change_word');
		$data['readonly']	= ' readonly="readonly"';
		$data['cek_username'] = 'true';
	
		$this->load->view('header' , $data);
     	$this->load->view('user/form');
		$this->load->view('footer');
	}
	
	function simpan_user( $id = 0 ){
		$aksi = $this->Model_user->simpan_user( $id );
		if( $aksi == "insert" ) $alert = $this->lang->line('insert_success');
		else $alert = $this->lang->line('update_success');
		$this->session->set_flashdata('message','<div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  '.$alert.'
                        </div>');
		redirect('user/index');
	}
	
	function cek_username( $keyword = "" ){
		echo $this->Model_user->cek_username( $keyword );
	}
	
	function hapus_user( $id = 0 ){
		$this->Model_user->hapus_user( $id );
		$this->session->set_flashdata('message','<div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  '.$this->lang->line('delete_success').'
                        </div>');
		redirect('user/index');
	}

}