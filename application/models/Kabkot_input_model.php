<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Kabkot_input_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getAllKabkot() 
    {
        $this->db->from('tb_kabkot');
        $query = $this->db->get();

        return $query->result();
    }

    function addKabkot($data)
    {
        return $this->db->insert('tb_kabkot', $data); 
    }
}
 