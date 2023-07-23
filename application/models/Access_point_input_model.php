<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Access_point_input_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getAllKota()
    {
        $this->db->from('tb_kota');
        $query = $this->db->get();

        return $query->result();
    }

    function addAccessPoint($data)
    {
        return $this->db->insert('tb_access_point', $data);
    }

    function getDetailKota($id_kota)
	{
		$this->db->where('id_kota', $id_kota);
		$this->db->from('tb_kota');
		$query = $this->db->get();

		return $query->result();
	}
    
    function getDetailAccessPoint($id)
    {
        $this->db->where('id', $id);
        $this->db->from('view_access_point');
        $query = $this->db->get();

        return $query->row();
    }

    function addBatchAccessPoint($data)
    {
        return $this->db->insert_batch('tb_access_point', $data);
    }
}
 