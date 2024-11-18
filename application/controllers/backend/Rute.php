<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Rute extends CI_Controller {
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

	// Danh sách điểm đến/nhà ga
	public function index(){
		$data['title'] = "Danh Sách Điểm Đến/Nhà Ga"; // Việt hóa tiêu đề
		$data['tujuan'] = $this->db->query("SELECT * FROM tbl_tujuan")->result_array();
		$this->load->view('backend/tujuan', $data);
	}

	// Xem chi tiết điểm đến/nhà ga
	public function viewrute($id=''){
		$data['title'] = "Chi Tiết Điểm Đến/Nhà Ga"; // Việt hóa tiêu đề
		$data['rute'] = $this->db->query("SELECT * FROM tbl_tujuan WHERE kd_tujuan = '".$id."'")->row_array();
		$this->load->view('backend/view_tujuan', $data);
	}

	// Thêm điểm đến/nhà ga mới
	public function tambahtujuan(){
		$kode = $this->getkod_model->get_kodtuj();
		$data = array(
			'kota_tujuan' => $this->input->post('tujuan'),
			'kd_tujuan' => $kode,
			'terminal_tujuan' => $this->input->post('terminal'),
		);

		$this->db->insert('tbl_tujuan', $data);

		// Việt hóa thông báo thành công
		$this->session->set_flashdata('message', 'swal("Thành Công", "Dữ liệu đã được thêm thành công!", "success");');
		redirect('backend/rute');
	}
}

/* End of file Rute.php */
/* Location: ./application/controllers/backend/Rute.php */
