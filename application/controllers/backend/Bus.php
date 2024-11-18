<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bus extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->model('getkod_model');
		date_default_timezone_set("Asia/Ho_Chi_Minh"); // Đổi múi giờ sang Việt Nam
	}

	// Quản lý xe buýt
	public function index(){
		$data['title'] = "Quản Lý Xe Buýt"; // Việt hóa tiêu đề
		$data['bus'] = $this->db->query("SELECT * FROM tbl_bus ORDER BY nama_bus asc")->result_array();
		$this->load->view('backend/bus', $data);	
	}

	// Xem chi tiết xe buýt
	public function viewbus($id=''){
		$data['title'] = "Xem Thông Tin Xe Buýt"; // Việt hóa tiêu đề
		$data['bus'] = $this->db->query("SELECT * FROM tbl_bus WHERE kd_bus = '".$id."'")->row_array();
		$this->load->view('backend/view_bus', $data);
	}

	// Thêm xe buýt mới
	public function tambahbus(){
		$kode = $this->getkod_model->get_kodbus();
		$data = array(
			'kd_bus' => $kode,
			'nama_bus' => $this->input->post('nama_bus'),
			'plat_bus' => $this->input->post('plat_bus'),
			'kapasitas_bus' => $this->input->post('seat'),
			'status_bus' => '1'
		);
		
		// Chèn dữ liệu vào cơ sở dữ liệu
		$this->db->insert('tbl_bus', $data);

		// Thông báo thành công
		$this->session->set_flashdata('message', 'swal("Thành Công", "Dữ liệu xe buýt đã được lưu!", "success");');
		redirect('backend/bus');
	}
}

/* End of file Bus.php */
/* Location: ./application/controllers/backend/Bus.php */
