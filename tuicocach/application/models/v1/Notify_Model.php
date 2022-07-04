<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Notify_Model extends MY_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->table = $this->notify;
    }

    public function getAll()
    {
        $this->db->select('n.*, m.title');
        $this->db->from("$this->table n");
        $this->db->where("n.key_data", "meeting");
        $this->db->join("$this->meeting m", "m.id = n.data_id");
        $this->db->group_by("id");
        $result1 = $this->db->get($this->table)->result_array();

        $this->db->select('n.*, ne.title');
        $this->db->from("$this->table n");
        $this->db->where("n.key_data", "news");
        $this->db->join("$this->news ne", "ne.id = n.data_id");
        $this->db->group_by("id");
        $result2 = $this->db->get($this->table)->result_array();
        // die($this->db->last_query());

        $this->db->select('n.*, t.name');
        $this->db->from("$this->table n");
        $this->db->where("n.key_data", "tasks_fllow");
        $this->db->or_where("n.key_data", "tasks_assign");
        $this->db->join("$this->tasks t", "t.id = n.data_id");
        $this->db->group_by("id");
        $result3 = $this->db->get($this->table)->result_array();

        $result = array_merge($result1, $result2, $result3);

        return $result;
    }

    public function getListOfUser($user_id, $topics_user)
    {
        $this->db->select('n.*, m.title');
        $this->db->from("$this->table n");
        $this->db->where("n.key_data", "meeting");
        $this->db->where("n.topics LIKE '%HUNONIC_WORK_ALL%' OR n.topics LIKE '%$topics_user%'");
        $this->db->join("$this->meeting m", "m.id = n.data_id");
        $this->db->group_by("id");
        $result1 = $this->db->get($this->table)->result_array();

        $this->db->select('n.*, ne.title');
        $this->db->from("$this->table n");
        $this->db->where("n.key_data", "news");
        $this->db->where("n.topics LIKE '%HUNONIC_WORK_ALL%' OR n.topics LIKE '%$topics_user%'");
        $this->db->join("$this->news ne", "ne.id = n.data_id");
        $this->db->group_by("id");
        $result2 = $this->db->get($this->table)->result_array();
        // die($this->db->last_query());

        $this->db->select('n.*, t.name');
        $this->db->from("$this->table n");
        $this->db->where("n.key_data", "tasks");
        $this->db->where("n.topics LIKE '%HUNONIC_WORK_ALL%' OR n.topics LIKE '%$topics_user%'");
        $this->db->join("$this->tasks t", "t.id = n.data_id");
        $this->db->group_by("id");
        $result3 = $this->db->get($this->table)->result_array();

        $result = array_merge($result1, $result2, $result3);
        foreach ($result as &$item) {
            strpos($item['was_read'],
              $user_id) !== false ? $item['was_read'] = 1 : $item['was_read'] = 0;
        }
        return $result;
    }

    public function checkUnread($user_id, $topics_user)
    {
        $this->db->select('n.*');
        $this->db->from("$this->table n");
        $this->db->where("n.topics LIKE '%HUNONIC_WORK_ALL%' OR n.topics LIKE '%$topics_user%'");
        $result = $this->db->get($this->table)->result_array();
        foreach ($result as &$item) {
            if (strpos($item['was_read'], $user_id) !== false) {
                return false;
            }
        }
        return true;
    }

    public function setReadAll($user_id, $topics_user)
    {
        $this->db->select('n.*');
        $this->db->from("$this->table n");
        $this->db->where("n.topics LIKE '%HUNONIC_WORK_ALL%' OR n.topics LIKE '%$topics_user%'");
        $result = $this->db->get($this->table)->result_array();
        $status = false;

        foreach ($result as $item) {
            $was_read = $item['was_read'];
            $listUserID = json_decode($was_read);
            $checkUserRead = false;
            foreach ($listUserID as $item1) {
                if ($user_id == $item1) {
                    $checkUserRead = true;
                    break;
                }
            }
            if ($checkUserRead == true) {
                continue;
            }

            $arr_where = [
              'id'=> $item['id']
            ];

            $listUserID[] = (int)$user_id;
            $arr_value = [
              'was_read' =>json_encode($listUserID)
            ];

            if ($this->update_data($arr_where, $arr_value)) {
                $status = true;
            }
        }
        return $status;
    }

}

