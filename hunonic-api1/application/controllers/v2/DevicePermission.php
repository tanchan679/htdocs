<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DevicePermission extends API_Controller
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
        $fields = [
          'type_id',
          'group_id',
          'action_name',
          'action_code',
          'action_default',
        ];

        $data = [];
        foreach ($fields as $field) {
            $tmp = $this->input->post($field);
            if (!empty($tmp)) {
                $data[$field] = $tmp;
            }
        }

        $id = $this->DevicePermissionModel->insert_data($data);
        die($this->result_json("Thêm thành công!",
          $this->getDevicePermission($id)));
    }

    public function delete()
    {
        $id = $this->input->get('id');
        $this->getDevicePermission($id);
        $conditions = [
          'id' => $id,
        ];
        $this->DevicePermissionModel->delete_data($conditions);

        die($this->result_json(null, "Xóa thành công!"));
    }

    public function get()
    {
        $id = $this->input->get('id');
        die($this->result_json("Chi tiết quyền",$this->getDevicePermission($id)));
    }

    public function list()
    {
        $listGroupPermission = $this->DevicePermissionModel->getAll();
        die($this->result_json("Danh sách quyền", $listGroupPermission));
    }

    public function update()
    {
        $fields = [
          'type_id',
          'group_id',
          'action_name',
          'action_code',
        ];

        $data = [];
        foreach ($fields as $field) {
            $tmp = $this->input->post($field);
            if (!empty($tmp)) {
                $data[$field] = $tmp;
            }
        }
        $data['action_default'] = $this->input->post('action_default');
        $id = $this->input->post('id');

        $arr_where = [
          'id' => $id,
        ];
        $this->DevicePermissionModel->update_data($arr_where, $data);

        die($this->result_json("Cập nhật thành công",
          $this->getDevicePermission($id)));
    }

    private function getDevicePermission($id)
    {
        $this->checkEmptyValue($id, 142);
        $groupPermission = $this->DevicePermissionModel->get($id);
        $this->checkEmptyValue($groupPermission, 141);
        return $groupPermission;
    }

}