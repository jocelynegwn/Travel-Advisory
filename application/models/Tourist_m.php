<?php defined('BASEPATH') OR exit('No direct script access allowed');

class tourist_m extends CI_Model {

    public function get($id = null) 
    {
        $this->db->from('tourist');
        if($id != null) {
            $this->db->where('tourist_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'name' => $post['tourist_name'],
        ];
        $this->db->insert('tourist', $params);
    }

    public function edit($post)
    {
        $params = [
            'name' => $post['tourist_name'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('tourist_id', $post['id']);
        $this->db->update('tourist', $params);
    }

    public function del($id)
	{
        $this->db->where('tourist_id', $id);
		$this->db->delete('tourist');
	}

}