<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Slider_input_model extends CI_Model 
{
    function __construct()
    {
        parent::__construct();
    }

    function getAllSlider()
    {
        $this->db->from('tb_slider');
        $query = $this->db->get();

        return $query->result();
    }

    function addSlider($data)
    {
        return $this->db->insert('tb_slider', $data);
    }

    function getAllKabkot()
    {   
        $this->db->from('tb_kabkot');
        $query = $this->db->get();

        return $query->result();

    }
}
 