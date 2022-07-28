<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Tag extends API_Controller
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

        $rs = $this->woocommerce->get('products/tags?per_page='.$per_page."&page=".$page);
        $rs = $rs ?? [];
        if (isset($rs->code)) {
            $rs = [];
        }
        $eliminate = [ID_CATE_BANNER, ID_CATE_SELLWELL, ID_CATE_UNCATEGORIZED];

        $data = [];
        foreach ($rs as $item) {
            if (!in_array($item->id, $eliminate)) {
                $data[] = $item;
            }
        }
        if (isset($data->code)) {
            $this->result_json_wpfail($data);
        }
        $this->result_json($data, "Danh sách thẻ tags sản phẩm");
    }

    public function get()
    {
        $id = $this->io->get('id');

        if (empty($id)) {
            $this->result_json_error(ERROR_ID_EMPTY);
        }

        $rs = $this->woocommerce->get('products/tags/' . $id);

        $rs = $rs ?? [];
        if (isset($rs->code)) {
            $this->result_json_wpfail($rs);
        }
        $this->result_json($rs, "Thông tin thẻ tags");
    }


    private function add()
    {
        $post = $this->io->post();
        $name = $post['name'] ?? null;
        if (empty($name)) {
            $this->result_json_error(ERROR_TAG_NAME_EMPTY);
        }

        $data = $this->woocommerce->post('products/tags', $post);

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
          'description',
        ];

        $data = [];
        foreach ($fields as $field) {
            $tmp = $post[$field] ?? null;
            if (!empty($tmp)) {
                $data[$field] = $tmp;
            }
        }

        $data = $this->woocommerce->post('products/tags/' . $id, $data);

        if (empty($data)) {
            $this->result_json_error(ERROR_UPDATE_FAIL);
        }

        if (isset($data->code)) {
            $this->result_json_wpfail($data);
        }

        $this->result_json($data, "Cập nhật thành công");
    }

}