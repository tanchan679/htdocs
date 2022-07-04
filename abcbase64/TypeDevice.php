<?php

class TypeDevice
{
    public static $ROOT_TYPE_DOOR = "sdoor1";
    public static $ROOT_TYPE_DOOR_2 = "sdoor2";
    public static $ROOT_TYPE_DOOR_3 = "sdoor3";
    public static $ROOT_TYPE_DOOR_4 = "sdoor4";


    public static $ROOT_TYPE_BLIND = "blindwifi";
    public static $ROOT_TYPE_BLIND_V2 = "blindwifiv2";

    public static $ROOT_TYPE_IR_WIFI = "irwifi";
    public static $ROOT_TYPE_IR_CHILD = "irchild";

    public static $ROOT_TYPE_SIM_SWITCH = "swsim";

    public static $ROOT_TYPE_GATE = "gate";


    public static function isTypeDoor($type): bool
    {
        return $type == self::$ROOT_TYPE_DOOR || $type == self::$ROOT_TYPE_DOOR_2 || $type == self::$ROOT_TYPE_DOOR_3 || $type == self::$ROOT_TYPE_DOOR_4;
    }

    public static function isTypeBlind($type): bool
    {
        return $type == self::$ROOT_TYPE_BLIND || $type == self::$ROOT_TYPE_BLIND_V2;
    }

    public static function isIRDevice($type): bool
    {
        return $type == self::$ROOT_TYPE_IR_WIFI || $type == self::$ROOT_TYPE_IR_CHILD;
    }


}

class IR_CATEGORY_CODE
{
    public static $CATEGORY_AC = 1;
    public static $CATEGORY_TV = 2;
    public static $CATEGORY_CUSTOM_TV = 18;
    public static $CATEGORY_CUSTOM_USER = 19;
    public static $CATEGORY_CUSTOM_AC = 20;
}