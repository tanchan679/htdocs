<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Ho_Chi_Minh');

require_once(APPPATH . 'controllers/const.php');
require_once(APPPATH . 'controllers/CommonFunctions.php');

/**
 * @property $Device_Model
 * @property $User_Model
 * @property $GroupPermissionModel
 * @property $DevicePermissionModel
 * @property $UserDevicePermissionModel
 * @property $DeviceTypePermissionModel
 */
class API_Controller extends CI_Controller
{

    protected $role_admin = 1;
    protected $role_normal = 2;
    protected $role_seller = 3;
    protected $role_guest = 4;
    protected $role_login = 5;

    public function __construct()
    {
        parent::__construct();
        header('Content-Type: application/json');
        $this->load->model('v2/User_Model');

        $this->load->model('v2/GroupPermission_Model');
        $this->GroupPermissionModel = $this->GroupPermission_Model;

        $this->load->model('v2/DevicePermission_Model');
        $this->DevicePermissionModel = $this->DevicePermission_Model;

        $this->load->model('v2/UserDevicePermission_Model');
        $this->UserDevicePermissionModel = $this->UserDevicePermission_Model;
        $this->load->model('v2/DeviceTypePermission_Model');
        $this->DeviceTypePermissionModel = $this->DeviceTypePermission_Model;
    }

    public function checkToken($token_id)
    {
        if (empty($token_id)) {
            echo $this->result_json_error(2);
            die();
        }

        $user = $this->User_Model->getUser($token_id);
        if (empty($user)) {
            echo $this->result_json_error(40);
            die();
        }
        if ($user['active'] == 0) {
            echo $this->result_json_error(1);
            die();
        }
        return $user;
    }

    public function checkJSON($string, $flag = false)
    {
        if (empty($string)) {
            echo $this->result_json_error(92);
            die;
        }
        if (is_string($string) && is_array(json_decode($string, true))) {
            return json_decode($string, true);
        } else {
            if (!$flag) {
                echo $this->result_json_error(49);
                die;
            }
        }
        return false;
    }

    public function checkDevice($device_id)
    {
        if (empty($device_id)) {
            echo $this->result_json_error(3);
            die();
        }

        $device = $this->Device_Model->getDevicebyId($device_id);
        if (empty($device)) {
            echo $this->result_json_error(4);
            die();
        }
        return $device;
    }

    public function isAdmin($user_id, $is_break = true)
    {
        $user = $this->User_Model->getUserByID($user_id, null);
        if (empty($user))
            die($this->result_json_error(42));
        $user = $user[0];
        if ($user['role_id'] == $this->role_admin) {
            return true;
        }
        if ($is_break) die($this->result_json_error(17));
        return false;
    }

    public function result_json($messenge, $data = null)
    {
        $array = [
          "status" => true,
          "message" => $messenge,
          "data" => $data,
        ];
        return json_encode($array);
    }

    public function checkEmptyValue($value, $err_code)
    {
        if (empty($value)) {
            die($this->result_json_error($err_code));
        }
        return true;
    }

    public function result_json_error($error_code = 0)
    {
        $data_code = [
          [
            "error_code" => 1,
            "description" => "Tài khoản đã đăng nhập ở máy khác!",
          ],
          [
            "error_code" => 2,
            "description" => "Token đang bỏ trống!",
          ],
          [
            "error_code" => 3,
            "description" => "Mã thiết bị đang bỏ trống!",
          ],
          [
            "error_code" => 4,
            "description" => "Thiết bị không thuộc sở hữu của bạn!",
          ],
          [
            "error_code" => 5,
            "description" => "Mã nhóm hành động đang trống!",
          ],
          [
            "error_code" => 6,
            "description" => "Không tìm thấy nhóm hành động!",
          ],
          [
            "error_code" => 7,
            "description" => "Loại thiết bị không hỗ trợ!",
          ],
          [
            "error_code" => 8,
            "description" => "Phòng không thuộc sở hữu của bạn!",
          ],
          [
            "error_code" => 9,
            "description" => "Không thể thay đổi thông tin phòng mặc định!",
          ],
          [
            "error_code" => 10,
            "description" => "Mã phòng đang bỏ trống!",
          ],
          [
            "error_code" => 11,
            "description" => "Topic của thiết bị đang bỏ trống!",
          ],
          [
            "error_code" => 12,
            "description" => "Thêm thiết bị thất bại!",
          ],
          [
            "error_code" => 13,
            "description" => "Số điện thoại người nhận đang trống!",
          ],
          [
            "error_code" => 14,
            "description" => "Số điện thoại người nhận chưa đăng ký tài khoản!",
          ],
          [
            "error_code" => 15,
            "description" => "Số điện thoại người nhận phải khác số điện thoại người chia sẻ!",
          ],
          [
            "error_code" => 16,
            "description" => "Số điện thoại đã được chia sẻ thiết bị từ trước!",
          ],
          [
            "error_code" => 17,
            "description" => "Bạn không có quyền thao tác trên thiết bị này!",
          ],
          [
            "error_code" => 18,
            "description" => "Xoá chia sẻ thất bại!",
          ],
          [
            "error_code" => 19,
            "description" => "Thêm lịch sử thất bại!",
          ],
          [
            "error_code" => 20,
            "description" => "Dữ liệu đang trống!",
          ],
          [
            "error_code" => 21,
            "description" => "Mã người dùng không đúng!",
          ],
          [
            "error_code" => 22,
            "description" => "Loại dữ liệu không hỗ trợ!",
          ],
          [
            "error_code" => 23,
            "description" => "Thêm dữ liệu cho thiết bị thất bại!",
          ],
          [
            "error_code" => 24,
            "description" => "Không tìm thấy dữ liệu!",
          ],
          [
            "error_code" => 25,
            "description" => "Tạo phòng thất bại!",
          ],
          [
            "error_code" => 26,
            "description" => "Tên phòng đang bỏ trống!",
          ],
          [
            "error_code" => 27,
            "description" => "Tên nhóm hành động đang bỏ trống!",
          ],
          [
            "error_code" => 28,
            "description" => "Dữ liệu hẹn giờ đang trống!",
          ],
          [
            "error_code" => 29,
            "description" => "Loại hẹn giờ không hỗ trợ!",
          ],
          [
            "error_code" => 30,
            "description" => "Thêm hẹn giờ thất bại!",
          ],
          [
            "error_code" => 31,
            "description" => "Số điện thoại hoặc mật khẩu không đúng!",
          ],
          [
            "error_code" => 32,
            "description" => "Số điện thoại hoặc mật khẩu trống!",
          ],
          [
            "error_code" => 33,
            "description" => "Số điện thoại không đúng!",
          ],
          [
            "error_code" => 34,
            "description" => "Số điện thoại đã tồn tại!",
          ],
          [
            "error_code" => 35,
            "description" => "Đăng ký thất bại!",
          ],
          [
            "error_code" => 36,
            "description" => "Mật khẩu đang bỏ trống!",
          ],
          [
            "error_code" => 37,
            "description" => "Mật khẩu cũ không đúng!",
          ],
          [
            "error_code" => 38,
            "description" => "Thay đổi mật khẩu thất bại!",
          ],
          [
            "error_code" => 39,
            "description" => "Ảnh không đúng định dạng!",
          ],
          [
            "error_code" => 40,
            "description" => "Tài khoản đã đăng nhập ở máy khác!",
          ],
          [
            "error_code" => 41,
            "description" => "Bạn chưa nhập số trang hiện tại!",
          ],
          [
            "error_code" => 42,
            "description" => "Không tìm thấy tài khoản!",
          ],
          [
            "error_code" => 43,
            "description" => "Tài khoản đang bỏ trống!",
          ],
          [
            "error_code" => 44,
            "description" => "Số điện thoại đang bỏ trống!",
          ],
          [
            "error_code" => 45,
            "description" => "ID meta đang bỏ trống!",
          ],
          [
            "error_code" => 46,
            "description" => "Meta không tồn tại!",
          ],
          [
            "error_code" => 47,
            "description" => "Meta đã tồn tại!",
          ],
          [
            "error_code" => 48,
            "description" => "Thiết bị đã được kích hoạt!",
          ],
          [
            "error_code" => 49,
            "description" => "Value không phải định dạng JSON!",
          ],
          [
            "error_code" => 50,
            "description" => "ID hẹn giờ không tồn tại!",
          ],
          [
            "error_code" => 51,
            "description" => "ID hẹn giờ đang trống!",
          ],
          [
            "error_code" => 52,
            "description" => "Vị trí phòng đang bỏ trống!",
          ],
          [
            "error_code" => 53,
            "description" => "Mật khẩu không đúng!",
          ],
          [
            "error_code" => 54,
            "description" => "Ngày lặp trong tuần đang bỏ trống",
          ],
          [
            "error_code" => 55,
            "description" => "Thời gian hẹn giờ đang bỏ trống",
          ],
          [
            "error_code" => 56,
            "description" => "Vị trí hẹn giờ đang bỏ trống",
          ],
          [
            "error_code" => 57,
            "description" => "Chưa đăng ký",
          ],
          [
            "error_code" => 58,
            "description" => "Tên ngữ cảnh đang trống",
          ],
          [
            "error_code" => 59,
            "description" => "Thêm ngữ cảnh thất bại. ID không tồn tại",
          ],
          [
            "error_code" => 60,
            "description" => "Loại ngữ cảnh không đúng.",
          ],
          [
            "error_code" => 61,
            "description" => "Loại ngữ cảnh đang bỏ trống",
          ],
          [
            "error_code" => 62,
            "description" => "Điều kiện ngữ cảnh đang bỏ trống",
          ],
          [
            "error_code" => 63,
            "description" => "Hành động ngữ cảnh đang bỏ trống",
          ],
          [
            "error_code" => 64,
            "description" => "Không tìm thấy ID ngữ cảnh",
          ],
          [
            "error_code" => 65,
            "description" => "Active đang bỏ trống",
          ],
          [
            "error_code" => 66,
            "description" => "Điều kiện hoặc hành động không phải mảng dữ liệu",
          ],
          [
            "error_code" => 67,
            "description" => "Điều kiện chưa đúng",
          ],
          [
            "error_code" => 68,
            "description" => "Thêm thiết bị lên firebase thất bại",
          ],
          [
            "error_code" => 69,
            "description" => "Lệnh điều khiển không đúng",
          ],
          [
            "error_code" => 70,
            "description" => "Kết nối MQTT thất bại",
          ],
          [
            "error_code" => 71,
            "description" => "Thời gian không đúng dịnh dạng",
          ],
          [
            "error_code" => 72,
            "description" => "Mật khẩu mới phải khác mật khẩu cũ",
          ],
          [
            "error_code" => 73,
            "description" => "Số điện thoại này chưa đăng ký, hãy đăng ký trước khi đổi mật khẩu",
          ],
          [
            "error_code" => 74,
            "description" => "Loại remote đang bỏ trống",
          ],
          [
            "error_code" => 75,
            "description" => "Remote không tồn tại",
          ],
          [
            "error_code" => 76,
            "description" => "Thêm root thất bại.",
          ],
          [
            "error_code" => 77,
            "description" => "Thêm nút thất bại.",
          ],
          [
            "error_code" => 78,
            "description" => "Tên nhà đang bỏ trống.",
          ],
          [
            "error_code" => 79,
            "description" => "Thêm nhà thất bại.",
          ],
          [
            "error_code" => 80,
            "description" => "ID nhà đang bỏ trống.",
          ],
          [
            "error_code" => 81,
            "description" => "Nhà không thuộc sở hữu của bạn!",
          ],
          [
            "error_code" => 82,
            "description" => "Không thể xoá nhà mặc định!",
          ],
          [
            "error_code" => 83,
            "description" => "Lỗi tài khoản, chưa tạo nhà mặc định!",
          ],
          [
            "error_code" => 84,
            "description" => "Lỗi phòng mặc định, liên hệ quản trị viên!",
          ],
          [
            "error_code" => 85,
            "description" => "Mã nút bấm đang bỏ trống!",
          ],
          [
            "error_code" => 86,
            "description" => "Mã nút không tồn tại!",
          ],
          [
            "error_code" => 87,
            "description" => "Nút bấm không thuộc sở hữu của bạn!",
          ],
          [
            "error_code" => 88,
            "description" => "Thiết bị chưa được đăng ký!",
          ],
          [
            "error_code" => 89,
            "description" => "ID ghi chú đang bỏ trống!",
          ],
          [
            "error_code" => 90,
            "description" => "Ghi chú không tồn tại!",
          ],
          [
            "error_code" => 90,
            "description" => "Dữ liệu không chính xác!",
          ],
          [
            "error_code" => 91,
            "description" => "Ngữ cảnh hay dùng đang trống!",
          ],
          [
            "error_code" => 92,
            "description" => "Chuỗi json đang bỏ trống!",
          ],
          [
            "error_code" => 93,
            "description" => "Nội dung đang bỏ trống!",
          ],
          [
            "error_code" => 94,
            "description" => "ID thông báo đang bỏ trống!",
          ],
          [
            "error_code" => 95,
            "description" => "Bạn không có quyền thao tác trên API!",
          ],
          [
            "error_code" => 96,
            "description" => "Category của remote đang bỏ trống!",
          ],
          [
            "error_code" => 97,
            "description" => "Category không tồn tại!",
          ],
          [
            "error_code" => 98,
            "description" => "Ảnh đang bỏ trống!",
          ],
          [
            "error_code" => 99,
            "description" => "Số điện thoại người chia sẻ đang trống!",
          ],
          [
            "error_code" => 100,
            "description" => "ID tài khoản chia sẻ không tồn tại!",
          ],
          [
            "error_code" => 101,
            "description" => "ID tài khoản chia sẻ đang bỏ trống!",
          ],
          [
            "error_code" => 102,
            "description" => "ID tài khoản nhận phải khác tài khoản chia sẻ!",
          ],
          [
            "error_code" => 103,
            "description" => "ID tài khoản đã được chia sẻ thiết bị từ trước!",
          ],
          [
            "error_code" => 104,
            "description" => "Lỗi upload, tham số không hợp lệ!",
          ],
          [
            "error_code" => 105,
            "description" => "File upload đang bỏ trống!",
          ],
          [
            "error_code" => 106,
            "description" => "File upload dung lượng quá lớn!",
          ],
          [
            "error_code" => 107,
            "description" => "Lỗi không xác định!",
          ],
          [
            "error_code" => 108,
            "description" => "Lỗi trong quá trình upload file!",
          ],
          [
            "error_code" => 109,
            "description" => "Không thể xoá phòng mặc định!",
          ],
          [
            "error_code" => 110,
            "description" => "Tài khoản nhận không cùng máy chủ!",
          ],
          [
            "error_code" => 111,
            "description" => "API đang khoá!",
          ],
          [
            "error_code" => 112,
            "description" => "Thiết bị không phải loại cửa!",
          ],
          [
            "error_code" => 113,
            "description" => "Thiết bị không phải loại camera!",
          ],
          [
            "error_code" => 114,
            "description" => "Thiết bị đang không tích hợp camera!",
          ],
          [
            "error_code" => 115,
            "description" => "Thông tin server camera đang trống!",
          ],
          [
            "error_code" => 116,
            "description" => "Thiết bị không phải loại rèm!",
          ],
          [
            "error_code" => 117,
            "description" => "Không có quyền thay đổi trên remote này!",
          ],
          [
            "error_code" => 118,
            "description" => "Bạn chỉ được đặt 1 hẹn giờ mở cửa!",
          ],
          [
            "error_code" => 119,
            "description" => "Bạn chỉ được đặt 1 hẹn giờ khoá cửa!",
          ],
          [
            "error_code" => 120,
            "description" => "Chuỗi json thiếu dữ liệu!",
          ],
          [
            "error_code" => 121,
            "description" => "Không thể liên kết với tài khoản. Liên hệ quản trị viên!",
          ],
          [
            "error_code" => 122,
            "description" => "Thiết bị đang được chia sẻ tới một số điện thoại khác!",
          ],
          [
            "error_code" => 123,
            "description" => "Chia sẻ không tồn tại!",
          ],
          [
            "error_code" => 124,
            "description" => "Thiết bị đã chấp nhận chia sẻ, không thể xoá!",
          ],
          [
            "error_code" => 125,
            "description" => "Không thể xoá phòng ẩn!",
          ],
          [
            "error_code" => 126,
            "description" => "Số lượng thiết bị không đúng!",
          ],
          [
            "error_code" => 127,
            "description" => "ID remote đang bỏ trống",
          ],
          [
            "error_code" => 128,
            "description" => "User điều khiển của lệnh không tồn tại",
          ],
          [
            "error_code" => 129,
            "description" => "Không tìm thấy thiết bị",
          ],
          [
            "error_code" => 130,
            "description" => "Lệnh không phải điều khiển",
          ],
          [
            "error_code" => 131,
            "description" => "Lỗi dữ liệu. Liên hệ hỗ trợ để trợ giúp",
          ],
          [
            "error_code" => 132,
            "description" => "Thời gian chưa được chọn.",
          ],
          [
            "error_code" => 133,
            "description" => "Chưa nhập nhóm khách hàng",
          ],
          [
            "error_code" => 134,
            "description" => "Thời gian chọn không đúng",
          ],
          [
            "error_code" => 135,
            "description" => "Danh sách hẹn giờ có hẹn giờ lỗi JSON. Vui lòng liên hệ hỗ trợ",
          ],
          [
            "error_code" => 136,
            "description" => "Danh sách hẹn giờ có hẹn giờ lỗi.Vui lòng liên hệ hỗ trợ",
          ],
          [
            "error_code" => 137,
            "description" => "Bạn đã yêu cầu mã otp. Vui lòng thử lại sau 5 phút",
          ],
          [
            "error_code" => 138,
            "description" => "Mã OTP đang bỏ trống",
          ],
          [
            "error_code" => 139,
            "description" => "OTP không chính xác",
          ],
          [
            "error_code" => 140,
            "description" => "OTP hết hạn sử dụng",
          ],[
            "error_code" => 141,
            "description" => "ID không tồn tại!",
          ],[
            "error_code" => 142,
            "description" => "ID đang bỏ trống!",
          ],
        ];

        $array = [
          "error_code" => 0,
          "description" => "Lỗi gói tin!",
        ];

        foreach ($data_code as $value) {
            if ($value['error_code'] == $error_code) {
                $array = [
                  "status" => false,
                  "message" => $value['description'],
                  "data" => null,
                  "error_code" => $error_code,
                ];
            }
        }
        return json_encode($array);
    }

}