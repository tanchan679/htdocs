<?php

const ERROR_LOGIN_PHONE_EMPTY = 1;
const ERROR_LOGIN_PASSWORD_EMPTY = 2;
const ERROR_LOGIN_WRONG_PHONE_OR_PASSWORD = 3;
const ERROR_TOKEN_EMPTY = 4;
const ERROR_TOKEN_NOT_FOUND = 5;

const ERROR_REGISTER_PHONE_EMPTY = 10;
const ERROR_REGISTER_PASSWORD_EMPTY = 11;
const ERROR_REGISTER_NAME_EMPTY = 12;
const ERROR_REGISTER_PHONE_NOT_TRUE = 13;
const ERROR_REGISTER_PHONE_EXIST = 14;
const ERROR_REGISTER_EMAIL_WRONG = 15;
const ERROR_REGISTER_FAIL = 16;

const ERROR_USER_NOT_FOUNT = 20;
const ERROR_USER_DISABLE = 21;
const ERROR_USER_UPDATE_INFO_FAIL = 22;
const ERROR_USER_NOT_PERMISSION = 23;
const ERROR_USER_WRONG_INFO = 24;

const ERROR_CHANGE_PASS_PASSWORD_EMPTY = 31;
const ERROR_CHANGE_PASS_OLD_PASSWORD_WRONG = 32;
const ERROR_CHANGE_PASS_FAIL = 33;

const ERROR_FORGOT_PASS_PHONE_EMPTY = 40;
const ERROR_FORGOT_PASS_NEW_PASS_EMPTY = 41;

const ERROR_JSON_EMPTY = 50;
const ERROR_JSON_WRONG = 51;

const ERROR_TITLE_EMPTY = 100;
const ERROR_CONTENT_EMPTY = 101;
const ERROR_VALUE_NOT_ARRAY = 102;
const ERROR_EMPTY_PROJECT_TYPE = 103;

const ERROR_PARTICIPANT_EMPTY = 110;

const ERROR_INSERT_FAIL = 150;
const ERROR_UPDATE_FAIL = 151;
const ERROR_UPLOAD_FILE = 200;
const ERROR_DATA_ALREADY_EXSISTS = 201;

const ERROR_ID_EMPTY = 251;
const ERROR_ID_NOT_FOUND = 252;

const ERROR_DEFAULT_CANNOT_BE_CLEARED = 554;

function getErrorMessage($errorCode)
{
    $msg = [
      ERROR_LOGIN_WRONG_PHONE_OR_PASSWORD => 'Sai số điện thoại hoặc mật khẩu',
      ERROR_LOGIN_PHONE_EMPTY => 'Số điện thoại đang rỗng',
      ERROR_LOGIN_PASSWORD_EMPTY => 'Mật khẩu đang rỗng',

      ERROR_TOKEN_NOT_FOUND => "Token không đúng",

      ERROR_REGISTER_PHONE_EMPTY => 'Số điện thoại đang rỗng',
      ERROR_REGISTER_NAME_EMPTY => 'Tên đang rỗng',
      ERROR_REGISTER_PASSWORD_EMPTY => 'Mật khẩu đang rỗng',
      ERROR_REGISTER_PHONE_NOT_TRUE => 'Số điện thoại không đúng',
      ERROR_REGISTER_PHONE_EXIST => 'Số điện thoại đã tồn tại',
      ERROR_REGISTER_EMAIL_WRONG => 'Email không đúng',
      ERROR_REGISTER_FAIL => 'Đăng ký thất bại',

      ERROR_TOKEN_EMPTY => 'Lỗi Token rỗng',
      ERROR_USER_NOT_FOUNT => 'Không tìm thấy tài khoản',
      ERROR_USER_DISABLE => 'Tài khoản này không còn hoạt động',
      ERROR_USER_NOT_PERMISSION => 'Tài khoản của bạn không có quyền!',
      ERROR_USER_WRONG_INFO => 'Sai tên đăng nhập hoặc mật khẩu',

      ERROR_CHANGE_PASS_PASSWORD_EMPTY => 'Mật khẩu đang rỗng',
      ERROR_CHANGE_PASS_OLD_PASSWORD_WRONG => 'Mật khẩu cũ không đúng',
      ERROR_CHANGE_PASS_FAIL => 'Thay đổi mật khẩu thất bại',

      ERROR_FORGOT_PASS_PHONE_EMPTY => 'Số điện thoại đang rỗng',
      ERROR_FORGOT_PASS_NEW_PASS_EMPTY => 'Mật khẩu mới đang rỗng',

      ERROR_JSON_EMPTY => 'Chuỗi json đang trống',
      ERROR_JSON_WRONG => 'Chuỗi không phải json',

      ERROR_UPLOAD_FILE => 'Lỗi upload',

      ERROR_INSERT_FAIL => 'Thêm dữ liệu thất bại',
      ERROR_UPDATE_FAIL => 'Cập nhật thất bại',
      ERROR_DATA_ALREADY_EXSISTS => "Dữ liệu đã tồn tại",

      ERROR_ID_EMPTY => "ID đang bỏ trống",
      ERROR_ID_NOT_FOUND => "ID không tồn tại",
      ERROR_TITLE_EMPTY => "Tiêu đề đang bỏ trống",
      ERROR_CONTENT_EMPTY => "Nội dung đang bỏ trống",
      ERROR_VALUE_NOT_ARRAY => 'Dữ liệu phải là array',
      ERROR_EMPTY_PROJECT_TYPE => 'Loại dự án đang bỏ trống',

      ERROR_PARTICIPANT_EMPTY => 'Chưa chọn người tham gia',
      ERROR_DEFAULT_CANNOT_BE_CLEARED => 'Mặc định không thể bị xóa',
    ];

    if (isset($msg[$errorCode])) {
        return $msg[$errorCode];
    }
    return "UnKnow Error";
}