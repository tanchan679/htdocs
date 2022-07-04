<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comment extends API_Controller
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
        $content = $this->input->post('content');
        $dataType = $this->input->post('data_type');
        $dataId = $this->input->post('data_id');

        $this->checkEmpty($content, ERROR_CONTENT_EMPTY);

        $data_add = [
            "content" => $content,
            "data_type" => $dataType,
            "data_id" => $dataId,
            "user_id_create" => $this->user_id,
        ];

        $id = $this->CommentModel->insert_data($data_add);

        if (empty($id))
            $this->result_json_error(ERROR_INSERT_FAIL);

        $this->result_json($this->checkId($id), "Thêm thành công!");
    }

    public function update()
    {
        $id = $this->input->post('id');
        $content = $this->input->post('content');
        $dataType = $this->input->post('data_type');
        $dataId = $this->input->post('data_id');


        $data_update = [];

        if (!empty($content)) $data_update['content'] = $content;
        if (!empty($dataType)) $data_update['data_type'] = $dataType;
        if (!empty($dataId)) $data_update['data_id'] = $dataId;

        $comment = $this->CommentModel->get($id);
        if (!$comment) {
            $this->result_json_error(ERROR_ID_NOT_FOUND);
        }
        if ($comment && $comment['user_id_create'] != $this->user_id) {
            $this->result_json_error(ERROR_USER_NOT_PERMISSION);
        }

        if (!empty($data_update)) {
            $this->CommentModel->update_data(['id' => $id], $data_update);
        }

        $this->result_json($this->checkId($id), "Cập nhật thành công!");
    }

    public function list()
    {
        $this->CommentModel->setToken($this->getBearerToken());
        $dataType = $this->input->get('data_type');
        $dataId = $this->input->get('data_id');
        $this->result_json($this->CommentModel->listCommentOfPost($dataId, $dataType), "Danh sách bình luận");
    }

    public function get()
    {
        $id = $this->input->post('id');

        $comment = $this->checkId($id);

        $this->result_json($comment, "Chi tiết bình luận");
    }

    public function delete()
    {
        $this->isAdmin(true);

        $id = $this->input->post('id');
        $comment = $this->CommentModel->get($id);
        if (!$comment) {
            $this->result_json_error(ERROR_ID_NOT_FOUND);
        }
        if ($comment && $comment['user_id_create'] != $this->user_id) {
            $this->result_json_error(ERROR_USER_NOT_PERMISSION);
        }

        $this->CommentModel->delete_data(["id" => $id]);

        $this->result_json(null, "Xoá bình luận thành công");
    }

    private function checkId($id)
    {
        $this->checkEmpty($id, ERROR_ID_EMPTY);
        $comment = $this->CommentModel->get($id);

        $this->checkEmpty($comment, ERROR_ID_NOT_FOUND);
        return $comment;
    }
}