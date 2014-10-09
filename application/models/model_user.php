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

class Model_user extends CI_Model {
	
	public function ambil_user( $no = 0 ){
		$config['base_url'] 		= site_url('user/index');
		$config['total_rows'] 		= $this->db->get('tbl_user')->num_rows();
		$config['per_page'] 		= 10;
		$config['num_links'] 		= 2;
		$config['uri_segment'] 		= 3;
		$config['full_tag_open'] 	= '<ul class="pagination">';
		$config['full_tag_close'] 	= '</ul>';
 
		$config['first_link'] 		= '&laquo; First';
		$config['first_tag_open'] 	= '<li class="prev page">';
		$config['first_tag_close'] 	= '</li>';
 
		$config['last_link'] 		= 'Last &raquo;';
		$config['last_tag_open'] 	= '<li class="next page">';
		$config['last_tag_close'] 	= '</li>';
 
		$config['next_link'] 		= 'Next &rarr;';
		$config['next_tag_open'] 	= '<li class="next page">';
		$config['next_tag_close'] 	= '</li>';
 
		$config['prev_link'] 		= '&larr; Previous';
		$config['prev_tag_open'] 	= '<li class="prev page">';
		$config['prev_tag_close'] 	= '</li>';
 
		$config['cur_tag_open'] 	= '<li class="active"><a href="">';
		$config['cur_tag_close'] 	= '</a></li>';
 
		$config['num_tag_open'] 	= '<li class="page">';
		$config['num_tag_close'] 	= '</li>';
		$this->pagination->initialize( $config );
	
		$this->db->limit( $config['per_page'] , $no );
		return $this->db->get( 'tbl_user' )->result_array();
	}
	
	public function simpan_user( $id = 0 ){
		if( $this->input->post('password') == "" ) $password = $this->input->post('last_password');
		else $password = md5($this->input->post('password'));
		
		$data = array(
			'username'	 	=> $this->input->post('username'),
			'nama'	 		=> $this->input->post('nama'),
			'level'		 	=> $this->input->post('level'),
			'bahasa'		=> $this->input->post('bahasa'),
			'password'		=> $password,
			'is_active'		=> $this->input->post('is_active')
		);
		if( $id == 0 ){
			$this->db->insert('tbl_user',$data);
			return 'insert';
		}else{
			$this->db->where('id',$id);
			$this->db->update('tbl_user',$data);
			return 'update';
		}
	}
	
	public function ambil_detail_user( $id = 0 ){
		$this->db->where( 'id' , $id );
		return $this->db->get('tbl_user')->result_array();	
	}
	
	public function hapus_user( $id = 0 ){
		$this->db->where('id',$id);
		$this->db->delete('tbl_user');		
	}
	
	public function cek_username( $keyword = "" ){
		$this->db->where('username',$keyword);
		$cek = $this->db->get('tbl_user')->num_rows();
		
		if( $cek == 0 ) return 'true';
		else return 'false';
	}
}