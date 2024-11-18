<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		date_default_timezone_set("Asia/Ho_Chi_Minh"); // Đổi múi giờ sang Việt Nam
	}

	// Bảo mật đăng nhập
	function getsecurity($value=''){
		$username = $this->session->userdata('username');
		if ($username) {
			redirect('backend/home');
			$this->session->sess_destroy();
			redirect('backend/login');
		} else {
			redirect('backend/login');
		}
    }

	// Lấy địa chỉ IP của người dùng
    function getUserIP()
    {
        $client  = @$_SERVER['HTTP_CLIENT_IP'];
        $forward = @$_SERVER['HTTP_X_FORWARDED_FOR'];
        $remote  = $_SERVER['REMOTE_ADDR'];

        if(filter_var($client, FILTER_VALIDATE_IP))
        {
            $ip = $client;
        }
        elseif(filter_var($forward, FILTER_VALIDATE_IP))
        {
            $ip = $forward;
        }
        else
        {
            $ip = $remote;
        }

        return $ip;
    }

	// Trang đăng nhập
	public function index(){
		$data['ipaddres'] = $this->getUserIP();
		$this->load->view('backend/login', $data);
	}

	// Đăng xuất
	public function logout(){
		$this->session->sess_destroy();
		redirect(base_url('backend/login'));
	}

	// Xử lý đăng nhập
	public function cekuser(){
    	$username = strtolower($this->input->post('username'));
    	$getUser = $this->db->query('select * from tbl_admin where username_admin = "'.$username.'"')->row();
    	$password = $this->input->post('password');

		// Kiểm tra thông tin đăng nhập
    	if (password_verify($password, $getUser->password_admin)) {
        	$sess = array(
            	'kd_admin' => $getUser->kd_admin,
            	'username_admin' => $getUser->username_admin,
            	'password_admin' => $getUser->password_admin,
            	'nama_admin'     => $getUser->nama_admin,
            	'img_admin'		=> $getUser->img_admin,
            	'email_admin'    => $getUser->email_admin,
            	'telpon_admin'   => $getUser->telpon_admin,
            	'alamat_admin'	=> $getUser->alamat_admin,
            	'level'			=> $getUser->level_admin
        	);
        	$this->session->set_userdata($sess);
        	redirect('backend/home');
    	} else {
			// Việt hóa thông báo khi đăng nhập thất bại
    		$this->session->set_flashdata('message', 'swal("Thất Bại", "Thông tin đăng nhập không chính xác!", "error");');
    		redirect('backend/login');
    	}
	}

}

/* End of file Login.php */
/* Location: ./application/controllers/backend/Login.php */
