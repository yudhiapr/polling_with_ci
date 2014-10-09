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

class Export extends MY_Controller{
	
	function __construct(){
		parent::__construct();
		$this->cek_login();
	}
	
	function index( $no = 0 ){
		$data 				= $this->data;
		$data['controller']	= 'export';
		$data['no']			= $no + 1;
		$data['field1']		= $this->lang->line('field_pool1');
		$data['result'] 	= $this->Model_pool->ambil_pool( $no );
		$this->load->view('header' , $data);
     	$this->load->view('export/index');
		$this->load->view('footer');
	}
	

	function csv( $id_pool = 0 ){
		$data 				= $this->data;
		$i=0;
		$data[0] 		= array('No', $data['menu1'], $data['menu2'], $data['menu7']);
		
		$list 			= $this->Model_global->ambil_answer_to_export( $id_pool );
		foreach ($list->result() as $row) {
			$data[++$i] = array($i, $row->pool, $row->question, $row->answer );
		}
		$this->load->helper('csv');
		echo array_to_csv($data,'report.csv');
		die();
	}
	
	
}