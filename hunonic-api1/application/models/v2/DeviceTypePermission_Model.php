<?php
defined('BASEPATH') or exit('No direct script access allowed');


class DeviceTypePermission_Model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->device_type_permission;
    }

    public function getList($type = null)
    {
        $this->db->select("t.id as tid, d.id as did, g.id as gid, t.type, d.action_name, d.action_code, d.action_default, g.name");
        $this->db->from("$this->table t");
        $this->db->join("$this->device_permission d", "d.id = t.permission_id");
        $this->db->join("$this->group_permission g", "g.id = d.group_id");
        if ($type) {
            $this->db->where("type", $type);
        }
        $rs = $this->db->get()->result_array();

        $listTemp = [];
        foreach ($rs as $item) {
            $listTemp[$item['type']][$item['gid']]['id'] = $item['gid'];
            $listTemp[$item['type']][$item['gid']]['name'] = $item['name'];
            $listTemp[$item['type']][$item['gid']]['permission'][$item['did']]['id'] = $item['did'];
            $listTemp[$item['type']][$item['gid']]['permission'][$item['did']]['action_name'] = $item['action_name'];
            $listTemp[$item['type']][$item['gid']]['permission'][$item['did']]['action_code'] = $item['action_code'];
            $listTemp[$item['type']][$item['gid']]['permission'][$item['did']]['action_default'] = $item['action_default'];
        }

        $rs = [];
        foreach ($listTemp as $key => $item) {
            $temp = [];
            foreach ($item as $itemGr) {
                $temp1 = [];
                $temp1['id'] = $itemGr['id'];
                $temp1['name'] = $itemGr['name'];
                $temp1['permission'] = [];
                foreach ($itemGr['permission'] as &$itemPermi) {
                    $temp2 = [];
                    $temp2['id'] = $itemPermi['id'];
                    $temp2['action_name'] = $itemPermi['action_name'];
                    $temp2['action_code'] = $itemPermi['action_code'];
                    $temp2['action_default'] = $itemPermi['action_default'];

                    $temp1['permission'][] = $temp2;
                }
                $temp[] = $temp1;
            }
            $rs[$key] = $temp;
        }
        if ($type) {
            $rs ?? $rs[0];
        }
        return $rs ?? [];
    }

}