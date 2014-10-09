<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/**
	 * Pooling Application for Hostinger Test
	 *
	 * Yudhi Aprianto (c) 10-2014
	 * yudhiapr@gmail.com - +6281314747969
	 * http://software.munjalindra.com
	 *
	 */
	
	// ------------------------------------------------------------------------
	
	public function index()
	{
		$this->load->view('welcome_message');
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */