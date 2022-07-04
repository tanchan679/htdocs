<?php
defined('BASEPATH') or exit('No direct script access allowed');


class DevicePermission_Model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = $this->device_permission;
    }

    function getList($arr_where)
    {
        $this->db->select("*");
        $this->db->from("$this->table");
        foreach ($arr_where as $key => $value) {
            $this->db->where($key, $value);
        }
        $rs = $this->db->get()->result_array();
        return $rs ?? [];
    }

}

