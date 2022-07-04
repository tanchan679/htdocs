<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Comment_Model extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = $this->comment;
    }

    public function listCommentOfPost($dataId, $dataType)
    {
        $this->db->select('*');
        $this->db->where("data_id", $dataId);
        $this->db->where("data_type", $dataType);

        $listComment = $this->db->get($this->table)->result_array();

        $userIdList = [];
        $userFields = ['id', 'name', 'avatar'];
        foreach ($listComment as $comment) {
            $userIdList[] = $comment['user_id_create'];
        }

        $listUserByKey = $this->getUserModel()->filterUserListByKey($this->token, $userIdList, $userFields);

        foreach ($listComment as &$comment) {
            $comment['user'] = $listUserByKey[$comment['user_id_create']] ?? null;
        }

        return $listComment;
    }


    public function countRowByColName($name_col){
        $coutComment = array();
        $this->DB->select("*, COUNT(data_id) AS sumcol");
        $this->DB->from($this->table);
        $this->DB->group_by("data_id");

        $list = $this->DB->get()->result_array();
        // die($this->DB->last_query());

        foreach ($list as &$item) {
            $coutComment[$item['data_id']] = $item['sumcol'];
        }
        return $coutComment;
    }

}