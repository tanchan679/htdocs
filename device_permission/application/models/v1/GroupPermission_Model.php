<?php
defined('BASEPATH') or exit('No direct script access allowed');


class GroupPermission_Model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->group_permission;
    }

    public function listAll()
    {
        $list = $this->getAll();

        foreach ($list as &$item) {
            $where = [
              'group_id' => $item['id'],
            ];
            $listPermission = $this->getDevicePermissionModel()->getList($where);
            $item['list_permission'] = $listPermission;
        }
        return $list;
    }

}

