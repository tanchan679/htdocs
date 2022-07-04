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
        $email = $this->io->post('email');
        $pass = $this->io->post('password');

        if (empty($email)) {
            $this->result_json_error(ERROR_LOGIN_INFO_EMPTY);

        }
        if (empty($pass)) {
            $this->result_json_error(ERROR_LOGIN_PASSWORD_EMPTY);
        }
        $pass = md5($pass);

        $user = $this->UserModel->login($email, $pass);
        if ($user) {
            $iplogin = getIPAddress();
            $data_add = [
              'token_id' => $user['token_id'],
              'user_id' => $user['ID'],
              'active' => 1,
              'timecreate' => getInstantTime(),
              'ip_login' => $iplogin,
            ];
            if ($this->checkIP_Tokens($iplogin)) {
                $this->TokenModel->insert_data($data_add);
            } else {
                $this->TokenModel->update_data(['ip_login' => $iplogin],
                  $data_add);
            }
            $this->result_json($user);
        } else {
            $this->result_json_error(ERROR_LOGIN_WRONG_PHONE_OR_PASSWORD);
        }
    }

    public function register()
    {
        $email = $this->io->post('email');
        $nickname = $this->io->post('nickname');
        $pass = $this->io->post('password');
        $confirmpassword = $this->io->post('confirmpassword');

        if (empty($email)) {
            $this->result_json_error(ERROR_EMAIL_EMPTY);
        }
        if (empty($pass)) {
            $this->result_json_error(ERROR_LOGIN_PASSWORD_EMPTY);
        }
        if (empty($confirmpassword)) {
            $this->result_json_error(ERROR_CONFIRM_PASSWORD_EMPTY);
        }
        if (empty($nickname)) {
            $this->result_json_error(ERROR_NICKNAME_EMPTY);
        }
        if (!check_email($email)) {
            $this->result_json_error(ERROR_EMAIL_FOMAT);
        }
        if($pass != $confirmpassword){
            $this->result_json_error(PASSWORDS_DO_NOT_MATCH);
        }
        $pass = md5($pass);

        $user = $this->UserModel->login($email, $pass);
        if ($user) {
            $iplogin = getIPAddress();
            $data_add = [
              'token_id' => $user['token_id'],
              'user_id' => $user['ID'],
              'active' => 1,
              'timecreate' => getInstantTime(),
              'ip_login' => $iplogin,
            ];
            if ($this->checkIP_Tokens($iplogin)) {
                $this->TokenModel->insert_data($data_add);
            } else {
                $this->TokenModel->update_data(['ip_login' => $iplogin],
                  $data_add);
            }
            $this->result_json($user);
        } else {
            $this->result_json_error(ERROR_LOGIN_WRONG_PHONE_OR_PASSWORD);
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