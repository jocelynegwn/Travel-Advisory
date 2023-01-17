<?php defined('BASEPATH') OR exit('No direct script access allowed');

class hotel extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('hotel_m');
    }
	public function index()
	{
		$data['row'] = $this->hotel_m->get();
		$this->template->load('template', 'product/hotel/hotel_data', $data);
	}   

	public function add() {
		$hotel = new stdClass();
		$hotel->hotel_id = null;
		$hotel->name = null;
		$data = array(
			'page' => 'add',
			'row' => $hotel
		);
		$this->template->load('template', 'product/hotel/hotel_form', $data);
	}

	public function edit($id)
	{
		$query = $this->hotel_m->get($id);
		if($query->num_rows() > 0) {
			$hotel = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $hotel
			);
			$this->template->load('template', 'product/hotel/hotel_form', $data);
		} else {
			echo "<script> alert('Data tidak ditemukan');";
            echo "window.location='".site_url('hotel')."'; </script>";
		}
	}

	public function process() 
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->hotel_m->add($post);
		} else if(isset($_POST['edit'])) {
			$this->hotel_m->edit($post);
		}

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
		}
		redirect('hotel');
	}

	public function del($id) 
	{
		$this->hotel_m->del($id);
		if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('hotel');
	}
}
