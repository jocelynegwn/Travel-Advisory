<?php defined('BASEPATH') OR exit('No direct script access allowed');

class transportation extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('transportation_m');
    }
	public function index()
	{
		$data['row'] = $this->transportation_m->get();
		$this->template->load('template', 'product/transportation/transportation_data', $data);
	}   

	public function add() {
		$transportation = new stdClass();
		$transportation->transportation_id = null;
		$transportation->name = null;
		$data = array(
			'page' => 'add',
			'row' => $transportation
		);
		$this->template->load('template', 'product/transportation/transportation_form', $data);
	}

	public function edit($id)
	{
		$query = $this->transportation_m->get($id);
		if($query->num_rows() > 0) {
			$transportation = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $transportation
			);
			$this->template->load('template', 'product/transportation/transportation_form', $data);
		} else {
			echo "<script> alert('Data tidak ditemukan');";
            echo "window.location='".site_url('transportation')."'; </script>";
		}
	}

	public function process() 
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->transportation_m->add($post);
		} else if(isset($_POST['edit'])) {
			$this->transportation_m->edit($post);
		}

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
		}
		redirect('transportation');
	}

	public function del($id) 
	{
		$this->transportation_m->del($id);
		if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('transportation');
	}
}
