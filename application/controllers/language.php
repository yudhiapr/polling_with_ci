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

class Language extends MY_Controller{
	
	function __construct(){
		parent::__construct();
		$this->cek_login();
	}
	
	function index( $bahasa = "" ){
		$data 				= $this->data;
		$data['controller']	= 'language';
		
		$data['bahasa']		= $this->direktori();
		$data['file']		= array();
		$data['bahasa_s']	= $bahasa;
		if( $bahasa != "" ) $data['file'] 		= $this->direktori( '/'.$bahasa );
		$this->load->view('header' , $data);
     	$this->load->view('language/index');
		$this->load->view('footer');
	}
	
	function simpan_bahasa( $id = 0 ){
		$this->load->helper('directory');
		
		$srcdir=rtrim(getcwd().'\application\language\english','/');
		$dstdir=rtrim(getcwd().'\application\language/'.$this->input->post('bahasa'),'/');
		
		if(!is_dir($dstdir))mkdir($dstdir, 0777, true);
		
		$dir_map=directory_map($srcdir);
		
		foreach($dir_map as $object_key=>$object_value){
			if(is_numeric($object_key))
				copy($srcdir.'/'.$object_value,$dstdir.'/'.$object_value);//This is a File not a directory
			else
				copy($srcdir.'/'.$object_key,$dstdir.'/'.$object_key);//this is a directory
		}
		
		$alert = $this->lang->line('insert_success');
		$this->session->set_flashdata('message','<div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  '.$alert.'
                        </div>');
		redirect('language/index');
	}
	
	function edit_file( $bahasa = "" , $file = "" ){
		$data 				= $this->data;
		$data['controller']	= 'language';
		
		$file_location			= 'application/language/'.$bahasa.'/'.$file;
	
		$data['isi_file']		= file_get_contents($file_location);
		$data['bahasa']			= $bahasa;
		$data['file']			= $file;
		$data['aksi_post']		= site_url('language/simpan_file/'.$bahasa.'/'.$file);

		$this->load->view('header' , $data);
		$this->load->view('language/form');
		$this->load->view('footer');
	}
	
	function simpan_file( $bahasa = "" , $file = "" ){
		$namafile = 'application/language/'.$bahasa.'/'.$file;
		$handle = fopen ($namafile, "w");
		if($handle) {
			fwrite ( $handle, $this->input->post('isi_file') );
		}
		fclose($handle);
		$alert = $this->lang->line('update_success');
		$this->session->set_flashdata('message','<div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  '.$alert.'
                        </div>');
		redirect('language/index/'.$bahasa);
	}

}