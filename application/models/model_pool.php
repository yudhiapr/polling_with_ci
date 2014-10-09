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

class Model_pool extends CI_Model {
	
	public function ambil_pool( $no = 0 ){
		$config['base_url'] 		= site_url('pool/index');
		$config['total_rows'] 		= $this->db->get('tbl_pool')->num_rows();
		$config['per_page'] 		= 10;
		$config['num_links'] 		= 2;
		$config['uri_segment'] 		= 3;
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
	
		$this->db->limit( $config['per_page'] , $no );
		return $this->db->get( 'tbl_pool' )->result_array();
	}
	
	public function simpan_pool( $id = 0 ){
		
		$data = array(
			'pool_name'	 	=> $this->input->post('pool_name'),
			'is_active'		=> $this->input->post('is_active')
		);
		if( $id == 0 ){
			$this->db->insert('tbl_pool',$data);
			return 'insert';
		}else{
			$this->db->where('id',$id);
			$this->db->update('tbl_pool',$data);
			return 'update';
		}
	}
	
	public function ambil_detail_pool( $id = 0 ){
		$this->db->where( 'id' , $id );
		return $this->db->get('tbl_pool')->result_array();	
	}
	
	public function hapus_pool( $id = 0 ){
		$this->db->where('id',$id);
		$this->db->delete('tbl_pool');
		
		$this->db->where_in('id_pool' , $id);
		$this->db->delete('tbl_pool_question');
	}
}