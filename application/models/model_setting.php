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

class Model_setting extends CI_Model {
	
	public function ambil_isi_setting( $id = 0 ){
		$data = $this->db
			->where('id' , $id)
			->get('tbl_setting')
			->result_array();
		return $data[0]['isi'];
	}
	
	public function simpan_setting(){
		$data = array(
			'isi'	=> $this->input->post('bahasa')
		);
		
		$this->db->where('id' , 1)->update('tbl_setting' , $data);
	}
}