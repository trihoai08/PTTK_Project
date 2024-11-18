<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Profile extends CI_Controller {
	public function __construct(){
		parent::__construct();
		date_default_timezone_set("Asia/Ho_Chi_Minh"); // Đặt múi giờ thành Việt Nam
	}

	// Trang hiển thị thông tin cá nhân
	public function index(){
		$this->load->view('frontend/profile');
	}

	// Trang hiển thị thông tin cá nhân dựa trên ID khách hàng
	public function profilesaya($id=''){
		$data['profile'] = $this->db->query("SELECT * FROM tbl_pelanggan WHERE kd_pelanggan LIKE '".$id."'")->row_array();
		// die(print_r($data));
		$this->load->view('frontend/profile', $data);
	}

	// Chỉnh sửa thông tin cá nhân
	public function editprofile($id=''){
		$id = $this->input->post('kode');
		$where = array('kd_pelanggan' => $id );
		$update = array(
			'no_ktp_pelanggan' => $this->input->post('ktp'),
			'nama_pelanggan'   => $this->input->post('nama'),
			'email_pelanggan'  => $this->input->post('email'),
			'img_pelanggan'    => 'assets/frontend/img/default.png',
			'alamat_pelanggan' => $this->input->post('alamat'),
			'telpon_pelanggan' => $this->input->post('hp'),
		);
		$this->db->update('tbl_pelanggan', $update, $where);
		$this->session->set_flashdata('message', 'swal("Thành công", "Chỉnh sửa thông tin thành công", "success");');
		redirect('profile/profilesaya/'.$id);
	}

	// Hiển thị danh sách vé của người dùng
	public function tiketsaya($id=''){
		$this->getsecurity();
		$data['tiket'] = $this->db->query("SELECT * FROM tbl_order WHERE kd_pelanggan ='".$id."' group by kd_order")->result_array();
		$this->load->view('frontend/tiketmu', $data);
	}

	// Đổi mật khẩu
	public function changepassword($id=''){
		$this->load->library('form_validation');
		$pelanggan = $this->db->query("SELECT password_pelanggan FROM tbl_pelanggan where kd_pelanggan ='".$id."'")->row_array();
		$this->form_validation->set_rules('currentpassword', 'currentpassword', 'trim|required|min_length[8]', array(
			'required' => 'Vui lòng nhập mật khẩu hiện tại',
		));
		$this->form_validation->set_rules('new_password1', 'new_password1', 'trim|required|min_length[8]|matches[new_password2]', array(
			'required' => 'Vui lòng nhập mật khẩu mới.',
			'matches'  => 'Mật khẩu mới không khớp.',
			'min_length' => 'Mật khẩu phải có ít nhất 8 ký tự.',
		));
		$this->form_validation->set_rules('new_password2', 'new_password2', 'trim|required|min_length[8]|matches[new_password1]', array(
			'required' => 'Vui lòng nhập lại mật khẩu mới.',
			'matches'  => 'Mật khẩu mới không khớp.',
			'min_length' => 'Mật khẩu phải có ít nhất 8 ký tự.',
		));

		if ($this->form_validation->run() == false) {
			$this->load->view('frontend/changepassword');
		} else {
			$currentpassword = $this->input->post('currentpassword');
			$newpassword     = $this->input->post('new_password1');

			if (!password_verify($currentpassword, $pelanggan['password_pelanggan'])) {
				$this->session->set_flashdata('gagal', '<div class="alert alert-danger" role="alert">
				Mật khẩu hiện tại không chính xác
				</div>');
				redirect('profile/changepassword');
			} elseif ($currentpassword == $newpassword) {
				$this->session->set_flashdata('gagal', '<div class="alert alert-danger" role="alert">
				Mật khẩu mới không được giống mật khẩu hiện tại
				</div>');
				redirect('profile/changepassword');
			} else {
				$password_hash = password_hash($newpassword, PASSWORD_DEFAULT);
				$where = array('kd_pelanggan' => $id );
				$update = array(
					'password_pelanggan' => $password_hash,
				);
				$this->db->update('tbl_pelanggan', $update, $where);
				$this->session->set_flashdata('message', 'swal("Thành công", "Mật khẩu của bạn đã được đổi thành công", "success");');
				redirect('profile/profilesaya/'.$id);
			}
		}
	}

	// Hàm bảo mật kiểm tra đăng nhập
	function getsecurity($value=''){
		$username = $this->session->userdata('username');
		if (empty($username)) {
			$this->session->sess_destroy();
			redirect('backend/login');
		}
	}
}

/* Kết thúc file Profile.php */
/* Đường dẫn: ./application/controllers/Profile.php */
