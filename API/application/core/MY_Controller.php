<?php
defined('BASEPATH') or exit('No direct script access allowed');
date_default_timezone_set('Asia/Ho_Chi_Minh');
ini_set('memory_limit', '-1');

require_once(APPPATH . 'controllers/const.php');
require_once(APPPATH . 'controllers/error_code.php');
require_once(APPPATH . 'controllers/CommonFunctions.php');

require_once('vendor/autoload.php');

use Automattic\WooCommerce\Client;

class API_Controller extends CI_Controller
{

    public $io;

    protected $woocommerce;

    public function __construct()
    {
        parent::__construct();
        header('Content-Type: application/json');
        ob_start();
        $this->io = $this->input;
        $this->woocommerce = $this->getWoocommerce();
    }

    public function getWoocommerce()
    {
        $woocommerce = new Client(
          DOMAIN_HUNONIC_STORE, // Your store URL
          PUBLIC_KEY_GOVERNOR, // Your consumer key
          SECRET_KEY_GOVERNOR, // Your consumer secret
          [
            'wp_api' => true, // Enable the WP REST API integration
            'version' => 'wc/v2' // WooCommerce WP REST API version
          ]
        );
        return $woocommerce;
    }

    public function result_json($data = null, $message = 'Success'): string
    {
        $array = [
          "status" => true,
          "message" => $message,
          "data" => $data,
        ];
        ob_end_clean();
        die(json_encode($array));
    }

    /*
     * Hiển thị lỗi và thông báo theo lỗi API Wordpress xuất ra
     */
    public function result_json_wpfail($data = null): string
    {
        $error_code = $data->code ?? 0;
        $message = $data->message ?? getErrorMessage(0);
        $array = [
          "status" => false,
          "message" => $message,
          "data" => null,
          "error_code" => $error_code,
        ];

        ob_end_clean();
        die(json_encode($array));
    }

    public function result_json_error($error_code, $message = '')
    {
        if (empty($message)) {
            $message = getErrorMessage($error_code);
        }
        $rs = [
          "status" => false,
          "message" => $message,
          "data" => null,
          "error_code" => $error_code,
        ];
        ob_end_clean();
        die(json_encode($rs));
    }

}