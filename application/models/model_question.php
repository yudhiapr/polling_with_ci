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

class Model_question extends CI_Model {
	
	public function ambil_question( $id_pool = 0 , $no = 0 ){
		$config['base_url'] 		= site_url('question/index/'.$id_pool);
		if( $id_pool != 0 ) $this->db->where('id_pool' , $id_pool );
		$config['total_rows'] 		= $this->db->get('tbl_pool_question')->num_rows();
		$config['per_page'] 		= 10;
		$config['num_links'] 		= 2;
		$config['uri_segment'] 		= 4;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
 
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
 
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
 
		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
 
		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
 
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
 
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize( $config );
	
		$this->db->select('tbl_pool_question.*,(SELECT pool_name FROM tbl_pool WHERE id=id_pool) AS pool_name');
		if( $id_pool != 0 ) $this->db->where('id_pool' , $id_pool);
		$this->db->limit( $config['per_page'] , $no );
		$this->db->order_by( 'id_pool' , 'ASC' );
		return $this->db->get( 'tbl_pool_question' )->result_array();
	}
	
	public function ambil_data_pool(){
		return $this->db->where( 'is_active' , 1 )->get('tbl_pool')->result_array();
	}
	
	public function simpan_question( $id = 0 ){
		
		$data = array(
			'id_pool'		=> $this->input->post('id_pool'),
			'question'	 	=> $this->input->post('question'),
			'pool_type'		=> $this->input->post('pool_type'),
			'is_active'		=> $this->input->post('is_active')
		);
		if( $id == 0 ){
			$this->db->insert('tbl_pool_question',$data);
			return 'insert';
		}else{
			$this->db->where('id',$id);
			$this->db->update('tbl_pool_question',$data);
			return 'update';
		}
	}
	
	public function ambil_detail_question( $id = 0 ){
		$this->db->where( 'id' , $id );
		return $this->db->get('tbl_pool_question')->result_array();	
	}
	
	public function hapus_question( $id = 0 ){
		$this->db->where('id',$id);
		$this->db->delete('tbl_pool_question');
		
		$this->db->where_in('id_pool_question' , $id);
		$this->db->delete('tbl_pool_answer');
	}
	
	public function ambil_answer( $id_question = 0 , $no = 0 ){
		$config['base_url'] 		= site_url('question/answer/'.$id_question);
		$this->db->where('id_pool_question' , $id_question );
		$config['total_rows'] 		= $this->db->get('tbl_pool_answer')->num_rows();
		$config['per_page'] 		= 10;
		$config['num_links'] 		= 2;
		$config['uri_segment'] 		= 4;
		$config['full_tag_open'] = '<ul class="pagination">';
		$config['full_tag_close'] = '</ul>';
	
		$config['first_link'] = '&laquo; First';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';
	
		$config['last_link'] = 'Last &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';
	
		$config['next_link'] = 'Next &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';
	
		$config['prev_link'] = '&larr; Previous';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';
	
		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';
	
		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';
		$this->pagination->initialize( $config );
	
		$this->db->where('id_pool_question' , $id_question);
		$this->db->limit( $config['per_page'] , $no );
		$this->db->order_by( 'id' , 'ASC' );
		return $this->db->get( 'tbl_pool_answer' )->result_array();
	}
	
	public function simpan_answer( $id_question = 0 , $id = 0 ){
	
		$data = array(
				'id_pool_question'	=> $id_question,
				'answer'		 	=> $this->input->post('answer'),
				'is_active'			=> $this->input->post('is_active')
		);
		if( $id == 0 ){
			$this->db->insert('tbl_pool_answer',$data);
			return 'insert';
		}else{
			$this->db->where('id',$id);
			$this->db->update('tbl_pool_answer',$data);
			return 'update';
		}
	}
	
	public function ambil_detail_answer( $id = 0 ){
		$this->db->where( 'id' , $id );
		return $this->db->get('tbl_pool_answer')->result_array();
	}
	
	public function hapus_answer( $id = 0 ){
		$this->db->where('id',$id);
		$this->db->delete('tbl_pool_answer');
	}
}