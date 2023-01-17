<?php defined('BASEPATH') OR exit('No direct script access allowed');

class stock_m extends CI_Model {

    public function get($id = null){
        $this->db->from('stock');
        if($id != null){
            $this->db->where('stock_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del($id){
        $this->db->where('stock_id', $id);
        $this->db->delete('stock');
    }

    public function get_stock_in(){
        $this->db->select('stock.stock_id, package.barcode,
        package.name as package_name, qty, date, detail, package.package_id');
        $this->db->from('stock');
        $this->db->join('package', 'stock.package_id = package.package_id');
        $this->db->where('type', 'in');
        $this->db->order_by('stock_id', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function add_stock_in($post)
    {
        $params = [
            'package_id' => $post['package_id'],
            'type' => 'in',
            'detail' => $post['detail'],
            'qty' => $post['qty'],
            'date' => $post['date'],
            'user_id' => $this->session->userdata('userid'),
        ];
        $this->db->insert('stock', $params); //stock nama table db
    }

    public function get_stock_out(){
        $this->db->select('stock.stock_id, package.barcode,
        package.name as package_name, qty, date, detail, package.package_id');
        $this->db->from('stock');
        $this->db->join('package', 'stock.package_id = package.package_id');
        $this->db->where('type', 'out');
        $this->db->order_by('stock_id', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function add_stock_out($post)
    {
        $params = [
            'package_id' => $post['package_id'],
            'type' => 'out',
            'detail' => $post['detail'],
            'qty' => $post['qty'],
            'date' => $post['date'],
            'user_id' => $this->session->userdata('userid'),
        ];
        $this->db->insert('stock', $params); //stock nama table db
    }

}