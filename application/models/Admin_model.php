<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_model extends CI_Model {

	public function getData()
	{
		$this->db->select('order.*,user.nama,user.alamat,user.notelp,user.email');
		$this->db->from("order");
		$this->db->join("user","order.fk_user=user.id",'left');
		$this->db->order_by("order.tanggal", "desc");

		$query = $this->db->get();
		return $query->result_array();
	}

	public function getLaporan()
	{
		$query = $this->db->query('select p.nama_produk, p.stok, sum(d.jml) as jumlahterjual from `order` as o inner join order_detail as d on o.id=d.fk_order inner join produk as p on d.fk_produk=p.id_produk GROUP BY p.nama_produk order by jumlahterjual desc');
		return $query->result();
	}

	public function change_status()
	{
		$id = $this->input->post('id');
		$data['status'] = $this->input->post('status');
		$this->db->where('id',$id);
		$this->db->update('order',$data);
	}
}
