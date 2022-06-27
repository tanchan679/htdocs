<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GroupPermission extends API_Controller
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
        $name = $this->input->post('name');
        $data_add = [
          'name' => $name,
        ];
        $id = $this->GroupPermissionModel->insert_data($data_add);
        $this->result_json($this->getGroupPermission($id), "Thêm thành công!");
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $this->getGroupPermission($id);
        $conditions = [
          'id' => $id,
        ];

        $this->GroupPermissionModel->delete_data($conditions);

        $this->result_json(null, "Xóa thành công!");
    }

    public function get()
    {
        $id = $this->input->get('id');
        $this->result_json($this->getGroupPermission($id),
          "Chi tiết nhóm quyền");
    }

    public function list()
    {
        $listGroupPermission = $this->GroupPermissionModel->listAll();
        $this->result_json($listGroupPermission, "Danh sách nhóm quyền");
    }

    public function update()
    {
        $name = $this->input->post('name');
        $id = $this->input->post('id');

        $arr_value = [
          'name' => $name,
        ];
        $arr_where = [
          'id' => $id,
        ];
        $this->GroupPermissionModel->update_data($arr_where, $arr_value);

        $this->result_json($this->getGroupPermission($id),
          "Cập nhật thành công");
    }

    private function getGroupPermission($id)
    {
        $this->checkEmpty($id, ERROR_ID_EMPTY);
        $groupPermission = $this->GroupPermissionModel->get($id);
        $this->checkEmpty($groupPermission, ERROR_ID_NOT_FOUND);

        $where = [
          'group_id' => $id,
        ];
        $listPermission = $this->DevicePermissionModel->getList($where);
        $groupPermission['list_permission'] = $listPermission;

        return $groupPermission;
    }

}
