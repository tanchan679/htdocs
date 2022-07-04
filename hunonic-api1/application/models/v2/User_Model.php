<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = $this->users;
    }

    public function getUser($token_id)
    {
        $this->db->select('u.id, u.name, u.phone, u.avatar, u.timecreate, u.app_role, u.timeupdate, u.domain,
         r.name as role_name, r.id as role_id, u.room_id as room_default_id, t.active, u.time_used, u.isHasCamera2v');
        $this->db->from("$this->users u");
        $this->db->join("$this->tokens t", 'u.id = t.user_id');
        $this->db->join("$this->roles r", 'u.role_id = r.id');
        $this->db->where('t.token_id', $token_id);
        $this->db->where('t.active', 1);
        $result = $this->db->get()->result_array();
        if (empty($result)) return false;
        return $result[0];
    }

    public function getUserOfRootID($root_id)
    {
        if (empty($root_id)) return false;
        $this->db->select('u.id, u.name, u.phone');
        $this->db->from("$this->device_root droot");
        $this->db->join("$this->users u", 'droot.user_id = u.id');
        $this->db->where('droot.id', $root_id);
        $result = $this->db->get()->result_array();
        return !isset($result[0]) ? false : $result[0];
    }

    public function getUserByID($user_id, $app_role = 1)
    {
        $this->db->select('u.id, u.name, u.phone, u.timecreate, u.timeupdate');
        $this->db->from("$this->users u");
        if ($app_role) $this->db->where('u.app_role', $app_role);

        $this->db->where('u.id', $user_id);
        $result = $this->db->get()->result_array();

        if ($result) return $result;
        else return false;
    }

}