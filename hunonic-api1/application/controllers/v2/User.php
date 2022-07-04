<?php
defined('BASEPATH') or exit('No direct script access allowed');

class User extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getFullProfile()
    {
        $token_id = $this->input->get('token_id');
        $user = $this->checkToken($token_id);
        $user['token_id'] = $token_id;

        die($this->result_json('Thông tin tài khoản', $user));
    }
}

/* End of file User.php */
/* Location: ./application/controllers/API/v2/User.php */
