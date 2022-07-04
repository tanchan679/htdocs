<?php
class Like_Model  extends MY_Model
{
    public function __construct()
    {
        parent::__construct();
        $this->table = $this->likes;
    }
    /**
     * count rows from a column with a specified value
     * @param string $table [name of table]
     * @param $name_col [name of column - count the number of rows based on this column]
     * @param $value [value of the column to count]
     * @return int
     */
    public function countRowByColName($name_col){
        $coutLike = array();
        $this->DB->select("*, COUNT(data_id) AS sumcol");
        $this->DB->from($this->table);
        $this->DB->group_by("data_id");

        $list = $this->DB->get()->result_array();
        //die($this->DB->last_query());
        foreach ($list as &$item) {
            $coutLike[$item['data_id']] = $item['sumcol'];
        }
        return $coutLike;
    }


    public function listLikeOfPost($data_id, $data_type){
        $this->DB->select("*");
        $this->DB->from($this->table);
        $this->DB->where('data_id',$data_id);
        $this->DB->where('data_type',$data_type);
        $list = $this->DB->get()->result_array();
        // die($this->DB->last_query());

        $userIdList = [];
        $userFields = ['id', 'name', 'avatar'];

        foreach ($list as $like) {
            $userIdList[] = $like['user_id'];
        }

        $listUserByKey = $this->getUserModel()->filterUserListByKey($this->token, $userIdList, $userFields);

        foreach ($list as &$like) {
            $like['user'] = $listUserByKey[$like['user_id']] ?? null;
        }

        return $list;
    }

    public function checkLike($data)
    {
        $this->DB->select("*");
        $this->DB->from($this->table);
        $this->DB->where('user_id',$data['user_id']);
        $this->DB->where('data_id',$data['data_id']);
        $this->DB->where('data_type',$data['data_type']);
        return $this->DB->count_all_results();
    }

}