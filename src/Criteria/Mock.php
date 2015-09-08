<?php

namespace AjaxBlog\RapidGrid\Criteria;

class Mock implements \AjaxBlog\RapidGrid\Criteria
{

    private $data = [];

    public function __construct($data) {
        $this->data = $data;
    }

    public function queryRows() {
        return $this->data;
    }

    public function countRows() {
        return count($this->data);
    }

    public function order($field, $sort) {
        return $this;
    }

    public function offset($offset) {

    }

    public function limit($limit) {

    }

    public function match($field, $value) {

    }

    public function equal($field, $value)
    {

    }
}