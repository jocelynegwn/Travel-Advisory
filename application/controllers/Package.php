<?php defined('BASEPATH') OR exit('No direct script access allowed');

class package extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['package_m', 'destination_m', 'food_m', 'hotel_m', 'transportation_m', 'tourist_m']);
    }

	function get_ajax() {
        $list = $this->package_m->get();
        $data = array();
        $no = @$_POST['start'];
        foreach ($list as $package) {
            $no++;
            $row = array();
            $row[] = $no.".";
            $row[] = $package->barcode;
            $row[] = $package->name;
            $row[] = $package->destination_name;
            $row[] = $package->food_name;
			$row[] = $package->hotel_name;
			$row[] = $package->transportation_name;
			$row[] = $package->tourist_name;
            $row[] = indo_currency($package->price);
            $row[] = $package->stock;
            $row[] = '<a href="'.site_url('package/edit/'.$package->package_id).'" class="btn btn-primary btn-xs"><i class="fa fa-pencil"></i> Update</a>
                    <a href="'.site_url('package/del/'.$package->package_id).'" onclick="return confirm(\'Yakin hapus data?\')"  class="btn btn-danger btn-xs"><i class="fa fa-trash"></i> Delete</a>';
            $data[] = $row;
        }
        $output = array(
                    "draw" => @$_POST['draw'],
                    "recordsTotal" => $this->package_m->count_all(),
                    "recordsFiltered" => $this->package_m->count_filtered(),
                    "data" => $data,
                );
        // output to json format
        echo json_encode($output);
    }

	public function index()
	{
		$data['row'] = $this->package_m->get();
		$this->template->load('template', 'product/package/package_data', $data);
	}   

	public function add() {
		$package = new stdClass();
		$package->package_id = null;
        $package->barcode = null;
		$package->name = null;
        $package->price = null;
		$package->destination_id = null;
		$package->food_id = null;
		$package->hotel_id = null;
		$package->transportation_id = null;
		$package->tourist_id = null;

        $destination = $this->destination_m->get();
		$food = $this->food_m->get();
		$hotel = $this->hotel_m->get();
		$transportation = $this->transportation_m->get();
		$tourist = $this->tourist_m->get();

		$data = array(
			'page' => 'add',
			'row' => $package,
            'destination' => $destination,
			'food' => $food,
			'hotel' => $hotel,
			'transportation' => $transportation,
			'tourist' => $tourist,
		);
		$this->template->load('template', 'product/package/package_form', $data);
	}

	public function edit($id)
	{
		$query = $this->package_m->get($id);
		if($query->num_rows() > 0) {
			$package = $query->row();

            $destination = $this->destination_m->get();
			$food = $this->food_m->get();
			$hotel = $this->hotel_m->get();
			$transportation = $this->transportation_m->get();
			$tourist = $this->tourist_m->get();

		    $data = array(
			'page' => 'edit',
			'row' => $package,
            'destination' => $destination,
			'food' => $food,
			'hotel' => $hotel,
			'transportation' => $transportation,
			'tourist' => $tourist,
		    );
			$this->template->load('template', 'product/package/package_form', $data);
		} else {
			echo "<script> alert('Data tidak dpackageukan');";
            echo "window.location='".site_url('package')."'; </script>";
		}
	}

	public function process() 
	{
		$post = $this->input->post(null, TRUE);
		if(isset($_POST['add'])){
			$this->package_m->add($post);
		} else if(isset($_POST['edit'])) {
			$this->package_m->edit($post);
		}	

		if($this->db->affected_rows() > 0) {
			$this->session->set_flashdata('success', 'Data Berhasil Disimpan');
		}
		redirect('package');
	}

	public function del($id) 
	{
		$this->package_m->del($id);
		if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Berhasil Dihapus');
        }
        redirect('package');
	}
}
