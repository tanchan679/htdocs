<?php

defined('BASEPATH') or exit('No direct script access allowed');

class ProductNotable extends API_Controller
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

        $rs = $this->woocommerce->get('products?category=' . ID_CATE_PRODUCT_NOTABLE . '?per_page=' . $per_page . "&page=" . $page);
        $rs = $rs ?? [];

        if (isset($rs->code)) {
            $this->result_json_wpfail($rs);
        }

        foreach ($rs as &$item) {
            if (isset($item->attributes)) {
                $check = false;
                $attributes = $item->attributes;
                foreach ($attributes as $itemAttri) {
                    if ($itemAttri->name == NAME_PRODUCT_NOTABLE_IN_ATTRIBUTES_SET_IN_WP) {
                        $item->name_notable = $itemAttri->options[0] ?? $item->name_notable;
                        $check = true;
                        break;
                    }
                }
                if ($check == false) {
                    $item->name_notable = $item->name;
                }
            } else {
                $item->name_notable = $item->name;
            }
        }

        $this->result_json($rs, "Danh sách sản phảm nổi bật");
    }


    public function get()
    {
        $id = $this->io->get('id');

        if (empty($id)) {
            $this->result_json_error(ERROR_ID_EMPTY);
        }

        $rs = $this->woocommerce->get('products/' . $id);

        $rs = $rs ?? [];
        $check = false;

        if (isset($rs->code)) {
            $this->result_json_wpfail($rs);
        } else {
            $cate = $rs->categories;
            foreach ($cate as $itemCate) {
                if ($itemCate->id == ID_CATE_PRODUCT_NOTABLE) {
                    $check = true;
                    break;
                }
            }
        }
        if (!$check) {
            $this->result_json_error(ERROR_ITEM_PRODUCT_NOTABLE_NOT_FOUND);
        } else {
            $this->result_json($rs, "Chi tiết sản phẩm");
        }
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