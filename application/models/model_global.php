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

class Model_global extends CI_Model {
	
	public function setting_bahasa(){
		$data = $this->db
			->where('id' , 1)
			->get('tbl_setting')
			->result_array();
		return $data[0]['isi'];
	}
	
	public function ambil_pool(){
		return $this->db->get( 'tbl_pool' )->result_array();
	}
	
	public function ambil_detail_pool( $id ){
		return $this->db->where('id' , $id)->get( 'tbl_pool' )->result_array();
	}
	
	public function ambil_jumlah_question( $id = 0 ){
		return $this->db->where('id_pool',$id)->get( 'tbl_pool_question' )->num_rows();
	}
	
	public function cek_pooling( $id_pool = 0 , $ip = "" , $cookie = "" ){
		return $this->db
			->where('id_pool',$id_pool)
			->where('ip' , $ip)
			->where('cookie' , $cookie)
			->get( 'tbl_pooler' )
			->num_rows();
	}
	
	public function ambil_pertanyaan( $id_pool = 0 ){
		return $this->db->where('id_pool',$id_pool)->get( 'tbl_pool_question' )->result_array();
	}
	
	public function ambil_jawaban( $id_question = 0 ){
		return $this->db->where('id_pool_question',$id_question)->get( 'tbl_pool_answer' )->result_array();
	}
	
	public function simpan_pooling( $ip = "" , $cookie = 0 ){
		$data = array(
			'ip'		=> $ip,
			'id_pool'	=> $this->input->post('id_pool'),
			'cookie'	=> $cookie
		);
		
		$this->db->insert('tbl_pooler',$data);
		
		$pertanyaan = $this->input->post('pertanyaan');
		$jawaban	= $this->input->post('isi');
		$i			= 1;
		foreach( $pertanyaan as $p ){
			if( is_array( $jawaban[$i] ) ){
				$jwb = implode(', ', $jawaban[$i]);
			}else{
				$jwb = $jawaban[$i];
			}
			
			$data = array(
				'id_pool_question'	=> $p,
				'answer'			=> $jwb,
				'ip'				=> $ip,
				'id_pool'			=> $this->input->post('id_pool'),
				'cookie'			=> $cookie
			);
			
			$this->db->insert('tbl_answer',$data);
			$i++;
		}
	}
	
	public function ambil_data_jawaban( $id_pool = 0 , $ip = "" , $cookie = 0 ){
		$data = $this->db
			->select('tbl_answer.answer,(SELECT question FROM tbl_pool_question WHERE id=id_pool_question) AS question')
			->where('id_pool',$id_pool)
			->where('ip',$ip)
			->where('cookie',$cookie)
			->get( 'tbl_answer' )
			->result_array();
		return $data;
	}
	
	public function ambil_answer_to_export( $id_pool = 0 ){
		$data = $this->db
		->select('tbl_answer.answer,(SELECT question FROM tbl_pool_question WHERE id=id_pool_question) AS question, (SELECT pool_name FROM tbl_pool WHERE id=id_pool) AS pool')
		->where('id_pool',$id_pool)
		->order_by('id_pool_question')
		->get( 'tbl_answer' );
		return $data;
	}
	
}