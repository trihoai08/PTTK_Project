<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pelanggan extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		date_default_timezone_set("Asia/Ho_Chi_Minh"); // Đổi múi giờ sang Việt Nam
	}

	// Bảo mật truy cập
	function getsecurity($value=''){
		$username = $this->session->userdata('level');
		if ($username == '2') {
			$this->session->sess_destroy();
			redirect('backend/home');
		}
	}

	// Danh sách khách hàng
	public function index(){
		$data['title'] = "Danh Sách Khách Hàng"; // Việt hóa tiêu đề
		$data['pelanggan'] = $this->db->query("SELECT * FROM tbl_pelanggan")->result_array();
		$this->load->view('backend/pelanggan', $data);
	}
}

/* End of file Pelanggan.php */
/* Location: ./application/controllers/backend/Pelanggan.php */
