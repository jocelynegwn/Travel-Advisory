<?php defined('BASEPATH') OR exit('No direct script access allowed');

class food extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model('food_m');
    }
	public function index()
	{
		$data['row'] = $this->food_m->get();
		$this->template->load('template', 'product/food/food_data', $data);
	}   

	public function add() {
		$food = new stdClass();
		$food->food_id = null;
		$food->name = null;
		$data = array(
			'page' => 'add',
			'row' => $food
		);
		$this->template->load('template', 'product/food/food_form', $data);
	}

	public function edit($id)
	{
		$query = $this->food_m->get($id);
		if($query->num_rows() > 0) {
			$food = $query->row();
			$data = array(
				'page' => 'edit',
				'row' => $food
			);
			$this->template->load('template', 'product/food/food_form', $data);
		} else {
			echo "<script> alert('Data tidak ditemukan');";
            echo "window.location='".site_url('food')."'; </script>";
		}
	}

	public function process() 
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])) {
			$this->food_m->add($post);
		} else if(isset($_POST['edit'])) {
			$this->food_m->edit($post);
		}

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
		}
		redirect('food');
	}

	public function del($id) 
	{
		$this->food_m->del($id);
		if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('food');
	}
}
