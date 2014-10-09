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

class Question extends MY_Controller{
	
	function __construct(){
		parent::__construct();
		$this->cek_login();
	}
	
	function index( $id_pool = 0 , $no = 0 ){
		$data 				= $this->data;
		$data['controller']	= 'question';
		$data['no']			= $no + 1;
		$data['field1']		= $this->lang->line('field_question1');
		$data['field2']		= $this->lang->line('field_question2');
		$data['field3']		= $this->lang->line('field_question3');
		$data['pool']		= $this->Model_question->ambil_data_pool();
		$data['id_pool']	= $id_pool;
		$data['result'] 	= $this->Model_question->ambil_question( $id_pool , $no );
		$this->load->view('header' , $data);
     	$this->load->view('question/question/index');
		$this->load->view('footer');
	}
	
	function tambah_question( $id_pool = 0 ){
		$data	= $this->data;
		
		$data['pool']		= $this->Model_question->ambil_data_pool();
		$data['id_pool']	= $id_pool;
		$data['question']	= "";
		$data['pool_type']	= "";
		$data['is_active']	= "";
		$data['controller']	= 'question';
		$data['field1']		= $this->lang->line('field_question1');
		$data['field2']		= $this->lang->line('field_question2');
		$data['field3']		= $this->lang->line('field_question3');
		$data['aksi']		= $data['btn_add'];
		$data['aksi_post']	= site_url('question/simpan_question');
	
		$this->load->view('header' , $data);
     	$this->load->view('question/question/form');
		$this->load->view('footer');
	}
	
	function edit_question( $id = 0 ){
		$data	= $this->data;
		
		$data['pool']		= $this->Model_question->ambil_data_pool();
		$result				= $this->Model_question->ambil_detail_question( $id );
		$data['id_pool']	= $result[0]['id_pool'];
		$data['question']	= $result[0]['question'];
		$data['pool_type']	= $result[0]['pool_type'];
		$data['is_active']	= $result[0]['is_active'];
		$data['controller']	= 'question';
		$data['field1']		= $this->lang->line('field_question1');
		$data['field2']		= $this->lang->line('field_question2');
		$data['field3']		= $this->lang->line('field_question3');
		$data['aksi']		= $data['btn_edit'];
		$data['aksi_post']	= site_url('question/simpan_question/'.$id);
	
		$this->load->view('header' , $data);
     	$this->load->view('question/question/form');
		$this->load->view('footer');
	}
	
	function simpan_question( $id = 0 ){
		$aksi = $this->Model_question->simpan_question( $id );
		if( $aksi == "insert" ) $alert = $this->lang->line('insert_success');
		else $alert = $this->lang->line('update_success');
		$this->session->set_flashdata('message','<div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  '.$alert.'
                        </div>');
		redirect('question/index/'.$this->input->post('id_pool'));
	}
	
	function hapus_question( $id = 0 ){
		$this->Model_question->hapus_question( $id );
		$this->session->set_flashdata('message','<div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  '.$this->lang->line('delete_success').'
                        </div>');
		redirect('question/index');
	}
	
	function answer( $id_question = 0 , $no = 0 ){
		$data 					= $this->data;
		$data['controller']		= 'question';
		$data['no']				= $no + 1;
		$data['field1']			= $this->lang->line('field_answer1');
		$data['question_word']	= $this->lang->line('question_word');
		$data['pool']			= $this->Model_question->ambil_data_pool();
		$data['id_question']	= $id_question;
		$data['result'] 		= $this->Model_question->ambil_answer( $id_question , $no );
		$question				= $this->Model_question->ambil_detail_question( $id_question );
		$data['question']		= $question[0]['question'];
		
		$this->load->view('header' , $data);
		$this->load->view('question/answer/index');
		$this->load->view('footer');
	}
	
	function tambah_answer( $id_question = 0 ){
		$data	= $this->data;
	
		$question				= $this->Model_question->ambil_detail_question( $id_question );
		$data['question']		= $question[0]['question'];
		$data['id_question']	= $id_question;
		$data['answer']			= "";
		$data['is_active']		= "";
		$data['controller']		= 'question';
		$data['field1']			= $this->lang->line('field_answer1');
		$data['question_word']	= $this->lang->line('question_word');
		$data['aksi']			= $data['btn_add'];
		$data['aksi_post']		= site_url('question/simpan_answer/'.$id_question);
	
		$this->load->view('header' , $data);
		$this->load->view('question/answer/form');
		$this->load->view('footer');
	}
	
	function edit_answer( $id = 0 ){
		$data	= $this->data;
	
		$result					= $this->Model_question->ambil_detail_answer( $id );
		$question				= $this->Model_question->ambil_detail_question( $result[0]['id_pool_question'] );
		$data['question']		= $question[0]['question'];
		$data['id_question']	= $result[0]['id_pool_question'];
		$data['answer']			= $result[0]['answer'];
		$data['is_active']		= $result[0]['is_active'];
		$data['controller']		= 'question';
		$data['field1']			= $this->lang->line('field_answer1');
		$data['question_word']	= $this->lang->line('question_word');
		$data['aksi']			= $data['btn_edit'];
		$data['aksi_post']		= site_url('question/simpan_answer/'.$result[0]['id_pool_question'].'/'.$id);
	
		$this->load->view('header' , $data);
		$this->load->view('question/answer/form');
		$this->load->view('footer');
	}
	
	function simpan_answer( $id_question = 0 , $id = 0 ){
		$aksi = $this->Model_question->simpan_answer( $id_question , $id );
		if( $aksi == "insert" ) $alert = $this->lang->line('insert_success');
		else $alert = $this->lang->line('update_success');
		$this->session->set_flashdata('message','<div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  '.$alert.'
                        </div>');
		redirect('question/answer/'.$id_question);
	}
	
	function hapus_answer( $id_question , $id = 0 ){
		$this->Model_question->hapus_answer( $id );
		$this->session->set_flashdata('message','<div class="alert alert-info alert-dismissable">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <i class="fa fa-info-circle"></i>  '.$this->lang->line('delete_success').'
                        </div>');
		redirect('question/answer/'.$id_question);
	}

}