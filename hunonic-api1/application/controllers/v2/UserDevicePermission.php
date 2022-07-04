<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserDevicePermission extends API_Controller
{

    public function __construct()
    {
        parent::__construct();
        $token = $this->input->post('token');
        $token ? true : $token = $this->input->get('token');
        $this->user = $this->checkToken($token);
        $this->user_id = $this->user['id'];
    }

    public function add()
    {
        $user_device_id = $this->input->post('user_device_id');
        $permission = $this->input->post('permission');

        if (!$this->UserDevicePermissionModel->tc679_isDevicesAdmin($user_device_id, $this->user_id)){
            die($this->result_json_error(17));
        }

        $permission = json_decode($permission, true);
        $permission = is_array($permission) ? $permission : [];

        $outData = [];
        foreach ($permission as $item) {
            $data = [
              'user_device_id' => $user_device_id,
              'permission_id' => $item,
            ];
            $id = $this->UserDevicePermissionModel->insert_data($data);
            $outData[] = $this->getUserDevicePermission($id);
        }

        die($this->result_json("Thêm thành công!", $outData));
    }

    public function delete()
    {
        $id = $this->input->get('id');
        $this->getUserDevicePermission($id);
        $conditions = [
          'id' => $id,
        ];
        $this->UserDevicePermissionModel->delete_data($conditions);

        die($this->result_json("Xóa thành công!", null));
    }

    public function get()
    {
        $id = $this->input->get('id');
        $data = $this->UserDevicePermissionModel->getAll("", "",
          $id);
        if ($data) {
            if ($data['user_id'] != $this->user_id) {
                die($this->result_json_error(17));
            }
        }

        die($this->result_json("Chi tiết quyền", $data));
    }

    public function list()
    {
        $listGroupPermission = $this->UserDevicePermissionModel->getAll();
        die($this->result_json("Danh sách quyền người dùng",
          $listGroupPermission));
    }

    public function update()
    {
        $user_device_id = $this->input->post('user_device_id');
        $permission = $this->input->post('permission');

        if (!$this->UserDevicePermissionModel->tc679_isDevicesAdmin($user_device_id, $this->user_id)){
            die($this->result_json_error(17));
        }

        $permission = json_decode($permission, true);
        $permission = is_array($permission) ? $permission : [];


        $conditions = [
          'user_device_id' => $user_device_id,
        ];
        $this->UserDevicePermissionModel->delete_data($conditions);

        $outData = [];
        foreach ($permission as $item) {
            $data = [
              'user_device_id' => $user_device_id,
              'permission_id' => $item,
            ];
            $id = $this->UserDevicePermissionModel->insert_data($data);
            $outData[] = $this->getAll($id);
        }

        die($this->result_json("Update thành công!", $outData));
    }

    public function getDevicePermissions()
    {
        $device_id = $this->input->get("device_id");
        die($this->result_json("Danh sách quyền của thiết bị",
          $this->UserDevicePermissionModel->getDevicePermissions($this->user_id,
            $device_id)));
    }

    private function getUserDevicePermission($id)
    {
        $this->checkEmptyValue($id, 142);
        $groupPermission = $this->UserDevicePermissionModel->get($id);
        $this->checkEmptyValue($groupPermission, 141);
        return $groupPermission;
    }

}