<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User_Model extends MY_Model
{

    public $messageError = "";

    public $errorCode = "";

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->users;
    }

    public function login($phone, $pass, $roleRequite = 0)
    {
        $url = URL_HUNONIC_API . "/user/login";
        $data = [
          'phone' => $phone,
          'password' => $pass,
          'app_name' => APP_NAME,
        ];

        // die(json_encode($data));

        $response = callApiPost($url, $data);
        $response = json_decode($response, true);

        $user = $response['data'];
        if ($user == null) {
            $this->messageError = $response['message'];
            return null;
        }

        $token = $user['token_id'];
        $userId = $user['id'];
        $user = null;

        $userDbList = $this->getUserFromDb([$userId]);
        $userDb = $userDbList[0];

        if (!$userDb) {
            $this->errorCode = ERROR_USER_NOT_PERMISSION;
            $this->messageError = getErrorMessage($this->errorCode);
            return null;
        }

        // check role requite
        if ($roleRequite != 0 && $userDb['role'] != $roleRequite) {
            $this->errorCode = ERROR_USER_NOT_PERMISSION;
            $this->messageError = getErrorMessage($this->errorCode);
            return null;
        }

        $listUser = $this->getAndMergerUserData($token, [$userDb]);
        $user = $listUser[0];

        if (!$user) {
            $this->errorCode = ERROR_USER_WRONG_INFO;
            $this->messageError = getErrorMessage($this->errorCode);
            return null;
        }

        $user['token_id'] = $token;
        return $user;
    }

    public function profile($token)
    {
        $response = callApiGet(URL_HUNONIC_API . '/CommonDataUser/getProfileByToken',
          [
            'token' => $token,
          ]);
        $response = json_decode($response, true);
        $user = $response['data'];
        if ($user == null) {
            $this->messageError = $response['message'];
            return null;
        }

        $userId = $user['id'];
        $user = null;

        $userDbList = $this->getUserFromDb([$userId]);
        $userDb = $userDbList[0];

        if (!$userDb) {
            $this->errorCode = ERROR_USER_NOT_PERMISSION;
            $this->messageError = getErrorMessage($this->errorCode);
            return null;
        }

        $listUser = $this->getAndMergerUserData($token, [$userDb]);
        $user = $listUser[0];

        if (!$user) {
            $this->errorCode = ERROR_USER_WRONG_INFO;
            $this->messageError = getErrorMessage($this->errorCode);
            return null;
        }

        $user['token_id'] = $token;
        return $user;
    }


    public function updateProfile($token, $data)
    {
        $data['token'] = $token;
        return callApiPost(URL_HUNONIC_API . '/CommonDataUser/updateUserProfile',
          $data);
    }



    /**
     * dựa trên ds user id đại lý, lấy danh sách user bên hunonic
     * sau đó tạo 1 object với các key là id_hunonic, value là user hunonic
     * $fields -> Loc cac field can thiet cua user
     */
    public function filterUserListByKey($token, $arrUserId, $fields = []): array
    {
        $listUserDb = $this->getUserFromDb($arrUserId);
        $listUser = $this->getAndMergerUserData($token, $listUserDb);

        // filter user with fields if need
        $listUserWithField = [];
        if (count($fields) > 0) {
            foreach ($listUser as $u) {
                $u1 = [];
                foreach ($fields as $field) {
                    $u1[$field] = $u[$field];
                }
                $listUserWithField[] = $u1;
            }
        } else {
            $listUserWithField = $listUser;
        }

        $listUserByKey = [];
        foreach ($listUserWithField as $u) {
            $listUserByKey[$u['id']] = $u;
        }
        return $listUserByKey;
    }

    public function filterPhoneNumberUserListByKey($token, $arrUserId)
    {
        $listUserDb = $this->getUserFromDb($arrUserId);
        $listUser = $this->getAndMergerUserData($token, $listUserDb);

        $listPhoneUser = [];
        foreach ($listUser as $u) {
            $listPhoneUser[$u['id']] = $u['phone'];
        }

        return $listPhoneUser;
    }

    /**
     * dựa trên ds user đại lý, lấy danh sách user bên hunonic
     * sau đó merger các thuộc tính vào 1 list user
     * => trả về 1 list các user đầy đủ các thuộc tính của cả data hunonic và
     * data đại lý
     */
    public function getAndMergerUserData($token, array $listUserDb): array
    {
        $arrUserId = [];
        $listUserDbByKey = [];
        foreach ($listUserDb as $u) {
            $arrUserId[] = $u['id'];
            $listUserDbByKey[$u['id']] = $u;
        }
        //        echo json_encode($arrUserId);
        $listUserHunonic = $this->filterUser($token, $arrUserId);
        //        echo json_encode($listUserHunonic);
        foreach ($listUserHunonic as &$user) {
            $uDL = $listUserDbByKey[$user['id']];

            $keys = [
              'position_id',
              'position_name',
              'department_id',
              'department_name',
              'role',
            ];
            foreach ($keys as $key) {
                $user[$key] = $uDL[$key];
            }
            $user['role_name'] = getUserRoleName($uDL['role']);
        }
        return $listUserHunonic;
    }

    /**
     * dựa trên ds user id đại lý, lấy danh sách user bên hunonic
     */
    public function filterUser($token, $arrUserId)
    {
        $response = callApiGet(URL_HUNONIC_API . '/CommonDataUser/filterUser', [
          'arr_user_id' => json_encode($arrUserId),
          'token' => $token,
        ]);
        $response = json_decode($response, true);
        $listUser = $response['data'] ?? [];
        return $listUser;
    }



    public function checkUserByPhone($phone)
    {
        $res = callApiGet(URL_HUNONIC_API . '/user/getProfileByPhone', ['phone' => $phone]);
        $data = json_decode($res, true);
        //  die(var_dump($data));
        return $data['data'];
    }

}