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

class Pooling extends CI_Controller{
	
	function __construct(){
		parent::__construct();
		$this->load->model('Model_global');
   		$bahasa	= $this->Model_global->setting_bahasa();
   		$this->load->language('pool',$bahasa);
	}
	
	function index( $id = 0 ){
		$ip		= $_SERVER['REMOTE_ADDR'];
		if( !$this->input->cookie('pooling_cookie') ){
			$cookie = array(
					'name'   => 'pooling_cookie',
					'value'  => rand(0, 9999),
					'expire' => '86500'
			);
			$this->input->set_cookie( $cookie );
		}
		$c = $this->input->cookie('pooling_cookie');
		if( $id == 0 ){
			$data['result'] = "";
		}else{
			$data['result'] = $this->Model_global->ambil_data_jawaban($id , $ip , $c);
		}
		$data['controller']	= 'pool';
		$data['page']		= $this->lang->line('page');
		$data['category']	= $this->lang->line('category');
		$data['menu2']		= $this->lang->line('menu2');
		$data['menu7']		= $this->lang->line('menu7');
		$data['pool']		= $this->Model_global->ambil_pool();
		foreach( $data['pool'] as $p ){
			$data['jml'][$p['id']] = $this->Model_global->ambil_jumlah_question( $p['id'] );
		}
		
		$this->load->view('front/header' , $data);
     	$this->load->view('front/index');
		$this->load->view('front/footer');
	}
	
	function pool( $id = 0 ){
		if( !$this->input->cookie('pooling_cookie') ){
			$cookie = array(
					'name'   => 'pooling_cookie',
					'value'  => rand(0, 9999),
					'expire' => '86500'
			);
			$this->input->set_cookie( $cookie );
		}
		$c = $this->input->cookie('pooling_cookie');

		$ip		= $_SERVER['REMOTE_ADDR'];
		$cek	= $this->Model_global->cek_pooling( $id , $ip , $c );
		$data['page']			= $this->Model_global->ambil_detail_pool($id);
		$data['pertanyaan']		= $this->Model_global->ambil_pertanyaan($id);
		$data['id_pool']		= $id;
		$data['btn_submit']		= $this->lang->line('btn_submit');
		if( $cek != 0 ){
			$this->session->set_flashdata('message','<div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  '.$this->lang->line('alert_pooling').' '.$data['page'][0]['pool_name'].'
                        </div>');
			redirect( 'pooling/index/'.$id );
		}
		
		foreach( $data['pertanyaan'] as $p ){
			$data['jawaban'][$p['id']] = $this->Model_global->ambil_jawaban($p['id']);
		}
		$this->load->view('front/header' , $data);
		$this->load->view('front/pooling');
		$this->load->view('front/footer');
	}
	
	function simpan_pooling(){
		$ip		= $_SERVER['REMOTE_ADDR'];
		$c = $this->input->cookie('pooling_cookie');
		$this->Model_global->simpan_pooling( $ip , $c );
		redirect( 'pooling' );
	}

}