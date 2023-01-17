<?php defined('BASEPATH') OR exit('No direct script access allowed');

class package_m extends CI_Model {
    // start datatables
    var $column_order = array('package_id', 'barcode', 'package.name', 'destination_name', 'food_name', 'hotel_name', 'transportation_name', 'tourist_name', 'price', 'stock'); //set column field database for datatable orderable
    var $column_search = array('barcode', 'package.name', 'destination.name', 'food.name', 'hotel.name', 'transportation.name', 'tourist.name', 'price', 'stock'); //set column field database for datatable searchable
    var $order = array('package_id' => 'asc'); // default order 
 
    private function _get_datatables_query() {
        $this->db->select('package.*, destination.name as destination_name, food.name as food_name, hotel.name as hotel_name, transportation.name as transportation_name, tourist.name as tourist_name');
        $this->db->from('package');
        $this->db->join('destination', 'destination.destination_id = package.destination_id');
        $this->db->join('food', 'food.food_id = package.food_id');
        $this->db->join('hotel', 'hotel.hotel_id = package.hotel_id');
        $this->db->join('transportation', 'transportation.transportation_id = package.transportation_id');
        $this->db->join('tourist', 'tourist.tourist_id = package.tourist_id');
        $i = 0;
        foreach ($this->column_search as $package) { // loop column 
            if(@$_POST['search']['value']) { // if datatable send POST for search
                if($i===0){ //first loop
                    $this->db->group_start(); // open bracket. query Where with OR clause better with bracket. because maybe can combine with other WHERE with AND.
                    $this->db->like($package, $_POST['search']['value']);
                } else {
                    $this->db->or_like($package, $_POST['search']['value']);
                }
                if(count($this->column_search) - 1 == $i) //last loop
                    $this->db->group_end(); //close bracket
            }
            $i++;
        }
         
        if(isset($_POST['order'])) { // here order processing
            $this->db->order_by($this->column_order[$_POST['order']['0']['column']], $_POST['order']['0']['dir']);
        }  else if(isset($this->order)) {
            $order = $this->order;
            $this->db->order_by(key($order), $order[key($order)]);
        }
    }
    function get_datatables() {
        $this->_get_datatables_query();
        if(@$_POST['length'] != -1)
        $this->db->limit(@$_POST['length'], @$_POST['start']);
        $query = $this->db->get();
        return $query->result();
    }
    function count_filtered() {
        $this->_get_datatables_query();
        $query = $this->db->get();
        return $query->num_rows();
    }
    function count_all() {
        $this->db->from('package');
        return $this->db->count_all_results();
    }
    // end datatables

    public function get($id = null) 
    {
        $this->db->select('package.*, destination.name as destination_name, food.name as food_name, hotel.name as hotel_name, transportation.name as transportation_name, tourist.name as tourist_name');
        $this->db->from('package');
        $this->db->join('destination', 'destination.destination_id = package.destination_id');
        $this->db->join('food', 'food.food_id = package.food_id');
        $this->db->join('hotel', 'hotel.hotel_id = package.hotel_id');
        $this->db->join('transportation', 'transportation.transportation_id = package.transportation_id');
        $this->db->join('tourist', 'tourist.tourist_id = package.tourist_id');

        if($id != null) {
            $this->db->where('package_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'barcode' => $post['barcode'],
            'name' => $post['name'], //name yg setelah post itu lemparan dr name di package_form
            'destination_id' => $post['destination'],
            'food_id' => $post['food'],
            'hotel_id' => $post['hotel'],
            'transportation_id' => $post['transportation'],
            'tourist_id' => $post['tourist'],
            'price' => $post['price'],
        ];
        $this->db->insert('package', $params);
    }

    public function edit($post)
    {
        $params = [
            'barcode' => $post['barcode'],
            'name' => $post['name'], //name yg setelah post itu lemparan dr name di package_form
            'destination_id' => $post['destination'],
            'food_id' => $post['food'],
            'hotel_id' => $post['hotel'],
            'transportation_id' => $post['transportation'],
            'tourist_id' => $post['tourist'],
            'price' => $post['price'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('package_id', $post['id']);
        $this->db->update('package', $params);
    }

    public function del($id)
	{
        $this->db->where('package_id', $id);
		$this->db->delete('package');
	}

    function update_stock_in($data){
        $qty = $data['qty'];
        $id = $data['package_id'];
        $sql = "UPDATE package SET stock = stock + '$qty' WHERE package_id = '$id'";
        $this->db->query($sql);
    }

    function update_stock_out($data){
        $qty = $data['qty'];
        $id = $data['package_id'];
        $sql = "UPDATE package SET stock = stock - '$qty' WHERE package_id = '$id'";
        $this->db->query($sql);
    }

}