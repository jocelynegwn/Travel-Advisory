<?php defined('BASEPATH') OR exit('No direct script access allowed');

class sale_m extends CI_Model {

    public function invoice_no() 
    {
        $sql = "SELECT MAX(MID(invoice,9,4)) AS invoice_no 
                FROM sale 
                WHERE MID(invoice,3,6) = DATE_FORMAT(CURDATE(), '%y%m%d')";
        $query = $this->db->query($sql);
        if($query->num_rows() > 0){
            $row = $query->row();
            $n = ((int)$row->invoice_no) + 1;
            $no = sprintf("%'.04d", $n); 
        }else{
            $no = "0001";
        }
        $invoice = "MP".date('ymd').$no;
        return $invoice;
    }

    public function get_cart($params = null)
    {
        $this->db->select('*, package.name as package_name, cart.price as cart_price');
        $this->db->from('cart');
        $this->db->join('package', 'cart.package_id = package.package_id');
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->where('user_id', $this->session->userdata('userid'));
        $query = $this->db->get();
        return $query;
    }

    public function add_cart($post)
    {
        $query = $this->db->query("SELECT MAX(cart_id) AS cart_no FROM cart");
        if($query->num_rows() > 0) {
            $row = $query->row();
            $car_no = ((int)$row->cart_no) + 1;
        } else {
            $car_no = "1";
        }

        $params = array(
            'cart_id' => $car_no,
            'package_id' => $post['package_id'],
            'price' => $post['price'],
            'qty' => $post['qty'],
            'total' => ($post['price'] * $post['qty']),
            'user_id' => $this->session->userdata('userid')
        );
        $this->db->insert('cart', $params);
    }

    function update_cart_qty($post) {
        $sql = "UPDATE cart SET price = '$post[price]',
                qty = qty + '$post[qty]',
                total = '$post[price]' * qty
                WHERE package_id = '$post[package_id]'";
        $this->db->query($sql);
    }

    public function del_cart($params = null)
    {
        if($params != null) {
            $this->db->where($params);
        }
        $this->db->delete('cart');
    }

    public function edit_cart($post)
    {
        $params = array(
            'price' => $post['price'],
            'qty' => $post['qty'],
            'discount_package' => $post['discount'],
            'total' => $post['total'],
        );
        $this->db->where('cart_id', $post['cart_id']);
        $this->db->update('cart', $params);
    }

    public function add_sale($post)
    {
        $params = array(
            'invoice' => $this->invoice_no(),
            'customer_id' => $post['customer_id'] == "" ? null : $post['customer_id'],
            'total_price' => $post['subtotal'],
            'discount' => $post['discount'],
            'final_price' => $post['grandtotal'],
            'cash' => $post['cash'],
            'remaining' => $post['change'],
            'note' => $post['note'],
            'date' => $post['date'],
            'user_id' => $this->session->userdata('userid')
        );
        $this->db->insert('sale', $params);
        return $this->db->insert_id();
    }

    function add_sale_detail($params) {
        $this->db->insert_batch('sale_detail', $params);
    }

    public function get_sale($id = null)
    {
        $this->db->select('*, customer.name as customer_name, user.username as user_name,
                        sale.created as sale_created');
        $this->db->from('sale');
        $this->db->join('customer', 'sale.customer_id = customer.customer_id', 'left');
        $this->db->join('user', 'sale.user_id = user.user_id');
        if($id != null) {
            $this->db->where('sale_id', $id);
        }
        $this->db->order_by('date', 'desc');
        $query = $this->db->get();
        return $query;
    }

    public function get_sale_detail($sale_id = null)
    {
        $this->db->from('sale_detail');
        $this->db->join('package', 'sale_detail.package_id = package.package_id');
        if($sale_id != null) {
            $this->db->where('sale_detail.sale_id', $sale_id);
        }
        $query = $this->db->get();
        return $query;
    }

    public function del_sale($id) {
        $this->db->where('sale_id', $id);
        $this->db->delete('sale');
    }
}