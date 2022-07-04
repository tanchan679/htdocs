<?php
defined('BASEPATH') or exit('No direct script access allowed');


class UserDevicePermission_Model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->user_device_permission;
    }

    public function getAll(
      $user_id = null,
      $device_id = null,
      $id = null
    ) {
        $this->db->select("d.*, p.*, u.user_id, u.device_id, d.id as did, p.id as pid");
        $this->db->from("$this->table d");
        $this->db->join("user_devices u", "u.id = d.user_device_id");
        $this->db->join("$this->device_permission p", "p.id = d.permission_id");
        if ($id) {
            $this->db->where("d.id", $id);
        } else {
            if ($user_id) {
                $this->db->where("u.user_id", $user_id);
            }
            if ($device_id) {
                $this->db->where("u.device_id", $device_id);
            }
        }
        $listPermissions = $this->db->get()->result_array();
        $rs = [];

        foreach ($listPermissions as $item) {
            $rs[$item['user_device_id']]['user_id'] = $item['user_id'];
            $rs[$item['user_device_id']]['device_id'] = $item['device_id'];
            $rs[$item['user_device_id']]['permissions'][$item['pid']]['id'] = $item['pid'];
            $rs[$item['user_device_id']]['permissions'][$item['pid']]['action_name'] = $item['action_name'];
            $rs[$item['user_device_id']]['permissions'][$item['pid']]['action_code'] = $item['action_code'];
            $rs[$item['user_device_id']]['permissions'][$item['pid']]['action_default'] = $item['action_default'];
        }

        $listPermissions = $rs;
        $rs = [];

        foreach ($listPermissions as $item) {
            $temp = [];
            foreach ($item['permissions'] as $key => $value) {
                $temp[] = $value;
            }
            $item['permissions'] = $temp;
            $rs[] = $item;
        }
        if ($device_id || $id) {
            $rs = $rs ? $rs[0] : [];
        }
        return $rs;
    }

    public function getDevicePermissions(
      $user_id = null,
      $device_id = null
    ) {
        $this->db->select("d.*, p.*, u.user_id, u.device_id, d.id as did, p.id as pid");
        $this->db->from("$this->table d");
        $this->db->join("user_devices u", "u.id = d.user_device_id");
        $this->db->join("$this->device_permission p", "p.id = d.permission_id");

        if ($user_id) {
            $this->db->where("u.user_id", $user_id);
        }
        if ($device_id) {
            $this->db->where("u.device_id", $device_id);
        }

        $listPermissions = $this->db->get()->result_array();
        $rs = [];

        foreach ($listPermissions as $item) {
            $rs[$item['user_device_id']][$item['pid']]['id'] = $item['pid'];
            $rs[$item['user_device_id']][$item['pid']]['action_name'] = $item['action_name'];
            $rs[$item['user_device_id']][$item['pid']]['action_code'] = $item['action_code'];
            $rs[$item['user_device_id']][$item['pid']]['action_default'] = $item['action_default'];
        }

        $listPermissions = $rs;
        $rs = [];

        foreach ($listPermissions as $key => $item) {
            $temp = [];
            foreach ($item as $key1 => $value) {
                $temp[] = $value;
            }
            $rs[] = $temp;
        }
        $rs = $rs ? $rs[0] : [];
        return $rs;
    }
}

