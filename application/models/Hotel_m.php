<?php defined('BASEPATH') OR exit('No direct script access allowed');

class hotel_m extends CI_Model {

    public function get($id = null) 
    {
        $this->db->from('hotel');
        if($id != null) {
            $this->db->where('hotel_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'name' => $post['hotel_name'],
        ];
        $this->db->insert('hotel', $params);
    }

    public function edit($post)
    {
        $params = [
            'name' => $post['hotel_name'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('hotel_id', $post['id']);
        $this->db->update('hotel', $params);
    }

    public function del($id)
	{
        $this->db->where('hotel_id', $id);
		$this->db->delete('hotel');
	}

}