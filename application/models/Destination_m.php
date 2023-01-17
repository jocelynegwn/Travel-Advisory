<?php defined('BASEPATH') OR exit('No direct script access allowed');

class destination_m extends CI_Model {

    public function get($id = null) 
    {
        $this->db->from('destination');
        if($id != null) {
            $this->db->where('destination_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'name' => $post['destination_name'],
        ];
        $this->db->insert('destination', $params);
    }

    public function edit($post)
    {
        $params = [
            'name' => $post['destination_name'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('destination_id', $post['id']);
        $this->db->update('destination', $params);
    }

    public function del($id)
	{
        $this->db->where('destination_id', $id);
		$this->db->delete('destination');
	}

}