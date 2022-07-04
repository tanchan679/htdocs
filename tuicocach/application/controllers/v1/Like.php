<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Like extends API_Controller
{
    public function __construct()
    {
        parent::__construct();
        $token = $this->input->post('token');
        $this->user = $this->checkToken($token);
        $this->user_id = $this->user['id'];
    }

    public function like()
    {
        $dataId = $this->input->post('data_id');
        $dataType = $this->input->post('data_type');
        $isLike = $this->input->post('is_like');

        $data = [
            "user_id" => $this->user_id,
            "data_id" => $dataId,
            "data_type" => $dataType,
        ];

        if (!$isLike) {
            $id = $this->LikeModel->delete_data($data, "like");
            $this->result_json(null, "Hủy like thành công");
        } else if (!$this->LikeModel->checkLike($data)) {
            $id = $this->LikeModel->insert_data($data);
            $this->result_json($this->checkId($id), "Thêm like thành công");
        } else {
            $this->result_json_error(0, 'Bạn đã like');
        }
    }

    public function list_user_like_of_post()
    {
        $this->LikeModel->setToken($this->getBearerToken());
        $dataId = $this->input->get('data_id');
        $dataType = $this->input->get('data_type');
        $this->result_json($this->LikeModel->listLikeOfPost($dataId, $dataType), "Danh sách Like");
    }

    private function checkId($id)
    {
        $this->checkEmpty($id, ERROR_ID_EMPTY);

        $like = $this->LikeModel->get($id);

        $this->checkEmpty($like, ERROR_ID_NOT_FOUND);
        return $like;
    }


}