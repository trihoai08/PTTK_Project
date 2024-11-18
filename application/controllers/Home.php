<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/* Đây là controller chính của trang chủ */
class Home extends CI_Controller {
	function __construct()
    {
        parent::__construct();
        $this->load->helper(array('url', 'form')); // Tải các helper cần thiết
        $this->load->library(array('form_validation', 'Recaptcha')); // Tải các thư viện cần thiết
    }

    // Hàm kiểm tra bảo mật đăng nhập
    function getsecurity($value=''){
        $username = $this->session->userdata('username');
        if (empty($username)) { // Nếu không có phiên đăng nhập, chuyển hướng đến trang login
            $this->session->sess_destroy();
            redirect('login');
        }
    }

    // Hàm hiển thị trang chủ
	public function index(){
		$data = array(
            'captcha' => $this->recaptcha->getWidget(), // Hiển thị mã Captcha
            'script_captcha' => $this->recaptcha->getScriptTag(), // Mã JavaScript cho Captcha
        );
        // die(print_r($data));
		$this->load->view('frontend/home', $data); // Tải view trang chủ	
	}

    // Hàm hiển thị trang thông tin cá nhân
	public function profile($value=''){
		$this->load->view('frontend/profile');
	}

    // Hàm chỉnh sửa thông tin cá nhân (chưa triển khai)
	public function editprofile($id=''){
		$this->load->view('frontend/profile');
	}

    // Hàm xử lý đăng ký nhận tin tức qua email
	public function newslatter($value=''){
        $this->form_validation->set_rules('news', ' ', 'trim|required'); // Xác thực trường nhập tin tức

        $this->form_validation->set_error_delimiters('<div class="text-danger">', '</div>'); // Thêm thông báo lỗi

        $recaptcha = $this->input->post('g-recaptcha-response'); // Lấy mã Captcha từ người dùng nhập
        $response = $this->recaptcha->verifyResponse($recaptcha); // Xác minh mã Captcha

        // Nếu xác thực không thành công hoặc mã Captcha sai
        if ($this->form_validation->run() == FALSE || !isset($response['success']) || $response['success'] <> true) {
            $this->index(); // Quay lại trang chủ
        } else {
            echo 'Thành công'; // Hiển thị thông báo thành công
        }
	}
}

/* Kết thúc file Home.php */
/* Đường dẫn: ./application/controllers/Home.php */
