<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Slider_list_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getAllSlider()
    {
        $this->db->from('view_slider');
        $this->db->order_by('id_slider', 'DESC');
        $query = $this->db->get();

        return $query->result();
    }

    function getDetailSlider($id_slider) 
    {
        $this->db->where('id_slider', $id_slider);
        $this->db->from('view_slider');
        $query = $this->db->get();

        return $query->row();
    }

    function getSlider($id_slider)
	{
		$this->db->where('view_slider.id_slider', $id_slider);
		$this->db->select("*"); 
		$this->db->from("view_slider");

		$query = $this->db->get();
		$res = $query->result();

		return $res[0];
	}

    function suntingSlider($data, $condition)
	{
		$this->db->where($condition);
		$this->db->update('tb_slider', $data);
	}

    function deleteSlider($id_slider)
	{
		$this->db->where('id_slider', $id_slider);
		$query = $this->db->delete('tb_slider');

		return $query;
	}

}
