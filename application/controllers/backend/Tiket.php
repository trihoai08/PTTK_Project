<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Tiket extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		date_default_timezone_set("Asia/Ho_Chi_Minh"); // Đổi múi giờ sang Việt Nam
	}

	// Bảo mật truy cập
	function getsecurity($value=''){
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('backend/login');
		}
	}

	// Danh sách vé
	public function index(){
		$data['title'] = "Danh Sách Vé"; // Việt hóa tiêu đề
		$data['tiket'] = $this->db->query("SELECT * FROM tbl_tiket WHERE status_tiket = 2")->result_array();
		$this->load->view('backend/tiket', $data);	
	}

	// Xem chi tiết vé
	public function viewtiket($tiket){
		$data['title'] = "Chi Tiết Vé"; // Việt hóa tiêu đề
		$data['tiket'] = $this->db->query("SELECT * FROM tbl_tiket WHERE kd_tiket = '".$tiket."'")->row_array();
		if ($data['tiket']) {
			$this->load->view('backend/view_tiket', $data);
		} else {
			// Việt hóa thông báo lỗi
			$this->session->set_flashdata('message', 'swal("Rỗng", "Không có vé nào!", "error");');
    		redirect('backend/tiket');
		}	
	}
}

/* End of file Tiket.php */
/* Location: ./application/controllers/backend/Tiket.php */
