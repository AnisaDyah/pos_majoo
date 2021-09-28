<?php 


defined('BASEPATH') OR exit('No direct script access allowed');

class User_model extends CI_Model {

    public function getRiwayat($id_user)
    {
        $this->db->where('fk_user', $id_user);
		$query = $this->db->get('order');
		return $query->result();
    }

    public function ubahfoto($idorder)
    {
       $object= array(
           'bukti_tf' => $this->upload->data('file_name'),
           'status' => 'Belum Dikonfirmasi Admin'
       );
       $this->db->where('id=',$idorder);
       $this->db->update('order',$object);
    }

    public function orderdetail($idorder)
    {
        $query = $this->db->query('select p.nama_produk, d.jml, o.tanggal, o.total from `order` as o inner join order_detail as d on o.id=d.fk_order inner join produk as p on d.fk_produk=p.id_produk where o.id='.$idorder);
        return $query->result();
    }
}

/* End of file User_model.php */


?>