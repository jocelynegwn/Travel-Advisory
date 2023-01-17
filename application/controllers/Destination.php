<?php defined('BASEPATH') OR exit('No direct script access allowed');

class destination extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('destination_m');
    }
	public function index()
	{
		$data['row'] = $this->destination_m->get();
		$this->template->load('template', 'product/destination/destination_data', $data);
	}   

	public function add() {
		$destination = new stdClass();
		$destination->destination_id = null;
		$destination->name = null;
		$data = array(
			'page' => 'add',
			'row' => $destination
		);
		$this->template->load('template', 'product/destination/destination_form', $data);
	}

	public function edit($id)
	{
		$query = $this->destination_m->get($id);
		if($query->num_rows() > 0) {
			$destination = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $destination
			);
			$this->template->load('template', 'product/destination/destination_form', $data);
		} else {
			echo "<script> alert('Data tidak ditemukan');";
            echo "window.location='".site_url('destination')."'; </script>";
		}
	}

	public function process() 
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->destination_m->add($post);
		} else if(isset($_POST['edit'])) {
			$this->destination_m->edit($post);
		}

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
		}
		redirect('destination');
	}

	public function del($id) 
	{
		$this->destination_m->del($id);
		if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('destination');
	}
}
