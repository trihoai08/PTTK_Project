<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->load->library('form_validation');
		$this->getsecurity();
		date_default_timezone_set("Asia/Ho_Chi_Minh"); // Cập nhật múi giờ Việt Nam
	}
	function getsecurity($value=''){
		$username = $this->session->userdata('level');
		if ($username == '2') {
			$this->session->sess_destroy();
			redirect('backend/login');
		}
	}
	public function index(){
		$data['title'] = "Khu Vực Quản Trị"; // Việt hóa tiêu đề
		$data['admin'] = $this->db->query("SELECT * FROM tbl_admin")->result_array();
		$this->load->view('backend/admin', $data);
	}
	public function daftar(){
		// Việt hóa các thông báo xác thực form
		$this->form_validation->set_rules('name', 'Tên', 'trim|required');
		$this->form_validation->set_rules('username', 'Tên Đăng Nhập', 'trim|required|min_length[5]|is_unique[tbl_admin.username_admin]', array(
			'required' => 'Tên đăng nhập là bắt buộc.',
			'is_unique' => 'Tên đăng nhập đã được sử dụng.'
		));
		$this->form_validation->set_rules('email', 'Email', 'trim|required|valid_email', array(
			'required' => 'Email là bắt buộc.',
		));
		$this->form_validation->set_rules('password', 'Mật Khẩu', 'trim|required|min_length[4]|matches[password2]', array(
			'matches' => 'Mật khẩu không khớp.',
			'min_length' => 'Mật khẩu phải có ít nhất 8 ký tự.'
		));
		$this->form_validation->set_rules('password2', 'Nhập Lại Mật Khẩu', 'trim|required|matches[password]');
		
		// Kiểm tra xác thực form
		if ($this->form_validation->run() == false) {
			$data['title'] = "Thêm Quản Trị Viên"; // Việt hóa tiêu đề
			$this->load->view('backend/daftar', $data);
		} else {
			// Lưu dữ liệu vào cơ sở dữ liệu
			$kode = $this->getkod_model->get_kodadm();
			$data = array(
				'kd_admin' => $kode,
				'nama_admin' => $this->input->post('name'),
				'email_admin' => $this->input->post('email'),
				'img_admin' => 'assets/backend/img/default.png',
				'username_admin' => strtolower($this->input->post('username')),
				'password_admin' => password_hash($this->input->post('password'), PASSWORD_DEFAULT),
				'level_admin' => 2,
				'status_admin' => 1,
				'date_create_admin' => time()
			);
			$this->db->insert('tbl_admin', $data);
			// Thông báo thành công
			$this->session->set_flashdata('message', 'swal("Thành Công", "Tài khoản đã được thêm thành công!", "success");');
    		redirect('backend/admin');
		}
	}
}

/* End of file Admin.php */
/* Location: ./application/controllers/backend/Admin.php */
