<?php
const APP_NAME = 'Hunonic-work';
const DOMAIN_HUNONIC = 'https://api.hunonicpro.com';
//const DOMAIN_HUNONIC = 'http://localhost/solution/webapi-hunonic';
const URL_HUNONIC_API = DOMAIN_HUNONIC . '/v2';

//const DOMAIN_CTV_PRODUCT = 'https://ctv.hunonicpro.com/v1';
//const DOMAIN_HUNONIC_SALE = 'https://telesale.hunonicpro.com/api';
//const DOMAIN_HUNONIC_SALE = 'http://localhost/solution/seller-hunonic/api';

const USER_ROLE_ADMIN = 1;
const USER_ROLE_SUPPORT = 2;
const USER_ROLE_SALE = 3;
const USER_ROLE_AGENCY = 4;

const USER_STATUS_ACTIVE = 1;

const TOPIC_FIREBASE_FRE_FIX = 'HUNONIC_WORK_';

const TOPIC_ALL = "HUNONIC_WORK_ALL";
const TOPIC_PHONE = "HUNONIC_WORK_";

const STATUS_SUGGESTION_ACTIVE = 1;
const STATUS_SUGGESTION_DEACTIVE = 0;

const NOT_ALLOW_COMMENT = 0;
const ALLOW_COMMENT = 1;

const NOT_PIN_COMMENT = 0;
const PIN_COMMENT = 1;

const PROJECT_STATUS_CREATED = 1;
const PROJECT_STATUS_STARTED = 2;
const PROJECT_STATUS_EMD = 3;

const TASK_TYPE_PERSONAL = 1;
const TASK_TYPE_IN_PROJECT = 2;

const TASK_STATUS_NEW = 1;
const TASK_STATUS_PENDDING = 2;
const TASK_STATUS_DONE = 3;


const TASK_PRIORITY_NONMAL = 1;
const TASK_PRIORITY_URGENT = 2;

const METHOD_TOKEN_POST = 1;
const METHOD_TOKEN_GET = 2;

const USER_POSTITION_CEO = 1;
const USER_POSTITION_MANAGER = 2;
const USER_POSTITION_STAFF = 3;

function getAgencyTopicByPhone($phone)
{
    return TOPIC_PHONE . $phone;
}

function getUserRoleName($roleId)
{
    $roleName = [
      USER_ROLE_ADMIN => 'Admin',
      USER_ROLE_SUPPORT => 'Hỗ trợ kỹ thuật',
      USER_ROLE_AGENCY => 'Đại lý',
      USER_ROLE_SALE => 'Nhân viên kinh doanh',
    ];
    return $roleName[$roleId] ?? 'Unknow';
}

function getUserPositionName($positionId)
{
    if ($positionId == 0) {
        $PositionName = [
          [
            'id' => USER_POSTITION_CEO,
            'name' => 'Giám đốc',
          ],
          [
            'id' => USER_POSTITION_MANAGER,
            'name' => 'Trưởng phòng',
          ],
          [
            'id' => USER_POSTITION_STAFF,
            'name' => 'Nhân viên',
          ],
        ];
        return $PositionName; //if positionId = 0 => get all

    } else {
        $positionName = [
          USER_POSTITION_CEO => 'Giám đốc',
          USER_POSTITION_MANAGER => 'Trưởng phòng',
          USER_POSTITION_STAFF => 'Nhân viên',

        ];
        return $positionName[$positionId] ?? 'Unknow';

    }
}
