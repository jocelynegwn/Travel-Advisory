<?php defined('BASEPATH') OR exit('No direct script access allowed');

class food_m extends CI_Model {

    public function get($id = null) 
    {
        $this->db->from('food');
        if($id != null) {
            $this->db->where('food_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'name' => $post['food_name'],
        ];
        $this->db->insert('food', $params);
    }

    public function edit($post)
    {
        $params = [
            'name' => $post['food_name'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('food_id', $post['id']);
        $this->db->update('food', $params);
    }

    public function del($id)
	{
        $this->db->where('food_id', $id);
		$this->db->delete('food');
	}

}