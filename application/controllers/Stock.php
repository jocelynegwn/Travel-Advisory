<?php defined('BASEPATH') OR exit('No direct script access allowed');

class stock extends CI_Controller {

	function __construct()
    {
        parent::__construct();
        check_not_login();
        $this->load->model(['package_m', 'stock_m']);
    }

    public function stock_in_data(){
        $data['row'] = $this->stock_m->get_stock_in()->result();
        $this->template->load('template', 'transaction/stock_in/stock_in_data', $data);
    }

    public function stock_in_add(){
        $package = $this->package_m->get()->result();
        $data = ['package' => $package];
        $this->template->load('template', 'transaction/stock_in/stock_in_form', $data);
    }

    public function stock_in_del(){
        $stock_id = $this->uri->segment(4);
        $package_id = $this->uri->segment(5);
        $qty = $this->stock_m->get($stock_id)->row()->qty;
        $data = ['qty' => $qty, 'package_id' => $package_id];
        $this->package_m->update_stock_out($data);
        $this->stock_m->del($stock_id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Stock-In Berhasil Dihapus');
        }
        redirect('stock/in');
    }

    public function stock_out_data(){
        $data['row'] = $this->stock_m->get_stock_out()->result();
        $this->template->load('template', 'transaction/stock_out/stock_out_data', $data);
    }

    public function stock_out_add(){
        $package = $this->package_m->get()->result();
        $data = ['package' => $package];
        $this->template->load('template', 'transaction/stock_out/stock_out_form', $data);
    }

    public function stock_out_del(){
        $stock_id = $this->uri->segment(4);
        $package_id = $this->uri->segment(5);
        $qty = $this->stock_m->get($stock_id)->row()->qty;
        $data = ['qty' => $qty, 'package_id' => $package_id];
        $this->package_m->update_stock_in($data);
        $this->stock_m->del($stock_id);
        if($this->db->affected_rows() > 0) {
            $this->session->set_flashdata('success', 'Data Stock-Out Berhasil Dihapus');
        }
        redirect('stock/out');
    }

    public function process(){
        if(isset($_POST['in_add'])){
            $post = $this->input->post(null, TRUE);
            $this->stock_m->add_stock_in($post);
            $this->package_m->update_stock_in($post);
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Stock-In Berhasil Disimpan');
            }
            redirect('stock/in');
        }else if(isset($_POST['out_add'])){
            $post = $this->input->post(null, TRUE);
            $this->stock_m->add_stock_out($post);
            $this->package_m->update_stock_out($post);
            if($this->db->affected_rows() > 0) {
                $this->session->set_flashdata('success', 'Data Stock-Out Berhasil Disimpan');
            }
            redirect('stock/out');
        }
    }
}