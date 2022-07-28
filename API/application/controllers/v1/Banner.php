<?php

defined('BASEPATH') or exit('No direct script access allowed');

class Banner extends API_Controller
{

    public function __construct()
    {
        parent::__construct();
    }

    public function list()
    {
        $rs = $this->woocommerce->get('products?category='.ID_CATE_BANNER);
        $rs = $rs ?? [];

        if (isset($rs->code)) {
            $this->result_json_wpfail($rs);
        }

        $this->result_json($rs, "Danh sách banner");
    }

    public function getBannerGroup()
    {
        $rs = $this->woocommerce->get('products?category='.ID_CATE_BANNER);
        $rs = $rs ?? [];
        if (isset($rs->code)) {
            $this->result_json_wpfail($rs);
        }

        $data = [];
        $count = 0;

        foreach ($rs as $item) {
            if ($item->id == ID_PRODUCT_BANNER_SINGLE) {
                continue;
            }
            $data[] = $item;
            if (++$count == MAXIMUM_NUMBER_OF_BANNERS) {
                break;
            }
        }

        $this->result_json($data, "Danh sách item banner");
    }

    public function getBannerSingle()
    {
        $rs = $this->woocommerce->get('products/'.ID_PRODUCT_BANNER_SINGLE);
        $rs = $rs ?? [];

        if (isset($rs->code)) {
            $this->result_json_wpfail($rs);
        }


        $this->result_json($rs, "Thông tin banner");
    }

    public function getItemBanner()
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
                if ($itemCate->id == ID_CATE_BANNER) {
                    $check = true;
                    break;
                }
            }
        }
        if (!$check) {
            $this->result_json_error(ERROR_ITEM_BANNER_NOT_FOUND);
        } else {
            $this->result_json($rs, "Chi tiết banner");
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