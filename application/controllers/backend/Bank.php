<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Bank extends CI_Controller {
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

	// Quản lý ngân hàng
	public function index(){
		$data['title'] = "Quản Lý Ngân Hàng"; // Việt hóa tiêu đề
		$data['bank'] = $this->db->query("SELECT * FROM tbl_bank")->result_array();
		$this->load->view('backend/bank', $data);	
	}

	// Xem chi tiết ngân hàng
	public function viewbank($id=""){
		$data['title'] = "Danh Sách Ngân Hàng"; // Việt hóa tiêu đề
		$data['bank'] = $this->db->query("SELECT * FROM tbl_bank WHERE kd_bank = '".$id."'")->row_array();
		$this->load->view('backend/view_bank', $data);	
	}

	// Thêm ngân hàng mới
	public function tambahbank()
	{
		$config['upload_path'] = './assets/frontend/img/bank';
		$config['allowed_types'] = 'gif|jpg|png|jpeg';
		$this->load->library('upload', $config);

		// Kiểm tra lỗi upload ảnh
		if (!$this->upload->do_upload('userfile')){
			$error = array('error' => $this->upload->display_errors());
			die(print_r($error));
			$this->session->set_flashdata('message', 'swal("Thất Bại", "Vui lòng kiểm tra lại thông tin nhập vào!", "error");'); // Việt hóa thông báo
			redirect('backend/bank');
		}else{
			// Upload ảnh thành công
			$upload_data = $this->upload->data();
			$featured_image = '/assets/frontend/img/bank/'.$upload_data['file_name'];
			$kode = $this->getkod_model->get_kodbank();

			// Lưu dữ liệu ngân hàng
			$data = [
				'kd_bank' => $kode,
				'nasabah_bank' => $this->input->post('nasabah'),
				'nama_bank' => $this->input->post('bank'),
				'nomrek_bank' => $this->input->post('nomor'),
				'photo_bank' => $featured_image
			];
			
			$this->db->insert('tbl_bank', $data);

			// Việt hóa thông báo thành công
			$this->session->set_flashdata('message', 'swal("Thành Công", "Dữ liệu ngân hàng đã được lưu!", "success");');
			redirect('backend/bank');
		}
	}
}

/* End of file Bank.php */
/* Location: ./application/controllers/backend/Bank.php */
