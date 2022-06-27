<?php
defined('BASEPATH') or exit('No direct script access allowed');

class UserDevicePermission extends API_Controller
{

    public function __construct()
    {
        parent::__construct();
        //        $token = $this->input->post('token');
        //        $this->user = $this->checkToken($token);
        //        $this->user_id = $this->user['id'];
        $this->user_id = 8;
    }

    public function add()
    {
        $fields = [
          'user_device_id',
          'permission_id',
        ];

        $data = [];
        foreach ($fields as $field) {
            $tmp = $this->input->post($field);
            if (!empty($tmp)) {
                $data[$field] = $tmp;
            }
        }

        $id = $this->UserDevicePermissionModel->insert_data($data);
        $this->result_json($this->getUserDevicePermission($id), "Thêm thành công!");
    }

    public function delete()
    {
        $id = $this->input->get('id');
        $this->getUserDevicePermission($id);
        $conditions = [
          'id' => $id,
        ];
        $this->UserDevicePermissionModel->delete_data($conditions);

        $this->result_json(null, "Xóa thành công!");
    }

    public function get()
    {
        $id = $this->input->get('id');
        $this->result_json($this->UserDevicePermissionModel->getDevicePermissions("","",$id),
          "Chi tiết quyền");
    }

    public function list()
    {
        $listGroupPermission = $this->UserDevicePermissionModel->getDevicePermissions();
        $this->result_json($listGroupPermission, "Danh sách quyền người dùng");
    }

    public function update()
    {
        $fields = [
          'user_device_id',
          'permission_id',
        ];

        $data = [];
        foreach ($fields as $field) {
            $tmp = $this->input->post($field);
            if (!empty($tmp)) {
                $data[$field] = $tmp;
            }
        }

        $id = $this->input->post('id');

        $arr_where = [
          'id' => $id,
        ];
        $this->UserDevicePermissionModel->update_data($arr_where, $data);

        $this->result_json($this->getUserDevicePermission($id),
          "Cập nhật thành công");
    }

    public function devicePermissions(){
        $device_id = $this->input->get("device_id");
        $this->result_json($this->UserDevicePermissionModel->getDevicePermissions($this->user_id, $device_id),
          "Danh sách quyền của thiết bị");
    }
    
    private function getUserDevicePermission($id)
    {
        $this->checkEmpty($id, ERROR_ID_EMPTY);
        $groupPermission = $this->UserDevicePermissionModel->get($id);
        $this->checkEmpty($groupPermission, ERROR_ID_NOT_FOUND);
        return $groupPermission;
    }

}
