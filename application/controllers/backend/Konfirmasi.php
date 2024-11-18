<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Konfirmasi extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		date_default_timezone_set("Asia/Ho_Chi_Minh"); // Đổi múi giờ sang Việt Nam
	}

	function getsecurity($value=''){
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('backend/login');
		}
	}

	// Danh sách xác nhận thanh toán
	public function index(){
		$data['title'] = "Danh Sách Xác Nhận"; // Việt hóa tiêu đề
		$data['konfirmasi'] = $this->db->query("SELECT * FROM tbl_konfirmasi group by kd_konfirmasi")->result_array();
		$this->load->view('backend/konfirmasi', $data);	
	}

	// Xem chi tiết xác nhận thanh toán
	public function viewkonfirmasi($id=''){
		$sqlcek = $this->db->query("SELECT * FROM tbl_konfirmasi WHERE kd_order ='".$id."'")->result_array();
		$data['title'] = "Chi Tiết Xác Nhận"; // Việt hóa tiêu đề
		if ($sqlcek == NULL) {
			// Việt hóa thông báo khi chưa có thông tin thanh toán
	 		$this->session->set_flashdata('message', 'swal("Rỗng", "Thông tin thanh toán chưa được nhận!", "error");');
			redirect('backend/order/vieworder/'.$id);
		} else {		
			$data['konfirmasi'] = $sqlcek;
	 		$this->load->view('backend/view_konfirmasi', $data);
		}
	}
}

/* End of file Konfirmasi.php */
/* Location: ./application/controllers/backend/Konfirmasi.php */
