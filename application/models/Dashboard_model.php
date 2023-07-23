<?php if (!defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard_model extends CI_Model
{
    function __construct()
    {
        parent::__construct();
    }

    function getAllAccessPoint()
    {
        $this->db->from('tb_access_point');
        $query = $this->db->get();

        return $query->result();
    }
}
