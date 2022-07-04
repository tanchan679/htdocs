<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notify extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
        $token = $this->input->post('token');
        $this->user = $this->checkToken($token);
        $this->user_id = $this->user['id'];
    }

    public function add()
    {
        $key_data = $this->input->post('key_data');
        $topics = $this->input->post('topics');
        $data_id = $this->input->post('data_id');
        $content = $this->input->post('content');
        $was_read = $this->input->post('was_read');

        $this->checkEmpty($content, ERROR_CONTENT_EMPTY);

        $data_add = [
            "key_data" => $key_data,
            "topics" => $topics,
            "content" => $content,
            "data_id" => $data_id,
            "was_read" => $was_read
        ];

        $id = $this->NotifyModel->insert_data($data_add);
        $this->result_json($this->NotifyModel->get($id), "Thêm thành công!");
    }


    public function update()
    {
        $id = $this->input->post('id');
        $key_data = $this->input->post('key_data');
        $topics = $this->input->post('topics');
        $data_id = $this->input->post('data_id');
        $content = $this->input->post('content');
        $was_read = $this->input->post('was_read');

        $this->checkId($id);

        $data_update = [
          "key_data" => $key_data,
          "topics" => $topics,
          "content" => $content,
          "data_id" => $data_id,
          "was_read" => $was_read
        ];

        if (!empty($key_data)) $data_update['key_data'] = $key_data;
        if (!empty($content)) $data_update['content'] = $content;
        if (is_numeric($data_id)) $data_update['data_id'] = $data_id;
        if (!empty($was_read)) $data_update['was_read'] = $was_read;

        $this->NotifyModel->update_data(['id' => $id], $data_update);

        $this->result_json($this->NotifyModel->get($id), "Cập nhật thành công!");
    }

    public function list()
    {
        $this->result_json($this->NotifyModel->getAll(), "Danh sách thông báo");
    }

    public function listOfUser()
    {
        $topics_user = "HUNONIC_WORK_".$this->UserModel->filterPhoneNumberUserListByKey($this->getBearerToken(), [$this->user_id])[$this->user_id];
        $data = $this->NotifyModel->getListOfUser($this->user_id,$topics_user);
        $this->result_json($data, "Danh sách thông báo");
    }

    public function get()
    {
        $id = $this->input->get('id');

        $notify = $this->checkId($id);

        $this->result_json($notify, "Chi tiết thông báo");
    }

    public function checkUnread(){
        $topics_user = "HUNONIC_WORK_".$this->UserModel->filterPhoneNumberUserListByKey($this->getBearerToken(), [$this->user_id])[$this->user_id];
        $data = $this->NotifyModel->checkUnread($this->user_id,$topics_user);
        $this->result_json($data, "Kiểm tra thông báo");
    }

    public function setReadAll(){
        $topics_user = "HUNONIC_WORK_".$this->UserModel->filterPhoneNumberUserListByKey($this->getBearerToken(), [$this->user_id])[$this->user_id];
        $data = $this->NotifyModel->setReadAll($this->user_id,$topics_user);
        $this->result_json($data, "Đã đọc tất cả thông báo");
    }

    public function delete()
    {
        $this->isAdmin(true);

        $id = $this->input->post('id');

        $this->checkId($id);

        $this->NotifyModel->delete_data(["id" => $id]);

        $this->result_json(null, "Xoá thông báo thành công");
    }


    private function checkId($id)
    {
        if (empty($id)) $this->result_json_error(ERROR_ID_EMPTY);
        $notify = $this->NotifyModel->get($id);
        if (empty($notify)) $this->result_json_error(ERROR_ID_NOT_FOUND);
        return $notify;
    }
}
