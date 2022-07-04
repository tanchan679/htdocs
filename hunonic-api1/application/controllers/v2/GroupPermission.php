<?php
defined('BASEPATH') or exit('No direct script access allowed');

class GroupPermission extends API_Controller
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
        $name = $this->input->post('name');
        $data_add = [
          'name' => $name,
        ];
        $id = $this->GroupPermissionModel->insert_data($data_add);
        die($this->result_json("Thêm thành công!",
          $this->getGroupPermission($id)));
    }

    public function delete()
    {
        $id = $this->input->post('id');
        $this->getGroupPermission($id);
        $conditions = [
          'id' => $id,
        ];

        $this->GroupPermissionModel->delete_data($conditions);

        die($this->result_json("Xóa thành công!", null));
    }

    public function get()
    {
        $id = $this->input->get('id');
        die($this->result_json("Chi tiết nhóm quyền",
          $this->getGroupPermission($id)));
    }

    public function list()
    {
        $listGroupPermission = $this->GroupPermissionModel->listAll();
        die($this->result_json("Danh sách nhóm quyền", $listGroupPermission));
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
        die($this->result_json("Cập nhật thành công",
          $this->getGroupPermission($id)));
    }

    private function getGroupPermission($id)
    {
        $this->checkEmptyValue($id, 142);
        $groupPermission = $this->GroupPermissionModel->get($id);
        if($groupPermission == false){
            die($this->result_json_error(141));
        }

        $where = [
          'group_id' => $id,
        ];
        $listPermission = $this->DevicePermissionModel->getList($where);
        $groupPermission['list_permission'] = $listPermission;

        return $groupPermission;
    }

}