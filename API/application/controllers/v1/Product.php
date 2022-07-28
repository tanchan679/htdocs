<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Product extends API_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function list()
    {
        $per_page = $this->io->get('per_page');
        $page = $this->io->get('page');
        if (empty($per_page)) {
            $per_page = 10;
        }
        if (empty($page)) {
            $page = 1;
        }

        $rs = $this->woocommerce->get('products?per_page='.$per_page."&page=".$page);

        if (isset($rs->code)) {
            $this->result_json_wpfail($rs);
        }
        $this->result_json($rs, "Danh sách sản phẩm");
    }

    public function get()
    {
        $id = $this->io->get('id');

        if (empty($id)) {
            $this->result_json_error(ERROR_ID_EMPTY);
        }

        $rs = $this->woocommerce->get('products/' . $id);

        $rs = $rs ?? [];
        if (isset($rs->code)) {
            $this->result_json_wpfail($rs);
        }
        $this->result_json($rs, "Thông tin sản phẩm");
    }


    private function add()
    {
        $post = $this->io->post();
        $name = $post['name'] ?? null;

        if (empty($name)) {
            $this->result_json_error(ERROR_CATEGORY_NAME_EMPTY);
        }

        $data = $this->woocommerce->post('products', $post);

        if (empty($data)) {
            $this->result_json_error(ERROR_INSERT_FAIL);
        }

        if (isset($data->code)) {
            $this->result_json_wpfail($data);
        }

        $this->result_json($data, "Thêm thành công");
    }

    private function update()
    {
        $post = $this->io->post();
        $id = $post['id'] ?? 0;
        if (empty($id)) {
            $this->result_json_error(ERROR_ID_EMPTY);
        }

        $fields = [
          'name',
          'parent',
          'parent',
          'description',
          'image',
        ];

        $data = [];
        foreach ($fields as $field) {
            $tmp = $post[$field] ?? null;
            if (!empty($tmp)) {
                $data[$field] = $tmp;
            }
        }

        $data = $this->woocommerce->post('products/' . $id, $data);

        if (empty($data)) {
            $this->result_json_error(ERROR_UPDATE_FAIL);
        }

        if (isset($data->code)) {
            $this->result_json_wpfail($data);
        }

        $this->result_json($data, "Cập nhật thành công");
    }

}