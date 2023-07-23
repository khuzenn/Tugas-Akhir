<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kabkot_list_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    // public function get_data($table)
    // {
    //     return $this->db->get($table);
    // }

    function getAllKabkot()
    {
        $this->db->from('tb_kabkot');
        $this->db->order_by('id_kabkot', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }

    function getDetailKabkot($id_kabkot)
    {
        $this->db->where('id_kabkot', $id_kabkot);
        $this->db->from('tb_kabkot');
        $query = $this->db->get();

        return $query->row();
    }

    function deleteKabkot($id_kabkot)
	{
		$this->db->where('id_kabkot', $id_kabkot);
		$query = $this->db->delete('tb_kabkot');

		return $query;
	}

    function getKabkot($id_kabkot)
	{
		$this->db->where('tb_kabkot.id_kabkot', $id_kabkot);
		$this->db->select("*"); 
		$this->db->from("tb_kabkot");

		$query = $this->db->get();
		$res = $query->result();

		return $res[0];
	}

    function suntingKabkot($data, $condition)
	{
		$this->db->where($condition);
		$this->db->update('tb_kabkot', $data);
	}
}
 