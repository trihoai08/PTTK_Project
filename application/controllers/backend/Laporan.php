<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Laporan extends CI_Controller {
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

	// Quản lý báo cáo
	public function index(){
		$data['title'] = 'Báo Cáo'; // Việt hóa tiêu đề
		$data['bulan'] = $this->db->query("SELECT DISTINCT DATE_FORMAT(create_tgl_tiket,'%M %Y') AS bulan FROM tbl_tiket")->result_array();
		$this->load->view('backend/laporan', $data);
	}

	// Báo cáo theo ngày
	public function laportanggal($value=''){
		$data['mulai'] = $this->input->post('mulai');
		$data['sampai'] = $this->input->post('sampai');
		$data['laporan'] = $this->db->query("
			SELECT * FROM tbl_tiket 
			WHERE (create_tgl_tiket BETWEEN '".$data['mulai']."' AND '".$data['sampai']."') 
			AND status_tiket = 2
		")->result_array();

		// Tính tổng doanh thu
		for ($i = 0; $i < count($data['laporan']); $i++) { 
			$total[$i] = $data['laporan'][$i]['harga_tiket'];
		}
		$data['total'] = array_sum($total);

		// Hiển thị báo cáo
		$this->load->view('backend/laporan/laporan_pertanggal', $data);		
	}

	// Báo cáo theo tháng
	public function laporbulan($value=''){
		$data['bulan'] = $this->input->post('bln');
		// Việt hóa phần này nếu bạn cần xử lý chi tiết hơn
		// die(print_r($data));
		// for ($i = 0; $i < count($data['laporan']); $i++) { 
		// 	$total[$i] = $data['laporan'][$i]['harga_tiket'];
		// }
		// $data['total'] = array_sum($total);
		// $this->load->view('backend/laporan/laporan_pertanggal', $data);
	}
}

/* End of file Laporan.php */
/* Location: ./application/controllers/backend/Laporan.php */
