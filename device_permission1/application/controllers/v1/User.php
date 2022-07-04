<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends API_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function test()
    {
        echo "DaiLy Hunonic";
    }

    public function login()
    {
        $phone = $this->io->post('phone');
        $pass = $this->io->post('password');

        $user = $this->UserModel->login($phone, $pass);
        if ($user) {
            $this->result_json($user);
        } else {
            $this->result_json_error($this->UserModel->errorCode,
              $this->UserModel->messageError);
        }
    }

    public function profile()
    {
        $user = $this->checkToken();
        $this->result_json($user);
    }

    public function updateProfile()
    {
        $token = $this->io->post('token');
        $this->checkToken($token);
        $this->UserModel->updateProfile($token, $_POST);
        $this->result_json();
    }

    public function listUser()
    {
        $this->UserModel->setToken($this->getBearerToken());
        $list = $this->UserModel->listUser();
        $this->result_json($list);
    }

    public function delete()
    {
        $this->isAdmin(true);
        $this->checkToken();
        $id = $this->input->post('id');

        $this->getUser($id);

        $this->UserModel->update_data(["id" => $id], ["active" => 0]);

        $this->result_json(null, "Xoá nhân sự thành công");
    }

    public function add()
    {
        $this->isAdmin(true);
        $this->checkToken();

        $phone = $this->io->post("phone");
        $checkUser = $this->UserModel->checkUserByPhone($phone);

        if (is_null($checkUser)) {
            $this->result_json_error(ERROR_USER_NOT_FOUNT,
              "Số điện thoại không tồn tại người dùng!");
        } else {
            $userId = $checkUser['id'];
            $user = $this->checkUser($userId);
            $fields = [
              'role',
              'position_id',
              'department_id',
            ];

            $data = [];
            $data['active'] = 1;

            foreach ($fields as $field) {
                $tmp = $this->input->post($field);
                if (!empty($tmp)) {
                    $data[$field] = $tmp;
                }
            }
            $data['position_name'] = getUserPositionName($data['position_id']);

            if ($user) {
                if ($user['active'] == 1) {
                    $this->result_json_error(ERROR_INSERT_FAIL,
                      "Người dùng đã thêm trước đó!");
                } else {
                    $this->UserModel->update_data(["id" => $userId], $data);
                    $this->result_json($this->getUser($userId),
                      "Thêm thành công!");
                }
            } else {
                $data['id'] = $userId;
                $id = $this->UserModel->insert_data($data);
                $this->result_json($this->getUser($id), "Thêm thành công!");
            }
        }
    }

    public function updateUser()
    {
        $this->isAdmin(true);
        $this->checkToken();

        $fields = [
          'role',
          'position_id',
          'department_id',
        ];

        $arrayUpdate = [];

        foreach ($fields as $field) {
            $tmp = $this->input->post($field);
            if (!empty($tmp)) {
                $arrayUpdate[$field] = $tmp;
            }
        }
        $arrayUpdate['position_name'] = getUserPositionName($arrayUpdate['position_id']);
        $userID = $this->input->post("id");

        $this->UserModel->update_data(['id' => $userID], $arrayUpdate);

        $this->result_json($this->getUser($userID), "Cập nhật thành công");
    }

    public function listPositionName()
    {
        $this->checkToken();
        $this->result_json(getUserPositionName(0), "Danh sách vị trí chức vụ");
    }

    public function getUser($id)
    {
        $this->checkEmpty($id, ERROR_ID_EMPTY);
        $user = $this->UserModel->get($id);

        $this->checkEmpty($user, ERROR_ID_NOT_FOUND);
        return $user;
    }

    public function checkUser($id)
    {
        $user = $this->UserModel->get($id);
        return $user;
    }

}