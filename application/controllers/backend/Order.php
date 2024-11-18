<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Order extends CI_Controller {
	function __construct(){
		parent::__construct();
		$this->load->helper('tglindo_helper');
		$this->load->model('getkod_model');
		$this->getsecurity();
		date_default_timezone_set("Asia/Ho_Chi_Minh"); // Đổi múi giờ sang Việt Nam
	}

	// Bảo mật đăng nhập
	function getsecurity($value=''){
		if (empty($this->session->userdata('username_admin'))) {
			$this->session->sess_destroy();
			redirect('backend/login');
		}
	}

	// Danh sách đặt vé
	public function index(){
		$data['title'] = "Danh Sách Đặt Vé"; // Việt hóa tiêu đề
 		$data['order'] = $this->db->query("SELECT * FROM tbl_order group by kd_order")->result_array();
		$this->load->view('backend/order', $data);
	}

	// Xem chi tiết đặt vé
	public function vieworder($id=''){
		$cek = $this->input->get('order') . $id;
	 	$sqlcek = $this->db->query("SELECT * FROM tbl_order LEFT JOIN tbl_jadwal ON tbl_order.kd_jadwal = tbl_jadwal.kd_jadwal WHERE kd_order = '".$cek."'")->result_array();
	 	if ($sqlcek) {
	 		$data['tiket'] = $sqlcek;
			$data['title'] = "Xem Chi Tiết Đặt Vé"; // Việt hóa tiêu đề
			$this->load->view('backend/view_order', $data);
	 	} else {
			// Việt hóa thông báo lỗi
	 		$this->session->set_flashdata('message', 'swal("Rỗng", "Không có đơn đặt vé nào!", "error");');
    		redirect('backend/tiket');
	 	}
	}

	// Xử lý đơn đặt vé
	public function inserttiket($value=''){
		$id = $this->input->post('kd_order');
		$asal = $this->input->post('asal_beli');
		$tiket = $this->input->post('kd_tiket');
		$nama = $this->input->post('nama');
		$kursi = $this->input->post('no_kursi');
		$umur = $this->input->post('umur_kursi');
		$harga = $this->input->post('harga');
		$tgl = $this->input->post('tgl_beli');
		$status = $this->input->post('status');
		$where = array('kd_order' => $id);
		$update = array('status_order' => $status);

		$this->db->update('tbl_order', $update, $where);
		$data['asal'] = $this->db->query("SELECT * FROM tbl_tujuan WHERE kd_tujuan = '".$asal."'")->row_array();
		$data['cetak'] = $this->db->query("SELECT * FROM tbl_order LEFT JOIN tbl_jadwal ON tbl_order.kd_jadwal = tbl_jadwal.kd_jadwal LEFT JOIN tbl_tujuan ON tbl_jadwal.kd_tujuan = tbl_tujuan.kd_tujuan WHERE kd_order = '".$id."'")->result_array();
		$pelanggan = $this->db->query("SELECT email_pelanggan FROM tbl_pelanggan WHERE kd_pelanggan = '".$data['cetak'][0]['kd_pelanggan']."'")->row_array();
		
		$pdfFilePath = "assets/backend/upload/etiket/".$id.".pdf";
		$html = $this->load->view('frontend/cetaktiket', $data, TRUE);
		$this->load->library('m_pdf');
		$this->m_pdf->pdf->WriteHTML($html);
		$this->m_pdf->pdf->Output($pdfFilePath);

		for ($i = 0; $i < count($nama); $i++) { 
			$simpan = array(
				'kd_tiket' => $tiket[$i],
				'kd_order' => $id,
				'nama_tiket' => $nama[$i],
				'kursi_tiket' => $kursi[$i],
				'umur_tiket' => $umur[$i],
				'asal_beli_tiket' => $asal,
				'harga_tiket' => $harga,
				'status_tiket' => $status,
				'etiket_tiket' => $pdfFilePath,
				'create_tgl_tiket' => date('Y-m-d'),
				'create_admin_tiket' => $this->session->userdata('username_admin')
			);
			$this->db->insert('tbl_tiket', $simpan);
		}

		// Việt hóa thông báo thành công
		$this->session->set_flashdata('message', 'swal("Thành Công", "Đơn đặt vé đã được xử lý thành công!", "success");');
		redirect('backend/order');
	}

	// Gửi email vé điện tử
	public function kirimemail($id=''){
		$data['cetak'] = $this->db->query("SELECT * FROM tbl_order LEFT JOIN tbl_jadwal ON tbl_order.kd_jadwal = tbl_jadwal.kd_jadwal LEFT JOIN tbl_tujuan ON tbl_jadwal.kd_tujuan = tbl_tujuan.kd_tujuan WHERE kd_order = '".$id."'")->result_array();
		$asal = $data['cetak'][0]['asal_order'];
		$kodeplg = $data['cetak'][0]['kd_pelanggan'];
		$data['asal'] = $this->db->query("SELECT * FROM tbl_tujuan WHERE kd_tujuan = '$asal'")->row_array();
		$pelanggan = $this->db->query("SELECT email_pelanggan FROM tbl_pelanggan WHERE kd_pelanggan = '$kodeplg'")->row_array();

		// Cấu hình email
		$subject = 'Vé điện tử - Mã đơn hàng '.$id.' - '.date('dmY');
		$message = $this->load->view('frontend/cetaktiket', $data, TRUE);
		$attach  = base_url("assets/backend/upload/etiket/".$id.".pdf");
		$to 	 = $pelanggan['email_pelanggan'];

		$config = array(
			   'mailtype'  => 'html',
               'charset'   => 'utf-8',
               'protocol'  => 'smtp',
               'smtp_host' => 'ssl://smtp.gmail.com',
               'smtp_user' => 'demo@email.com',    // Thay bằng email Gmail của bạn
               'smtp_pass' => 'P@$$\/\/0RD',       // Thay bằng mật khẩu email
               'smtp_port' => 465,
               'crlf'      => "rn",
               'newline'   => "rn"
		);

        $this->load->library('email', $config);
        $this->email->set_newline("\r\n");
        $this->email->from('BTBS');
        $this->email->to($to);
        $this->email->attach($attach);
        $this->email->subject($subject);
        $this->email->message($message);

		// Việt hóa thông báo kết quả gửi email
        if ($this->email->send()) {
        	$this->session->set_flashdata('message', 'swal("Thành Công", "Vé điện tử đã được gửi!", "success");');
			redirect('backend/order/vieworder/'.$id);
        } else {
            $this->session->set_flashdata('message', 'swal("Thất Bại", "Gửi vé điện tử thất bại! Liên hệ đội IT.", "error");');
			redirect('backend/order/vieworder/'.$id);
        }
	}
}

/* End of file Order.php */
/* Location: ./application/controllers/backend/Order.php */
