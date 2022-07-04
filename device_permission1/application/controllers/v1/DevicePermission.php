<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DevicePermission extends API_Controller
{

    public function __construct()
    {
        parent::__construct();
        //        $token = $this->input->post('token');
        //        $this->user = $this->checkToken($token);
        //        $this->user_id = $this->user['id'];
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
        $this->result_json($this->getDevicePermission($id), "Thêm thành công!");
    }

    public function delete()
    {
        $id = $this->input->get('id');
        $this->getDevicePermission($id);
        $conditions = [
          'id' => $id,
        ];
        $this->DevicePermissionModel->delete_data($conditions);

        $this->result_json(null, "Xóa thành công!");
    }

    public function get()
    {
        $id = $this->input->get('id');
        $this->result_json($this->getDevicePermission($id),
          "Chi tiết quyền");
    }

    public function list()
    {
        $listGroupPermission = $this->DevicePermissionModel->getAll();
        $this->result_json($listGroupPermission, "Danh sách quyền");
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

        $this->result_json($this->getDevicePermission($id),
          "Cập nhật thành công");
    }

    private function getDevicePermission($id)
    {
        $this->checkEmpty($id, ERROR_ID_EMPTY);
        $groupPermission = $this->DevicePermissionModel->get($id);
        $this->checkEmpty($groupPermission, ERROR_ID_NOT_FOUND);
        return $groupPermission;
    }

}
