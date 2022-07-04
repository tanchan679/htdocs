<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Token_Model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->tokens;
    }

    public function getByIP($ip)
    {
        $this->db->select("*");
        $this->db->from($this->table);
        $this->db->where("ip_login", $ip);
        $rs = $this->db->get()->result_array();
        return $rs;
    }

}