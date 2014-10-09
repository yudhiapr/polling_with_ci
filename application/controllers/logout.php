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
class Logout extends CI_Controller {

	function __construct(){
		parent::__construct();
	 	date_default_timezone_set('Asia/Jakarta');
	}

	function index(){
   		$this->session->unset_userdata('logged_in');
   		$this->session->unset_userdata('session_proker');
   		$this->session->unset_userdata('session_chart');
   		redirect('login', 'refresh');
 	}
		
}

?>