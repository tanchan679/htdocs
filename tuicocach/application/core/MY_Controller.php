<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Ho_Chi_Minh');

require_once(APPPATH . 'controllers/const.php');
require_once(APPPATH . 'controllers/sql_const.php');
require_once(APPPATH . 'controllers/error_code.php');
require_once(APPPATH . 'controllers/CommonFunctions.php');

class API_Controller extends CI_Controller
{

    public $io;

    protected User_Model $UserModel;

    protected Token_Model $TokenModel;

    protected Comment_Model $CommentModel;

    protected Notify_Model $NotifyModel;

    protected Like_Model $LikeModel;

    protected Post_Model $PostModel;


    protected $user;

    protected $user_id;

    protected $users = "users";

    protected $comment = "comment";

    protected $notify = "notify";

    public function __construct()
    {
        parent::__construct();
        header('Content-Type: application/json');
        ob_start();
        $this->io = $this->input;

        $this->load->model('v1/Like_Model');
        $this->LikeModel = $this->Like_Model;

        $this->load->model('v1/Post_Model');
        $this->PostModel = $this->Post_Model;

        $this->load->model('v1/Comment_Model');
        $this->CommentModel = $this->Comment_Model;

        $this->load->model('v1/Notify_Model');
        $this->NotifyModel = $this->Notify_Model;

        $this->load->model('v1/User_Model');
        $this->UserModel = $this->User_Model;

        $this->load->model('v1/Token_Model');
        $this->TokenModel = $this->Token_Model;
    }

    public function checkIP_Tokens($ip)
    {
        $check = $this->TokenModel->getByIP($ip);
        if ($check) {
            if ($check[0]['ip_login'] == $ip) {
                return false;
            }
        }
        return true;
    }

    public function checkToken()
    {


        // demo
        //        $user = [
        //            'id' => 5,
        //            'role' => 1,
        //            'position' => 1,
        //            "position_name" => "Developer",
        //            "department_id" => 1,
        //            "active" => 1,
        //            "create_at" => "2022-04-23 14:10:29",
        //            "token_id" => "202cb962ac59075b964b07152d234b70"
        //        ];
        //        $this->user = $user;
        //        $this->user_id = $user['id'];
        //        return $user;
        // end demo;

        $token = $this->getBearerToken();

        if (empty($token)) {
            $this->result_json_error(ERROR_TOKEN_EMPTY);
        }

        $user = $this->UserModel->profile($token);
        if (!$user) {
            $this->result_json_error(ERROR_TOKEN_NOT_FOUND);
        }
        $user['token_id'] = $token;

        $this->user = $user;
        $this->user_id = $user['id'];

        return $user;
    }

    public function isAdmin($return_err = false, $user = null)
    {
        $this->user = $this->checkToken();
        $this->user_id = $this->user['id'];
        if (empty($user)) {
            $user = $this->user;
        }
        if ($user['role'] != USER_ROLE_ADMIN && $return_err) {
            $this->result_json_error(ERROR_USER_NOT_PERMISSION);
        }
        return $user['role'] == USER_ROLE_ADMIN;
    }

    public function checkCategory($id)
    {
        $this->checkEmpty($id, ERROR_ID_EMPTY);
        $cate = $this->CategoryModel->get($id);

        $this->checkEmpty($cate, ERROR_ID_NOT_FOUND);
        return $cate;
    }

    public function checkEmpty($value, $err_code)
    {
        if (empty($value)) {
            $this->result_json_error($err_code);
        }
        return true;
    }

    public function checkArr($arr)
    {
        if (empty($arr)) {
            $this->result_json_error(ERROR_JSON_EMPTY);
        }

        if (!is_array($arr)) {
            $this->result_json_error(ERROR_VALUE_NOT_ARRAY);
        }

        return true;
    }

    public function checkDepartment($id)
    {
        $this->checkEmpty($id, ERROR_ID_EMPTY);
        $department = $this->DepartmentModel->get($id);
        $this->checkEmpty($department, ERROR_ID_NOT_FOUND);
        return $department;
    }

    public function checkJSON($string, $die_err = false)
    {
        if (empty($string)) {
            $this->result_json_error(ERROR_JSON_EMPTY);
        }
        if (is_string($string) && is_array(json_decode($string, true))) {
            return json_decode($string, true);
        } else {
            if ($die_err) {
                $this->result_json_error(ERROR_JSON_WRONG);
            }
        }
        return false;
    }


    public function result_json($data = null, $message = 'Success'): string
    {
        $array = [
          "status" => true,
          "message" => $message,
          "data" => $data,
        ];
        ob_end_clean();
        die(json_encode($array));
    }

    public function result_json_error($error_code, $message = '')
    {
        if (empty($message)) {
            $message = getErrorMessage($error_code);
        }
        $rs = [
          "status" => false,
          "message" => $message,
          "data" => null,
          "error_code" => $error_code,
        ];
        ob_end_clean();
        die(json_encode($rs));
    }

    public function pushNotificationsListUser(
      $listIdUser,
      $title,
      $body,
      $images = null,
      $dataNotify = []
    ) {
        $HUNONIC_WORK_USER = [];
        $lisPhonetUserByKey = $this->UserModel->filterPhoneNumberUserListByKey($this->getBearerToken(),
          $listIdUser);

        foreach ($listIdUser as $item) {
            $HUNONIC_WORK_USER[] = "HUNONIC_WORK_$lisPhonetUserByKey[$item]";
        }
        $dataNotify["topics"] = [];
        if ($dataNotify != null) {
            foreach ($HUNONIC_WORK_USER as $item) {
                $dataNotify['topics'][] = $item;
            }
        }
        $dataNotify['topics'] = json_encode($dataNotify['topics']);
        $data_check = [
          "key_data" => $dataNotify['key_data'],
          "data_id" => $dataNotify['data_id'],
        ];

        if ($this->NotifyModel->check_data($data_check)) {
            $this->NotifyModel->delete_data($data_check);
        }
        $this->NotifyModel->insert_data($dataNotify);

        $this->pushNotification($title, $body, $HUNONIC_WORK_USER,
          $images = null);
    }

    public function pushNotificationsAll(
      $title,
      $body,
      $role,
      $images,
      $dataNotify = []
    ) {
        if ($dataNotify != null) {
            $this->NotifyModel->insert_data($dataNotify);
        }
        $this->pushNotification($title, $body, ["$role"], $images);
    }

    public function pushNotification($title, $body, $arr_topic, $image = null)
    {
        foreach ($arr_topic as $item) {
            $data = [
              "to" => "/topics/$item",
              "notification" => [
                "title" => $title,
                "body" => $body,
                "content_available" => true,
                "priority" => "high",
                "sound" => 1,
                "show_in_foreground" => true,
                "image" => !empty($image) ? $image : "",
              ],
              "apns" => [
                "payload" => [
                  "aps" => [
                    "mutable-content" => 1,
                  ],
                ],
                "fcm_options" => [
                  "image" => !empty($image) ? $image : "",
                ],
              ],
              "data" => null,
            ];
            $data_string = json_encode($data);

            $curl = curl_init('https://fcm.googleapis.com/fcm/send');

            curl_setopt($curl, CURLOPT_CUSTOMREQUEST, "POST");
            curl_setopt($curl, CURLOPT_POSTFIELDS, $data_string);
            curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
            curl_setopt($curl, CURLOPT_HTTPHEADER,
              [
                'Content-Type:application/json',
                'Authorization:key=AAAAX5fTX3U:APA91bHi8ir_3F2U4G-WVPagkb0pV3ITNOhGpiFAzZg927A-lRmsCMBDwri6XRQTlEnfvZ-8pJ1zEmdmBm8GlIZyQ2a86BmYuxVQ0aNID23sQa_Z6jZQ1fj84WvOGr-galf-eokGe_Tm',
              ]
            );

            curl_exec($curl);
            curl_close($curl);
        }
    }

    private function getAuthorizationHeader()
    {
        $headers = null;
        if (isset($_SERVER['Authorization'])) {
            $headers = trim($_SERVER["Authorization"]);
        } else {
            if (isset($_SERVER['HTTP_AUTHORIZATION'])) { //Nginx or fast CGI
                $headers = trim($_SERVER["HTTP_AUTHORIZATION"]);
            } elseif (function_exists('apache_request_headers')) {
                $requestHeaders = apache_request_headers();
                // Server-side fix for bug in old Android versions (a nice side-effect of this fix means we don't care about capitalization for Authorization)
                $requestHeaders = array_combine(array_map('ucwords',
                  array_keys($requestHeaders)), array_values($requestHeaders));
                //print_r($requestHeaders);
                if (isset($requestHeaders['Authorization'])) {
                    $headers = trim($requestHeaders['Authorization']);
                }
            }
        }
        return $headers;
    }

    protected function getBearerToken()
    {
        $headers = $this->getAuthorizationHeader();
        // HEADER: Get the access token from the header
        if (!empty($headers)) {
            if (preg_match('/Bearer\s(\S+)/', $headers, $matches)) {
                return $matches[1];
            }
        }
        return null;
    }

}