<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Manual extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		//menu active
		$data=array(	
			'pendaftaran_active' 	=> 'class=""',
			'panduanpendaftaran_active' 	=> 'class="active"'
			);
		//title head
		$data['title']='Manual PSB | MAU-MBI Amanatul Ummah Surabaya';
		
		$this->load->view('calonsiswa/v_manual', $data);

	}


}