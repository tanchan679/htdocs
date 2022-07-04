<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DeviceTypePermission extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
        $token = $this->input->post('token');
        $token ? true : $token = $this->input->get('token');
        $this->user = $this->checkToken($token);
        $this->user_id = $this->user['id'];
    }

    public function list()
    {
        $listGroupPermission = $this->DeviceTypePermissionModel->getList();
        die($this->result_json("Danh sách quyền theo loại thiết bị", $listGroupPermission));
    }

    public function get(){
        $type = $this->input->get('type');
        $listGroupPermission = $this->DeviceTypePermissionModel->getList($type);
        die($this->result_json("Danh sách quyền theo loại thiết bị", $listGroupPermission));
    }
}