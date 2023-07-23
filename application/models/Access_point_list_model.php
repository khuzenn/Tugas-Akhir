<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Access_point_list_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getAllAccessPoint()
    {
        $this->db->from('view_access_point');
        $this->db->order_by('id', 'DESC');
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

    function deleteAccessPoint($id)
	{
		$this->db->where('id', $id);
		$query = $this->db->delete('view_access_point');

		return $query;
	}

    function getAccessPoint($id)
	{
		$this->db->where('tb_access_point.id', $id);
		$this->db->select("*"); 
		$this->db->from("tb_access_point");

		$query = $this->db->get();
		$res = $query->result();

		return $res[0];
	}

    function suntingAccessPoint($data, $condition)
	{
		$this->db->where($condition);
		$this->db->update('tb_access_point', $data);
	}

    function addBatchAccessPoint($data)
    {
        return $this->db->insert('tb_access_point', $data);
    }

}
