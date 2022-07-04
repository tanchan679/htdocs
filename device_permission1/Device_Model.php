<?php if (!defined('BASEPATH')) {
    exit('No direct script access allowed');
}

class Device_Model extends MY_Model
{

    protected $device_gg_home = [
      "switch",
      "blindwifi",
      "irchild",
      "sdoor",
      "blindwifiv2",
    ];

    public function __construct()
    {
        parent::__construct();
    }

    public function getRootShareByUser($user_share, $root_id)
    {
        if (empty($user_share) || empty($root_id)) {
            return false;
        }
        $this->db->select('*');
        $this->db->from("$this->share_root");
        $this->db->where('user_share', $user_share);
        $this->db->where('root_id', $root_id);
        $this->db->where('active', 0);
        $result = $this->db->get()->result_array();
        if (empty($result)) {
            return false;
        }
        return $result[0];
    }

    public function getShareRoot($id)
    {
        if (empty($id)) {
            return false;
        }
        $this->db->select('*');
        $this->db->from("$this->share_root");
        $this->db->where('id', $id);
        $this->db->where('active', 0);
        $result = $this->db->get()->result_array();
        if (empty($result)) {
            return false;
        }
        return $result[0];
    }

    public function listRootShared($user_id)
    {
        if (empty($user_id)) {
            return false;
        }
        $this->db->select('sr.*, u.name, u.phone');
        $this->db->from("$this->share_root sr");
        $this->db->join("$this->users u", "sr.user_receive = u.id");
        $this->db->where('user_share', $user_id);
        $result = $this->db->get()->result_array();
        if (empty($result)) {
            return false;
        }
        return $result;
    }

    public function listRootReceived($user_id)
    {
        if (empty($user_id)) {
            return false;
        }
        $this->db->select('sr.*, u.name, u.phone');
        $this->db->from("$this->share_root sr");
        $this->db->join("$this->users u", "sr.user_share = u.id");
        $this->db->where('user_receive', $user_id);
        $result = $this->db->get()->result_array();
        if (empty($result)) {
            return false;
        }
        return $result;
    }

    public function addRootShare($data)
    {
        if (empty($data)) {
            return false;
        }
        return $this->insert_data($this->share_root, $data);
    }

    public function addAlarmCycle($data)
    {
        if (empty($data)) {
            return false;
        }
        return $this->insert_data($this->alarm_cycle, $data);
    }

    public function updateAlarmCycle($alarm_id, $data)
    {
        if (empty($alarm_id) || empty($data)) {
            return false;
        }
        $this->db->where('id', $alarm_id);
        return $this->db->update($this->alarm_cycle, $data);
    }

    public function getAlarmCycle($alarm_id)
    {
        if (empty($alarm_id)) {
            return false;
        }
        $this->db->select('*');
        $this->db->from("$this->alarm_cycle");
        $this->db->where('id', $alarm_id);
        $result = $this->db->get()->result_array();
        if (empty($result)) {
            return false;
        }
        return $result[0];
    }

    public function deleteAlarmCycle($alarm_id)
    {
        if (empty($alarm_id)) {
            return false;
        }
        $this->db->where('id', $alarm_id);
        $this->db->delete($this->alarm_cycle);
    }

    public function getAllAlarm()
    {
        $this->db->select('*');
        $this->db->from($this->device_alarm);
        return $this->db->get()->result_array();
    }

    public function checkArrAlarm($arr_id, $user_id)
    {
        if (empty($arr_id) || empty($user_id)) {
            return false;
        }
        $this->db->select('da.*');
        $this->db->from("$this->device_alarm da");
        $this->db->join("$this->user_devices ud",
          'da.device_id = ud.device_id');
        $this->db->where_in("da.id", $arr_id);
        $this->db->where("ud.user_id", $user_id);
        return $this->db->get()->result_array();
    }

    public function getAlarmByUser($user_id)
    {
        $this->db->select('da.*');
        $this->db->from("$this->device_alarm da");
        $this->db->join("$this->devices d", 'da.device_id = d.id');
        $this->db->join("$this->device_root droot", 'd.root_id = droot.id');
        $this->db->where('droot.user_id', $user_id);
        return $this->db->get()->result_array();
    }

    public function getInfoDeviceOfUser($user_id)
    {
        $this->db->select('*');
        $this->db->from("$this->device_root droot");
        $this->db->where('user_id', $user_id);
        return $this->db->get()->result_array();
    }

    public function getAllDeviceRoot()
    {
        $this->db->select('u.*, COUNT(droot.id) as num_device');
        $this->db->from("$this->users u");
        $this->db->join("$this->device_root droot", 'u.id = droot.user_id');
        $this->db->group_by('u.id');
        return $this->db->get()->result_array();
    }

    public function insertHome($data)
    {
        if (empty($data)) {
            return false;
        }
        return $this->insert_data($this->home, $data);
    }

    public function getHome($user_id, $home_id)
    {
        if (empty($user_id) || empty($home_id)) {
            return false;
        }
        $this->db->select('h.*');
        $this->db->from("$this->users u");
        $this->db->join("$this->home h", 'u.id = h.user_id');
        $this->db->where('u.id', $user_id);
        $this->db->where('h.id', $home_id);
        $result = $this->db->get()->result_array();
        if (empty($result)) {
            return false;
        } else {
            return $result[0];
        }
    }

    public function getRoomOfIrRoot($root_id, $user_id)
    {
        if (empty($root_id)) {
            return false;
        }
        $this->db->select('room.*');
        $this->db->from("$this->devices d");
        $this->db->join("$this->device_room droom", "d.id = droom.device_id");
        $this->db->join("$this->rooms room", "droom.room_id = room.id");
        $this->db->where('d.root_id', $root_id);
        $this->db->where('room.user_id', $user_id);
        $result = $this->db->get()->result_array();
        if (empty($result)) {
            return false;
        } else {
            return $result[0]['id'];
        }
    }

    public function getHomeOfRoom($room_id)
    {
        if (empty($room_id)) {
            return false;
        }
        $this->db->select('h.*');
        $this->db->from("$this->rooms r");
        $this->db->join("$this->home h", 'r.home_id = h.id');
        $this->db->where('r.id', $room_id);
        $result = $this->db->get()->result_array();
        if (empty($result)) {
            return false;
        } else {
            return $result[0];
        }
    }

    public function listHome($user_id)
    {
        if (empty($user_id)) {
            return [];
        }
        $this->db->select('h.*');
        $this->db->from("$this->home h");
        $this->db->where('h.user_id', $user_id);
        return $this->db->get()->result_array();
    }

    public function deleteHome($home_id)
    {
        if (empty($home_id)) {
            return false;
        }
        $this->db->where('id', $home_id);
        return $this->db->delete($this->home);
    }

    public function editHome($user_id, $home_id, $data)
    {
        if (empty($user_id) || empty($data) || empty($home_id)) {
            return false;
        }
        $this->db->where('user_id', $user_id);
        $this->db->where('id', $home_id);
        return $this->db->update($this->home, $data);
    }

    public function getRoomOfHome($home_id)
    {
        if (empty($home_id)) {
            return false;
        }
        $this->db->select('r.*');
        $this->db->from("$this->rooms r");
        $this->db->where('home_id', $home_id);
        $result = $this->db->get()->result_array();
        if (empty($result)) {
            return false;
        } else {
            return $result;
        }
    }

    public function getAllDevice()
    {
        $this->db->select("ud.user_id, d.id, d.name, dr.id as root_id");
        $this->db->from("$this->user_devices ud");
        $this->db->join("$this->devices d", 'ud.device_id = d.id');
        $this->db->join("$this->device_root dr", 'd.root_id = dr.id');
        $this->db->where('ud.device_role', 2);
        $this->db->where('ud.active', 1);
        $this->db->limit(100, 301);
        return $this->db->get()->result_array();
    }

    public function listMetaDevice($user_id, $meta_keys)
    {
        $this->db->select("ud.device_id as id");
        $this->db->from("$this->user_devices ud");
        $this->db->where('ud.user_id', $user_id);
        $this->db->where('ud.active', 1);
        $subQuery = $this->db->get_compiled_select();

        $this->db->select('*');
        $this->db->from("$this->meta_data md");
        $this->db->group_start();
        foreach ($meta_keys as $key => $value) {
            $this->db->or_like("meta_key", $value);
        }
        $this->db->group_end();
        $this->db->where_in('md.data_id', "$subQuery", false);
        return $this->db->get()->result_array();
    }

    public function listMetaByDataId($arr_id)
    {
        if (empty($arr_id)) {
            return [];
        }
        $this->db->select('*');
        $this->db->from("$this->meta_data md");
        $this->db->where_in('md.data_id', $arr_id);
        $result = $this->db->get()->result_array();
        if (empty($result)) {
            return [];
        }
        return $result;
    }

    public function listMetaRoom($user_id)
    {
        if (empty($user_id)) {
            return [];
        }
        $this->db->select("r.id as id");
        $this->db->from("$this->rooms r");
        $this->db->where('r.user_id', $user_id);
        $result = $this->db->get()->result_array();

        if (empty($result)) {
            return [];
        }
        $id_rooms = array_map(function ($item) {
            return $item['id'];
        }, $result);

        $this->db->select('*');
        $this->db->from("$this->meta_data md");
        $this->db->where_in('md.data_id', $id_rooms);
        $result = $this->db->get()->result_array();
        if (empty($result)) {
            return [];
        }
        return $result;
    }

    public function listMetaRoot($user_id, $meta_keys)
    {
        $this->db->select("droot.id");
        $this->db->from("$this->device_root droot");
        $this->db->join("$this->devices d", 'droot.id = d.root_id');
        $this->db->join("$this->user_devices ud", 'd.id = ud.device_id');
        $this->db->where('ud.user_id', $user_id);
        $this->db->where('ud.active', 1);
        $this->db->group_by('droot.id');
        $subQuery = $this->db->get_compiled_select();

        $this->db->select('*');
        $this->db->from("$this->meta_data md");
        $this->db->group_start();
        foreach ($meta_keys as $key => $value) {
            $this->db->or_like("meta_key", $value);
        }
        $this->db->group_end();
        $this->db->where_in('md.data_id', "$subQuery", false);
        return $this->db->get()->result_array();
    }

    public function addAlarm($data)
    {
        if (empty($data)) {
            return false;
        }
        return $this->insert_data($this->device_alarm, $data);
    }

    public function editAlarm($alarm_id, $data)
    {
        if (empty($alarm_id) || empty($data)) {
            return false;
        }
        $this->db->where('id', $alarm_id);
        return $this->db->update($this->device_alarm, $data);
    }

    public function deleteAlarm($alarm_id)
    {
        if (empty($alarm_id)) {
            return false;
        }
        $this->db->where('id', $alarm_id);
        $this->db->delete($this->device_alarm);
    }

    public function getAlarm($alarm_id)
    {
        if (empty($alarm_id)) {
            return false;
        }
        $this->db->select('*');
        $this->db->from("$this->device_alarm");
        $this->db->where('id', $alarm_id);
        $result = $this->db->get()->result_array();
        if (empty($result)) {
            return false;
        }
        return $result[0];
    }

    public function getAlarmByTypeAndDevice($device_id, $type)
    {
        if (empty($device_id) || empty($type)) {
            return false;
        }
        $this->db->select('*');
        $this->db->from("$this->device_alarm");
        $this->db->where('device_id', $device_id);
        $this->db->where('alarm_type', $type);
        $result = $this->db->get()->result_array();
        if (empty($result)) {
            return false;
        }
        return $result[0];
    }

    public function getAlarmLockAndUnlockDoor($device_id)
    {
        if (empty($device_id)) {
            return false;
        }
        $this->db->select('*');
        $this->db->from("$this->device_alarm");
        $this->db->where('device_id', $device_id);
        $this->db->group_start();
        $this->db->where('alarm_type', "lock_door");
        $this->db->or_where('alarm_type', "unlock_door");
        $this->db->group_end();
        $result = $this->db->get()->result_array();
        if (empty($result)) {
            return false;
        }
        return $result;
    }

    public function getAlarmByDeviceId($device_id, $alarm_type)
    {
        if (empty($device_id) || empty($alarm_type)) {
            return false;
        }
        $this->db->select('*');
        $this->db->from("$this->device_alarm");
        $this->db->where('device_id', $device_id);
        $this->db->where('alarm_type', $alarm_type);
        $result = $this->db->get()->result_array();
        if (empty($result)) {
            return false;
        }
        return $result[0];
    }

    public function listAlarmByDeviceId($device_id)
    {
        if (empty($device_id)) {
            return false;
        }
        $this->db->select('*');
        $this->db->from($this->device_alarm);
        $this->db->where('device_id', $device_id);
        $this->db->order_by('timecreate', 'desc');
        $result = $this->db->get()->result_array();
        if (empty($result)) {
            return [];
        }
        return $result;
    }

    public function listAlarmCycle($device_id)
    {
        if (empty($device_id)) {
            return false;
        }
        $this->db->select('*');
        $this->db->from($this->alarm_cycle);
        $this->db->where('device_id', $device_id);
        $this->db->order_by('timecreate', 'desc');
        $result = $this->db->get()->result_array();
        if (empty($result)) {
            return false;
        }
        return $result;
    }

    /**
     * [listDeviceOfUser Lấy danh sách thiết bị theo user]
     *
     * @param  [type] $user_id [description]
     *
     * @return [type]          [description]
     */
    public function listDeviceOfUser($user_id)
    {
        if (empty($user_id)) {
            return null;
        }

        $this->db->select('d.id, ud.suggest, ud.index_suggest, d.root_id, d.index_in_root, d.name, d.type,
         d.type_user, d.value, droom.index_in_room, droot.topicsub, droot.topicpub, droot.root_extra, ud.device_role,
          ud.active, r.id as room_id, droot.num_data as num_device, droot.fw_version as version, droot.fw_extra,
           droot.type as root_type, droot.gg_access, droot.timeactive, d.data_extra, droot.warranty, ud.enable_notify');
        $this->db->from("$this->user_devices ud");
        $this->db->join("$this->devices d", 'ud.device_id = d.id');
        $this->db->join("$this->device_root droot", 'd.root_id = droot.id');
        $this->db->join("$this->device_room droom", 'd.id = droom.device_id');
        $this->db->join("$this->rooms r", 'droom.room_id = r.id');
        $this->db->where('r.user_id', $user_id);
        $this->db->where('ud.user_id', $user_id);
        $this->db->where('ud.active', 1);
        $this->db->where('droot.hidden', 0);
        $this->db->order_by('droom.index_in_room', 'asc');
        return $this->db->get()->result_array();
    }

    public function getInfoDeviceByRootId($root_id)
    {
        if (empty($root_id)) {
            return false;
        }
        $this->db->select('d.*, droot.user_id');
        $this->db->from("$this->devices d");
        $this->db->join("$this->device_root droot", "d.root_id = droot.id");
        $this->db->where('d.root_id', $root_id);
        $result = $this->db->get()->result_array();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function listDeviceForGGHome($user_id)
    {
        if (empty($user_id)) {
            return null;
        }

        $this->db->select('d.id, droot.type, d.name, d.value, droot.state');
        $this->db->from("$this->users u");
        $this->db->join("$this->user_devices ud", 'u.id = ud.user_id');
        $this->db->join("$this->devices d", 'ud.device_id = d.id');
        $this->db->join("$this->device_root droot", 'd.root_id = droot.id');
        $this->db->where('u.id', $user_id);
        $this->db->group_start();
        foreach ($this->device_gg_home as $value) {
            $this->db->or_where('d.type', $value);
        }
        $this->db->group_end();
        $this->db->where('ud.active', 1);
        $this->db->where('droot.gg_access', 1);
        return $this->db->get()->result_array();
    }

    public function listDeviceofHome($user_id, $home_id)
    {
        if (empty($home_id)) {
            return null;
        }

        $this->db->select('d.id, d.root_id, d.index_in_root, d.name, d.type, d.type_user, d.value, 
        droom.index_in_room, droot.topicsub, droot.topicpub, ud.device_role, ud.index_suggest, ud.active, 
        r.id as room_id, droot.num_data as num_device, droot.fw_version as version, droot.type as root_type,
         droot.gg_access, droot.timeactive, ud.enable_notify');
        $this->db->from("$this->user_devices ud");
        $this->db->join("$this->devices d", 'ud.device_id = d.id');
        $this->db->join("$this->device_root droot", 'd.root_id = droot.id');
        $this->db->join("$this->device_room droom", 'd.id = droom.device_id');
        $this->db->join("$this->rooms r", 'droom.room_id = r.id');
        $this->db->where('r.home_id', $home_id);
        $this->db->where('ud.user_id', $user_id);
        $this->db->where('ud.active', 1);
        $this->db->where('droot.hidden', 0);
        $this->db->order_by('droom.index_in_room', 'asc');
        return $this->db->get()->result_array();
    }

    public function listDeviceOfRoom($user_id, $room_id)
    {
        if (empty($room_id)) {
            return null;
        }

        $this->db->select('d.id, d.root_id, d.index_in_root, d.name, d.type, d.type_user, d.value, 
        droom.index_in_room, droot.topicsub, droot.topicpub, ud.device_role, ud.index_suggest, ud.active, 
        r.id as room_id, droot.num_data as num_device, droot.fw_version as version, droot.type as root_type,
         droot.gg_access, droot.timeactive, ud.enable_notify');
        $this->db->from("$this->user_devices ud");
        $this->db->join("$this->devices d", 'ud.device_id = d.id');
        $this->db->join("$this->device_root droot", 'd.root_id = droot.id');
        $this->db->join("$this->device_room droom", 'd.id = droom.device_id');
        $this->db->join("$this->rooms r", 'droom.room_id = r.id');
        $this->db->where('r.id', $room_id);
        $this->db->where('ud.user_id', $user_id);
        $this->db->where('ud.active', 1);
        $this->db->where('droot.hidden', 0);
        $this->db->order_by('droom.index_in_room', 'asc');
        return $this->db->get()->result_array();
    }


    public function listDeviceSuggest($user_id, $home_id)
    {
        if (empty($home_id)) {
            return null;
        }

        $this->db->select('d.id, d.root_id, d.index_in_root, d.name, d.type, d.type_user, d.value,
         droom.index_in_room, droot.topicsub, droot.topicpub, droot.root_extra, ud.index_suggest, ud.device_role, 
         ud.active, r.id as room_id, droot.num_data as num_device, droot.fw_version as version, droot.type as root_type,
          droot.gg_access, droot.timeactive, ud.enable_notify');
        $this->db->from("$this->users u");
        $this->db->join("$this->user_devices ud", 'u.id = ud.user_id');
        $this->db->join("$this->devices d", 'ud.device_id = d.id');
        $this->db->join("$this->device_root droot", 'd.root_id = droot.id');
        $this->db->join("$this->device_room droom", 'd.id = droom.device_id');
        $this->db->join("$this->rooms r", 'droom.room_id = r.id');
        $this->db->where('r.user_id = u.id');
        $this->db->where('u.id', $user_id);
        $this->db->where('r.home_id', $home_id);
        $this->db->where('ud.suggest', 1);
        $this->db->where('ud.active', 1);
        $this->db->where('droot.hidden', 0);
        $this->db->order_by('ud.index_suggest', 'asc');
        return $this->db->get()->result_array();
    }

    public function getDevicebyName($user_id, $device_name)
    {
        if (empty($user_id) || empty($device_name)) {
            return null;
        }

        $this->db->select('d.id, d.root_id, d.index_in_root, d.name, d.type, d.type_user, d.value, droot.topicsub, droot.topicpub, ud.device_role, ud.active, droot.type as root_type');
        $this->db->from("$this->users u");
        $this->db->join("$this->user_devices ud", 'u.id = ud.user_id');
        $this->db->join("$this->devices d", 'ud.device_id = d.id');
        $this->db->join("$this->device_root droot", 'd.root_id = droot.id');
        $this->db->where('u.id', $user_id);
        $this->db->like('d.name', $device_name);
        $this->db->where('ud.active', 1);
        $result = $this->db->get()->result_array();
        if ($result) {
            return $result[0];
        } else {
            return false;
        }
    }

    public function getDevicebyId($device_id)
    {
        if (empty($device_id)) {
            return null;
        }

        $this->db->select('d.id, d.root_id, d.index_in_root, d.name, d.type, d.type_user, d.value, 
        droot.topicsub, droot.topicpub, droot.type as root_type, d.data_extra, droot.state');
        $this->db->from("$this->devices d");
        $this->db->join("$this->device_root droot", 'd.root_id = droot.id');
        $this->db->where('d.id', $device_id);
        $result = $this->db->get()->result_array();
        if ($result) {
            return $result[0];
        } else {
            return false;
        }
    }

    public function listRoomOfUser($user_id, $home_id = null)
    {
        if (empty($user_id)) {
            return null;
        }

        $this->db->select('r.*');
        $this->db->from("$this->users u");
        $this->db->join("$this->rooms r", 'u.id = r.user_id');
        if (!empty($home_id)) {
            $this->db->join("$this->home h", 'r.home_id = h.id');
        }
        $this->db->where('u.id', $user_id);
        if (!empty($home_id)) {
            $this->db->where('h.id', $home_id);
        }
        $this->db->order_by('index_room', 'asc');
        return $this->db->get()->result_array();
    }

    public function getDeviceRoom($room_id)
    {
        if (empty($room_id)) {
            return false;
        }
        $this->db->select("*");
        $this->db->from($this->device_room);
        $this->db->where("room_id", $room_id);
        return $this->db->get()->result_array();
    }

    /**
     * [getDevice Lấy danh sách thiết bị theo device root]
     *
     * @param  [type] $user_id [description]
     * @param  [type] $root_id [description]
     *
     * @return [type]          [description]
     */
    public function getDeviceByUser($user_id, $root_id)
    {
        if (empty($root_id) || empty($user_id)) {
            return false;
        }
        $this->db->select('d.id, d.root_id, d.index_in_root, d.name, d.type, d.type_user, d.value, droom.index_in_room, droot.topicsub, droot.topicpub, droot.root_extra, ud.device_role, ud.active, r.name as room_name, droot.fw_version as version, droot.type as root_type, d.data_extra');
        $this->db->from("$this->devices d");
        $this->db->join("$this->device_room droom", 'd.id = droom.device_id');
        $this->db->join("$this->rooms r", 'droom.room_id = r.id');
        $this->db->join("$this->device_root droot", 'd.root_id = droot.id');
        $this->db->join("$this->user_devices ud", 'd.id = ud.device_id');
        $this->db->where('d.root_id', $root_id);
        $this->db->where('ud.user_id', $user_id);
        $this->db->where('droot.hidden', 0);
        $this->db->group_by('d.id');
        $result = $this->db->get()->result_array();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getDeviceByRoot($root_id)
    {
        if (empty($root_id)) {
            return false;
        }
        $this->db->select('d.id, d.root_id, d.index_in_root, d.name, d.type, d.type_user, d.value, 
        droom.index_in_room, droot.topicsub, droot.topicpub, ud.device_role, ud.active, droot.fw_version as version, 
        droot.type as root_type, d.data_extra');
        $this->db->from("$this->devices d");
        $this->db->join("$this->device_room droom", 'd.id = droom.device_id');
        $this->db->join("$this->rooms r", 'droom.room_id = r.id');
        $this->db->join("$this->device_root droot", 'd.root_id = droot.id');
        $this->db->join("$this->user_devices ud", 'd.id = ud.device_id');
        $this->db->group_by('d.id');
        $this->db->where('d.root_id', $root_id);
        $result = $this->db->get()->result_array();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getRootByTopicPub($topic)
    {
        if (empty($topic)) {
            return false;
        }
        $this->db->select('*');
        $this->db->from("$this->device_root");
        $this->db->where('topicpub', $topic);
        $result = $this->db->get()->result_array();
        if (isset($result[0])) {
            return $result[0];
        } else {
            return false;
        }
    }

    public function checkDeviceByRoot($root_id)
    {
        if (empty($root_id)) {
            return false;
        }
        $this->db->select('d.id, d.root_id, d.index_in_root, d.name, d.type, d.type_user, d.value, 
        droot.topicsub, droot.topicpub, droot.fw_version as version, droot.type as root_type, d.data_extra');
        $this->db->from("$this->devices d");
        $this->db->join("$this->device_root droot", 'd.root_id = droot.id');
        $this->db->group_by('d.id');
        $this->db->where('d.root_id', $root_id);
        $result = $this->db->get()->result_array();
        if ($result) {
            return $result[0];
        } else {
            return false;
        }
    }

    public function getDeviceAndUser($user_id, $root_id)
    {
        $this->db->select('d.name as device_name, d.root_id, d.id');
        $this->db->from("$this->device_root droot ");
        $this->db->join("$this->devices d", 'droot.id = d.root_id');
        $this->db->join("$this->device_room droom", 'd.id = droom.device_id');
        $this->db->join("$this->rooms r", 'droom.room_id = r.id');
        $this->db->join("$this->users u", 'r.user_id = u.id');
        $this->db->where('droot.id', $root_id);
        $this->db->where('u.id', $user_id);
        $this->db->group_by('droot.id');
        $result = $this->db->get()->result_array();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getIrChildByRoot($root_id, $user_id = null)
    {
        $this->db->select('d.*');
        $this->db->from("$this->devices d");
        $this->db->join("$this->meta_data md", 'd.id = md.data_id');
        $this->db->join("$this->device_root droot", 'd.root_id = droot.id');
        $this->db->join("$this->user_devices ud", 'd.id = ud.device_id');
        $this->db->where('md.meta_key', "irchild_root_id");
        if ($user_id) {
            $this->db->where("ud.user_id", $user_id);
        }
        $this->db->where('md.value', $root_id);
        $this->db->group_by('d.id');
        $result = $this->db->get()->result_array();
        return $result;
    }

    /**
     * [addMetaData Thêm meta c]
     *
     * @param [type] $data [description]
     */
    public function addMetaData($data)
    {
        if (empty($data)) {
            return false;
        }
        return $this->insert_data($this->meta_data, $data);
    }

    public function updateMetaData($meta_id, $data)
    {
        if (empty($meta_id)) {
            return false;
        }
        $this->db->where('id', $meta_id);
        return $this->db->update($this->meta_data, $data);
    }

    public function updateUserDevice($user_id, $device_id, $data)
    {
        if (empty($user_id) || empty($device_id)) {
            return false;
        }
        $this->db->where('user_id', $user_id);
        $this->db->where('device_id', $device_id);
        return $this->db->update($this->user_devices, $data);
    }

    /**
     * [deleteMetaDevice Xoá meta theo device]
     *
     * @param  [type] $device_id [description]
     *
     * @return [type]            [description]
     */
    public function deleteMetaDevice($device_id)
    {
        if (empty($device_id)) {
            return false;
        }
        $this->db->where('data_id', $device_id);
        $this->db->delete($this->meta_data);
    }

    public function deleteMetaByKeyId($meta_key, $device_id)
    {
        if (empty($device_id) || empty($meta_key)) {
            return false;
        }
        $this->db->where('data_id', $device_id);
        $this->db->like('meta_key', $meta_key);
        $this->db->delete($this->meta_data);
    }

    public function deleteMetaCamera($meta_key, $device_id)
    {
        if (empty($device_id) || empty($meta_key)) {
            return false;
        }
        $this->db->where('value', $device_id);
        $this->db->like('meta_key', $meta_key);
        $this->db->delete($this->meta_data);
    }

    public function deleteMetaById($meta_id)
    {
        if (empty($meta_id)) {
            return false;
        }
        $this->db->where('id', $meta_id);
        return $this->db->delete($this->meta_data);
    }

    /**
     * [getMetaDevice Lấy dữ liệu bổ sung của device]
     *
     * @param  [type] $device_id [description]
     * @param  [type] $meta_key  [description]
     *
     * @return [type]            [description]
     */
    public function getMetaData($data_id, $meta_key)
    {
        if (empty($meta_key)) {
            return false;
        }
        $this->db->select('md.*');
        $this->db->from("$this->meta_data md");
        $this->db->from("$this->devices d");
        $this->db->where('d.id = md.data_id');
        $this->db->where('md.data_id', $data_id);
        $this->db->group_start();
        foreach ($meta_key as $value) {
            $this->db->or_like('md.meta_key', $value);
        }
        $this->db->group_end();
        $result = $this->db->get()->result_array();
        if ($result) {
            return $result;
        } else {
            return false;
        }
    }

    public function getMetaById($meta_id)
    {
        if (empty($meta_id)) {
            return false;
        }
        $this->db->select('*');
        $this->db->from("$this->meta_data");
        $this->db->where('id', $meta_id);
        $result = $this->db->get()->result_array();
        if ($result) {
            return $result[0];
        } else {
            return false;
        }
    }

    public function getMetaByMetaKey($meta_key, $data_id)
    {
        if (empty($meta_key)) {
            return false;
        }
        $this->db->select('*');
        $this->db->from("$this->meta_data");
        $this->db->where('meta_key', $meta_key);
        $this->db->where('data_id', $data_id);
        $result = $this->db->get()->result_array();
        if ($result) {
            return $result[0];
        } else {
            return false;
        }
    }

    /**
     * [addDevice thêm thiết bị root]
     *
     * @param [type] $data [description]
     */
    public function addDeviceRoot($data)
    {
        if (empty($data)) {
            return false;
        }
        return $this->db->insert($this->device_root, $data);
    }

    /**
     * [addDeviceRoom Thêm thiết bị của phòng]
     *
     * @param [type] $data [description]
     */
    public function addDeviceRoom($data)
    {
        if (empty($data)) {
            return false;
        }
        return $this->db->insert($this->device_room, $data);
    }

    public function deleteDeviceRoom($device_id, $room_id)
    {
        if (empty($device_id) || empty($room_id)) {
            return false;
        }
        $this->db->where('device_id', $device_id);
        $this->db->where('room_id', $room_id);
        return $this->db->delete($this->device_room);
    }

    /**
     * [addDeviceUser Thêm thiết bị của user]
     *
     * @param [type] $data [description]
     */
    public function addDeviceUser($data)
    {
        if (empty($data)) {
            return false;
        }
        return $this->db->insert($this->user_devices, $data);
    }

    /**
     * [addDeviceUser thêm nhiều thiết bị của user]
     *
     * @param [type] $data [description]
     */
    public function addArrayDeviceUser($data)
    {
        if (empty($data)) {
            return false;
        }
        return $this->db->insert_batch($this->user_devices, $data);
    }

    /**
     * [addDataDevice Thêm 1 thiết bị]
     *
     * @param [type] $data [description]
     */
    public function addDevice($data)
    {
        if (empty($data)) {
            return false;
        }
        return $this->insert_data($this->devices, $data);
    }

    /**
     * [updateData cập nhật 1 device]
     *
     * @param  [type] $device_id   [description]
     * @param  [type] $data      [description]
     */
    public function updateDevice($device_id, $data)
    {
        if (empty($device_id) || empty($data)) {
            return false;
        }
        $this->db->where("id", $device_id);
        return $this->db->update($this->devices, $data);
    }

    /**
     * [lấy device user]
     *
     * @param  [type] $user_id   [description]
     * @param  [type] $device_id [description]
     *
     * @return [type]            [description]
     */
    public function getDeviceUser($user_id, $device_id)
    {
        if (empty($user_id) || empty($device_id)) {
            return false;
        }
        $this->db->select('ud.*, d.id, d.root_id, d.index_in_root, d.name, d.type, d.type_user, d.value,
         droot.topicsub, droot.topicpub, droot.type as root_type, d.data_extra');
        $this->db->from("$this->user_devices ud");
        $this->db->join("$this->devices d", 'ud.device_id = d.id');
        $this->db->join("$this->device_root droot", 'd.root_id = droot.id');
        $this->db->where('ud.user_id', $user_id);
        $this->db->where('ud.device_id', $device_id);
        $result = $this->db->get()->result_array();
        //        echo $this->db->last_query();
        if (!empty($result)) {
            return $result[0];
        }
        return false;
    }

    /**
     * [addArrayDevice thêm nhiều device]
     *
     * @param [type] $data [description]
     */
    public function addArrayDevice($data)
    {
        if (empty($data)) {
            return false;
        }
        $this->db->insert_batch($this->devices, $data);
        return $this->db->insert_id();
    }

    /**
     * [addArrayDeviceRoom Thêm danh sách device của room]
     *
     * @param [type] $data [description]
     */
    public function addArrayDeviceRoom($data)
    {
        if (empty($data)) {
            return false;
        }
        $this->db->insert_batch($this->device_room, $data);
        return $this->db->insert_id();
    }

    public function getUserDeviceRoot($user_id, $root_id)
    {
        if (empty($root_id)) {
            return false;
        }
        $this->db->select('dr.*');
        $this->db->from("$this->device_root dr");
        $this->db->join("$this->users u", 'dr.user_id = u.id');
        $this->db->where('dr.id', $root_id);
        $this->db->where('u.id', $user_id);
        $result = $this->db->get()->result_array();
        if ($result) {
            return $result[0];
        } else {
            return false;
        }
    }

    public function getUserAndDeviceRoot($root_id)
    {
        if (empty($root_id)) {
            return false;
        }
        $this->db->select('dr.*, u.name as user_name, u.phone as user_phone');
        $this->db->from("$this->device_root dr");
        $this->db->join("$this->users u", 'dr.user_id = u.id');
        $this->db->where('dr.id', $root_id);
        $result = $this->db->get()->result_array();
        if ($result) {
            return $result[0];
        } else {
            return false;
        }
    }

    /**
     * [getDeviceRoot lấy thông tin thiết bị root]
     *
     * @param  [type] $device_id [description]
     *
     * @return [type]            [description]
     */
    public function getDeviceRoot($device_id)
    {
        if (empty($device_id)) {
            return false;
        }
        $this->db->select('dr.*');
        $this->db->from("$this->device_root dr");
        $this->db->where('dr.id', $device_id);
        $result = $this->db->get()->result_array();
        if ($result) {
            return $result[0];
        } else {
            return false;
        }
    }

    public function activeShare($user_id, $device_id)
    {
        if (empty($user_id) || empty($device_id)) {
            return false;
        }
        $this->db->where('user_id', $user_id);
        $this->db->where('device_id', $device_id);
        return $this->db->update($this->user_devices, ["active" => 1]);
    }

    public function activeShareRoot($id)
    {
        if (empty($id)) {
            return false;
        }
        $this->db->where('id', $id);
        return $this->db->update($this->share_root, ["active" => 1]);
    }

    public function denyShareRoot($id)
    {
        if (empty($id)) {
            return false;
        }
        $this->db->where('id', $id);
        return $this->db->delete($this->share_root);
    }

    /**
     * [deleteDeviceRoot xóa 1 device root]
     *
     * @param  [type] $device_id [description]
     *
     * @return [type]            [description]
     */
    public function deleteDeviceRoot($device_id)
    {
        if (empty($device_id)) {
            return false;
        }
        $this->db->where('id', $device_id);
        return $this->db->delete($this->device_root);
    }

    /**
     * [updateDevice cập nhật thông tin device root]
     *
     * @param  [type] $device_id [description]
     * @param  [type] $data      [description]
     *
     * @return [type]            [description]
     */
    public function updateDeviceRoot($device_id, $data)
    {
        if (empty($data) || empty($device_id)) {
            return false;
        }
        $this->db->where('id', $device_id);
        return $this->db->update($this->device_root, $data);
    }

    /**
     * [Lấy danh sách thiết bị đã nhận được từ chia sẻ]
     *
     * @param  [type] $user_id [description]
     *
     * @return [type]          [description]
     */
    public function listDeviceReceived($user_id)
    {
        if (empty($user_id)) {
            return false;
        }
        $this->db->select('d.*, ud.device_role, ud.active, u.name as user_name, u.phone as user_phone, u.id as user_id, droot.topicpub, droot.type as root_type');
        $this->db->from("$this->devices d");
        $this->db->join("$this->device_root droot", 'd.root_id = droot.id');
        $this->db->join("$this->user_devices ud", 'd.id = ud.device_id');
        $this->db->join("$this->users u", 'droot.user_id = u.id');
        $this->db->where("droot.user_id !=", $user_id);
        $this->db->where("ud.user_id", $user_id);
        $this->db->order_by("ud.active asc, ud.timecreate desc");
        return $this->db->get()->result_array();
    }

    public function getListRoomOfDeviceRoot($root_id)
    {
        if (empty($root_id)) {
            return false;
        }
        $this->db->select('r.id');
        $this->db->from("$this->rooms r");
        $this->db->join("$this->device_room droom", 'r.id = droom.room_id');
        $this->db->join("$this->devices d", 'droom.device_id = d.id');
        $this->db->join("$this->device_root droot", 'd.root_id = droot.id');
        $this->db->where("droot.id", $root_id);
        $this->db->group_by('r.id');
        return $this->db->get()->result_array();
    }

    /**
     * [Lấy danh sách thiết bị đã chia sẻ]
     *
     * @param  [type] $user_id [description]
     *
     * @return [type]          [description]
     */
    public function listDeviceShare($user_id)
    {
        if (empty($user_id)) {
            return false;
        }
        $this->db->select('d.*, ud.device_role, ud.active, u.name as user_name, u.phone as user_phone, u.id as user_id, droot.type as root_type');
        $this->db->from("$this->devices d");
        $this->db->join("$this->device_root droot", 'd.root_id = droot.id');
        $this->db->join("$this->user_devices ud", 'd.id = ud.device_id');
        $this->db->join("$this->users u", 'ud.user_id = u.id');
        $this->db->where("droot.user_id", $user_id);
        $this->db->where("ud.user_id !=", $user_id);
        return $this->db->get()->result_array();
    }

    public function insertHistoryDevice($data)
    {
        if (empty($data)) {
            return false;
        }
        return $this->insert_data($this->device_history, $data);
    }

    public function getNumDeviceActive($time_start, $time_end)
    {
        $datetime = new DateTime($time_start);
        $day_start = $datetime->format('Y-m-d 00:00');
        $datetime2 = new DateTime($time_end);
        $day_end = $datetime2->format('Y-m-d 23:59');

        $this->db->select('COUNT(id) as num_device');
        $this->db->from($this->device_root);
        $this->db->where("timeactive BETWEEN '$day_start' AND '$day_end'");
        $result = $this->db->get()->result_array();
        return $result[0]['num_device'];
    }

    public function getHistoryDevice($device_id)
    {
        $datetime = new DateTime();
        $day_end = $datetime->format('Y-m-d 23:59');
        $interval = 'P1M';
        $datetime->sub(new DateInterval($interval));
        $day_start = $datetime->format('Y-m-d 00:00');

        if (empty($device_id)) {
            return false;
        }
        $this->db->select('dh.*, u.phone, u.name');
        $this->db->from("$this->device_history dh");
        $this->db->join("$this->users u", 'dh.user_id = u.id');
        $this->db->where('device_id', $device_id);
        $this->db->where("dh.action_time BETWEEN '$day_start' AND '$day_end'");
        $this->db->order_by('dh.action_time', 'desc');
        $result = $this->db->get()->result_array();
        if (empty($result)) {
            return false;
        } else {
            return $result;
        }
    }

    public function getHistoryDeviceExtra($device_id)
    {
        if (empty($device_id)) {
            return false;
        }
        $this->db2->select('hd.*, u.phone, u.name');
        $this->db2->from("$this->history_device hd");
        $this->db2->join("iot_hunonic.devices d", 'hd.device_id = d.id');
        $this->db2->where('device_id', $device_id);
        $result = $this->db2->get()->result_array();
        if (empty($result)) {
            return false;
        } else {
            return $result;
        }
    }

    public function getHistoryDeviceByUser($user_id)
    {
        $datetime = new DateTime();
        $day_end = $datetime->format('Y-m-d 23:59');
        $interval = 'P7D';
        $datetime->sub(new DateInterval($interval));
        $day_start = $datetime->format('Y-m-d 00:00');

        if (empty($user_id)) {
            return false;
        }
        $this->db->select('dh.*, u.phone, u.name');
        $this->db->from("$this->device_history dh");
        $this->db->join("$this->user_devices ud",
          'dh.device_id = ud.device_id');
        $this->db->join("$this->users u", 'dh.user_id = u.id');
        $this->db->where("ud.user_id", $user_id);
        $this->db->where("dh.action_time BETWEEN '$day_start' AND '$day_end'");
        $this->db->order_by('dh.action_time', 'desc');
        $result = $this->db->get()->result_array();
        if (empty($result)) {
            return false;
        } else {
            return $result;
        }
    }

    /**
     * [listRoom danh sách phòng theo user_id]
     *
     * @param  [type] $user_id [description]
     *
     * @return [type]          [description]
     */
    public function listRoomByUserId($user_id)
    {
        if (empty($user_id)) {
            return false;
        }
        $this->db->select('r.id, r.name, r.index_room as index, r.home_id, r.default_room, r.img, r.is_hidden');
        $this->db->from("$this->users u");
        $this->db->join("$this->rooms r", 'u.id = r.user_id');
        $this->db->where('u.id', $user_id);
        $this->db->order_by('r.index_room', 'asc');
        return $this->db->get()->result_array();
    }

    public function listRoomOfHome($home_id)
    {
        if (empty($home_id)) {
            return false;
        }
        $this->db->select('id, name, index_room as index, home_id, is_hidden');
        $this->db->from($this->rooms);
        $this->db->where('home_id', $home_id);
        return $this->db->get()->result_array();
    }

    public function getRoomHidden($home_id)
    {
        if (empty($home_id)) {
            return false;
        }
        $this->db->select('r.*');
        $this->db->from("$this->rooms r");
        $this->db->join("$this->home h", 'r.home_id = h.id');
        $this->db->where('h.id', $home_id);
        $this->db->where('r.is_hidden', 1);
        return $this->db->get()->result_array();
    }

    /**
     * [lấy id phòng mặc định]
     *
     * @param [type] $data [description]
     */
    public function getIdRoomDefault($user_id)
    {
        if (empty($user_id)) {
            return false;
        }
        $this->db->select('r.id');
        $this->db->from("$this->users u");
        $this->db->join("$this->rooms r", 'u.id = r.user_id');
        $this->db->where('u.id', $user_id);
        $this->db->where('u.room_id = r.id');
        $result = $this->db->get()->result_array();
        if (empty($result)) {
            return false;
        }
        return $result[0]['id'];
    }

    public function getRoomDefaultOfHome($home_id)
    {
        if (empty($home_id)) {
            return false;
        }
        $this->db->select('r.*');
        $this->db->from("$this->rooms r");
        $this->db->join("$this->home h", 'r.home_id = h.id');
        $this->db->where("home_id", $home_id);
        $this->db->where('default_room', 1);
        $result = $this->db->get()->result_array();
        if ($result) {
            return $result[0]['id'];
        }
        return false;
    }

    /**
     * [lấy id phòng mặc định]
     *
     * @param [type] $data [description]
     */
    public function getIdHomeDefault($user_id)
    {
        if (empty($user_id)) {
            return false;
        }
        $this->db->select('h.id');
        $this->db->from("$this->users u");
        $this->db->join("$this->home h", 'u.id = h.user_id');
        $this->db->where('u.id', $user_id);
        $this->db->where('u.home_id = h.id');
        $result = $this->db->get()->result_array();
        if (empty($result)) {
            return false;
        }
        return $result[0]['id'];
    }


    public function getLastIndexDeviceRoom($room_id)
    {
        if (empty($room_id)) {
            return false;
        }
        $this->db->select('MAX(index_in_room) as last_index');
        $this->db->from($this->device_room);
        $this->db->where('room_id', $room_id);
        $result = $this->db->get()->result_array();
        if ($result) {
            return $result[0]['last_index'];
        }
        return false;
    }

    public function getLastIndexRoom($user_id)
    {
        if (empty($user_id)) {
            return false;
        }
        $this->db->select('MAX(index_room) as last_index');
        $this->db->from($this->rooms);
        $this->db->where('user_id', $user_id);
        $result = $this->db->get()->result_array();
        if ($result) {
            return $result[0]['last_index'];
        }
        return false;
    }

    public function getLastIndexHome($user_id, $home_id)
    {
        if (empty($user_id)) {
            return false;
        }
        $this->db->select('MAX(index_room) as last_index');
        $this->db->from($this->rooms);
        $this->db->where('user_id', $user_id);
        $this->db->where('home_id', $home_id);
        $result = $this->db->get()->result_array();
        if ($result) {
            return $result[0]['last_index'];
        }
        return false;
    }


    /**
     * [addRoom thêm phòng]
     *
     * @param [type] $data [description]
     */
    public function addRoom($data)
    {
        if (empty($data)) {
            return false;
        }
        return $this->insert_data($this->rooms, $data);
    }

    public function deleteUserDevice($user_id, $device_id)
    {
        if (empty($device_id) || empty($user_id)) {
            return false;
        }
        $this->db->where('user_id', $user_id);
        $this->db->where('device_id', $device_id);
        return $this->db->delete($this->user_device);
    }

    public function deleteDeviceShare($user_id, $device_id)
    {
        if (empty($device_id) || empty($user_id)) {
            return false;
        }
        $this->db->where('user_id', $user_id);
        $this->db->where('device_id', $device_id);
        return $this->db->delete($this->user_devices);
    }

    public function deleteAllUserDevice($device_id)
    {
        if (empty($device_id)) {
            return false;
        }
        $this->db->where('device_id', $device_id);
        return $this->db->delete($this->user_device);
    }

    /**
     * [editRoom cập nhật thông tin phòng]
     *
     * @param  [type] $userid [description]
     * @param  [type] $roomid [description]
     * @param  [type] $data   [description]
     *
     * @return [type]         [description]
     */
    public function editRoom($user_id, $room_id, $data)
    {
        if (empty($user_id) || empty($data) || empty($room_id)) {
            return false;
        }
        $this->db->where('user_id', $user_id);
        $this->db->where('id', $room_id);
        return $this->db->update($this->rooms, $data);
    }

    /**
     * [deleteRoom xóa phòng]
     *
     * @param  [type] $userid [description]
     * @param  [type] $roomid [description]
     *
     * @return [type]         [description]
     */
    public function deleteRoom($user_id, $room_id)
    {
        if (empty($user_id) || empty($room_id)) {
            return false;
        }
        $this->db->where('user_id', $user_id);
        $this->db->where('id', $room_id);
        return $this->db->delete($this->rooms);
    }

    public function updateDeviceRoom($device_id, $room_id, $data)
    {
        if (empty($device_id) || empty($room_id) || empty($data)) {
            return false;
        }
        $this->db->where("device_id", $device_id);
        $this->db->where("room_id", $room_id);
        return $this->db->update($this->device_room, $data);
    }

    /**
     * [changeRoomTo chuyển toàn bộ thiết bị của 1 phòng sang phòng khác]
     *
     * @param  [type] $userid   [description]
     * @param  [type] $roomid   [description]
     * @param  [type] $roomidTo [description]
     *
     * @return [type]           [description]
     */
    public function moveAllDeviceofRoom($room_id, $room_id_to)
    {
        if (empty($room_id) || empty($room_id_to)) {
            return false;
        }
        $this->db->where('room_id', $room_id);
        return $this->db->update($this->device_room,
          ['room_id' => $room_id_to]);
    }

    /**
     * [changeRoom chuyển 1 thiết bị sang phòng khác]
     *
     * @param  [type] $userid   [description]
     * @param  [type] $deviceid [description]
     * @param  [type] $roomid   [description]
     *
     * @return [type]           [description]
     */
    public function changeRoom($device_id, $id_room_current, $room_id)
    {
        if (empty($device_id) || empty($room_id) || empty($id_room_current)) {
            return false;
        }
        $this->db->where('device_id', $device_id);
        $this->db->where('room_id', $id_room_current);
        return $this->db->update($this->device_room, ['room_id' => $room_id]);
    }

    /**
     * [ Lấy thông tin phòng]
     *
     * @param  [type] $tokenid [description]
     * @param  [type] $roomid  [description]
     *
     * @return [type]          [description]
     */
    public function getRoom($user_id, $room_id)
    {
        if (empty($user_id) || empty($room_id)) {
            return false;
        }
        $this->db->select('r.id, r.name, r.index_room as index, default_room, r.is_hidden');
        $this->db->from("$this->users u");
        $this->db->join("$this->rooms r", 'u.id = r.user_id');
        $this->db->where('u.id', $user_id);
        $this->db->where('r.id', $room_id);
        $result = $this->db->get()->result_array();
        if (empty($result)) {
            return false;
        } else {
            return $result[0];
        }
    }

    public function getUserRoomOfDevice($user_id, $device_id)
    {
        if (empty($user_id) || empty($device_id)) {
            return false;
        }
        $this->db->select('r.*');
        $this->db->from("$this->users u");
        $this->db->join("$this->rooms r", 'u.id = r.user_id');
        $this->db->join("$this->device_room droom", 'r.id = droom.room_id');
        $this->db->where('r.user_id', $user_id);
        $this->db->where('droom.device_id', $device_id);
        $result = $this->db->get()->result_array();
        if (empty($result)) {
            return false;
        } else {
            return $result[0];
        }
    }

    public function listUserOfDeviceShare($device_id)
    {
        if (empty($device_id)) {
            return false;
        }
        $this->db->select('u.id, u.name, u.phone, u.avatar, ud.device_role, ud.active');
        $this->db->from("$this->user_devices ud");
        $this->db->join("$this->users u", 'ud.user_id = u.id');
        $this->db->where('ud.device_id', $device_id);
        return $this->db->get()->result_array();
    }

    public function getUserDeviceByRootID($root_id)
    {
        if (empty($root_id)) {
            return false;
        }
        $this->db->select('ud.*, u.phone, u.id');
        $this->db->from("$this->user_devices ud");
        $this->db->join("$this->devices d", 'ud.device_id = d.id');
        $this->db->join("$this->users u", "ud.user_id = u.id");
        $this->db->where('d.root_id', $root_id);
        $this->db->where("ud.active", 1);
        $this->db->where("ud.enable_notify", 1);
        $this->db->group_by("u.id");
        return $this->db->get()->result_array();
    }

    public function getUserDeviceByRoot($user_id, $root_id)
    {
        if (empty($user_id) || empty($root_id)) {
            return false;
        }
        $this->db->select('ud.*');
        $this->db->from("$this->user_devices ud");
        $this->db->from("$this->devices d", 'ud.device_id = d.id');
        $this->db->join("$this->device_root droot", 'd.root_id = droot.id');
        $this->db->where('ud.user_id', $user_id);
        $this->db->where('droot.id', $root_id);
        return $this->db->get()->result_array();
    }

    public function clearDataExtra()
    {
        $this->db2->where("device_id IN (SELECT id from webiot_iotnew.devices d where d.type != 'sdoor')");
        $this->db2->or_where("device_id NOT IN (SELECT id from webiot_iotnew.devices WHERE 1)");
        $this->db2->delete($this->history_device);
    }

    public function addActivityHistory($data)
    {
        if (empty($data)) {
            return false;
        }
        return $this->insert_data($this->device_activity_history, $data);
    }

}

/* End of file Device_Model.php */
/* Location: ./application/models/Device_Model.php */
