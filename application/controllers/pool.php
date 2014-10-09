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

class Pool extends MY_Controller{
	
	function __construct(){
		parent::__construct();
		$this->cek_login();
	}
	
	function index( $no = 0 ){
		$data 				= $this->data;
		$data['controller']	= 'pool';
		$data['no']			= $no + 1;
		$data['field1']		= $this->lang->line('field_pool1');
		$data['result'] 	= $this->Model_pool->ambil_pool( $no );
		$this->load->view('header' , $data);
     	$this->load->view('pool/index');
		$this->load->view('footer');
	}
	
	function tambah_pool(){
		$data	= $this->data;
		
		$data['pool_name']	= "";
		$data['is_active']	= "";
		$data['controller']	= 'pool';
		$data['field1']		= $this->lang->line('field_pool1');
		$data['aksi']		= $data['btn_add'];
		$data['aksi_post']	= site_url('pool/simpan_pool');
	
		$this->load->view('header' , $data);
     	$this->load->view('pool/form');
		$this->load->view('footer');
	}
	
	function edit_pool( $id = 0 ){
		$data	= $this->data;
		
		$result				= $this->Model_pool->ambil_detail_pool( $id );
		$data['pool_name']	= $result[0]['pool_name'];
		$data['is_active']	= $result[0]['is_active'];
		$data['controller']	= 'pool';
		$data['field1']		= $this->lang->line('field_pool1');
		$data['aksi']		= $data['btn_edit'];
		$data['aksi_post']	= site_url('pool/simpan_pool/'.$id);
	
		$this->load->view('header' , $data);
     	$this->load->view('pool/form');
		$this->load->view('footer');
	}
	
	function simpan_pool( $id = 0 ){
		$aksi = $this->Model_pool->simpan_pool( $id );
		if( $aksi == "insert" ) $alert = $this->lang->line('insert_success');
		else $alert = $this->lang->line('update_success');
		$this->session->set_flashdata('message','<div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  '.$alert.'
                        </div>');
		redirect('pool/index');
	}
	
	function hapus_pool( $id = 0 ){
		$this->Model_pool->hapus_pool( $id );
		$this->session->set_flashdata('message','<div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  '.$this->lang->line('delete_success').'
                        </div>');
		redirect('pool/index');
	}

}