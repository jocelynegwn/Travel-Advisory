<?php defined('BASEPATH') OR exit('No direct script access allowed');

class transportation_m extends CI_Model {

    public function get($id = null) 
    {
        $this->db->from('transportation');
        if($id != null) {
            $this->db->where('transportation_id', $id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function add($post)
    {
        $params = [
            'name' => $post['transportation_name'],
        ];
        $this->db->insert('transportation', $params);
    }

    public function edit($post)
    {
        $params = [
            'name' => $post['transportation_name'],
            'updated' => date('Y-m-d H:i:s')
        ];
        $this->db->where('transportation_id', $post['id']);
        $this->db->update('transportation', $params);
    }

    public function del($id)
	{
        $this->db->where('transportation_id', $id);
		$this->db->delete('transportation');
	}

}