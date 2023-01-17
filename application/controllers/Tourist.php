<?php defined('BASEPATH') OR exit('No direct script access allowed');

class tourist extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('tourist_m');
    }
	public function index()
	{
		$data['row'] = $this->tourist_m->get();
		$this->template->load('template', 'product/tourist/tourist_data', $data);
	}   

	public function add() {
		$tourist = new stdClass();
		$tourist->tourist_id = null;
		$tourist->name = null;
		$data = array(
			'page' => 'add',
			'row' => $tourist
		);
		$this->template->load('template', 'product/tourist/tourist_form', $data);
	}

	public function edit($id)
	{
		$query = $this->tourist_m->get($id);
		if($query->num_rows() > 0) {
			$tourist = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $tourist
			);
			$this->template->load('template', 'product/tourist/tourist_form', $data);
		} else {
			echo "<script> alert('Data tidak ditemukan');";
            echo "window.location='".site_url('tourist')."'; </script>";
		}
	}

	public function process() 
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->tourist_m->add($post);
		} else if(isset($_POST['edit'])) {
			$this->tourist_m->edit($post);
		}

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
		}
		redirect('tourist');
	}

	public function del($id) 
	{
		$this->tourist_m->del($id);
		if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('tourist');
	}
}
