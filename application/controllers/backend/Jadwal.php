<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Jadwal extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		$this->load->library('form_validation');
		date_default_timezone_set("Asia/Ho_Chi_Minh"); // Đổi múi giờ sang Việt Nam
	}

	function getsecurity($value=''){
		$username = $this->session->userdata('username_admin');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('backend/login');
		}
	}

	// Quản lý lịch trình
	public function index(){
		$data['title'] = "Quản Lý Lịch Trình"; // Việt hóa tiêu đề
		$data['jadwal'] = $this->db->query("
			SELECT * FROM tbl_jadwal 
			LEFT JOIN tbl_bus on tbl_jadwal.kd_bus = tbl_bus.kd_bus 
			LEFT JOIN tbl_tujuan on tbl_jadwal.kd_asal = tbl_tujuan.kd_tujuan
		")->result_array();
		$this->load->view('backend/jadwal', $data);
	}

	// Hiển thị trang thêm lịch trình
	public function viewtambahjadwal($value=''){
		$data['title'] = "Thêm Lịch Trình"; // Việt hóa tiêu đề
		$data['bus'] = $this->db->query("SELECT * FROM tbl_bus ORDER BY nama_bus asc")->result_array();
		$data['tujuan'] = $this->db->query("SELECT * FROM tbl_tujuan ORDER BY kota_tujuan asc")->result_array();
		$this->load->view('backend/tambahjadwal', $data);
	}

	// Thêm lịch trình mới
	public function tambahjadwal(){
		$this->form_validation->set_rules('tujuan', 'Điểm Đến', 'trim|required|min_length[5]|max_length[12]');
		if ($this->form_validation->run() ==  FALSE) {
			$data['title'] = "Thêm Lịch Trình"; // Việt hóa tiêu đề
			$data['bus'] = $this->db->query("SELECT * FROM tbl_bus ORDER BY nama_bus asc")->result_array();
			$data['tujuan'] = $this->db->query("SELECT * FROM tbl_tujuan ORDER BY kota_tujuan asc")->result_array();
			$this->load->view('backend/tambahjadwal', $data);
		} else {
			$asal = $this->input->post('asal');
			$tujuan = $this->db->query("SELECT * FROM tbl_tujuan
               WHERE kd_tujuan ='".$this->input->post('tujuan')."'")->row_array();
			if ($asal == $tujuan['kd_tujuan']) {
				$this->session->set_flashdata('message', 'swal("Lỗi", "Điểm xuất phát và điểm đến không được trùng nhau", "error");'); // Việt hóa thông báo
				redirect('backend/jadwal');
			} else {
				$kode = $this->getkod_model->get_kodjad();
				$simpan = array(
					'kd_jadwal' => $kode,
					'kd_asal' => $asal,
					'kd_tujuan' => $tujuan['kd_tujuan'],
					'kd_bus' => $this->input->post('bus'),
					'wilayah_jadwal' => $tujuan['kota_tujuan'],
					'jam_berangkat_jadwal' => $this->input->post('berangkat'),
					'jam_tiba_jadwal' => $this->input->post('tiba'),
					'harga_jadwal' =>  $this->input->post('harga'),
				);
				$this->db->insert('tbl_jadwal', $simpan);
				$this->session->set_flashdata('message', 'swal("Thành Công", "Lịch trình mới đã được thêm!", "success");'); // Việt hóa thông báo
				redirect('backend/jadwal');
			}
		}
	}

	// Xem chi tiết lịch trình
	public function viewjadwal($id=''){
		$data['title'] = "Chi Tiết Lịch Trình"; // Việt hóa tiêu đề
	 	$sqlcek = $this->db->query("
	 		SELECT * FROM tbl_jadwal 
	 		LEFT JOIN tbl_bus on tbl_jadwal.kd_bus = tbl_bus.kd_bus 
	 		LEFT JOIN tbl_tujuan on tbl_jadwal.kd_tujuan = tbl_tujuan.kd_tujuan 
	 		WHERE kd_jadwal ='".$id."'
	 	")->row_array();
	 	if ($sqlcek) {
	 		$data['asal'] = $this->db->query("SELECT * FROM tbl_tujuan WHERE kd_tujuan = '".$sqlcek['kd_asal']."'")->row_array();
	 		$data['jadwal'] = $sqlcek;
			$data['title'] = "Xem Lịch Trình"; // Việt hóa tiêu đề
			$this->load->view('backend/view_jadwal', $data);
	 	} else {
	 		$this->session->set_flashdata('message', 'swal("Lỗi", "Có lỗi xảy ra. Vui lòng thử lại!", "error");'); // Việt hóa thông báo lỗi
			redirect('backend/jadwal');
	 	}
	}	
}

/* End of file Jadwal.php */
/* Location: ./application/controllers/backend/Jadwal.php */
