<?php

namespace AjaxBlog\RapidGrid\Criteria;

use AjaxBlog\RapidGrid\Criteria;

class Laravel implements Criteria
{

    /**
     * @var $model Illuminate\Database\Capsule\
     */
    private $model;

    public function __construct($model) {
        $this->model = $model;
    }

    /**
     * @return array
     */
    public function queryRows()
    {
        return $this->model->get();
    }

    public function countRows()
    {
        return $this->model->count();
    }

    public function order($field, $sort)
    {
        $this->model->orderBy($field, $sort);
    }

    public function offset($offset)
    {
        $this->model->skip($offset);
    }

    public function limit($limit)
    {
        $this->model->take($limit);
    }

    public function match($field, $value)
    {
        $this->model->where($field, "like", "%{$value}%");
    }

    public function equal($field, $value)
    {
        $this->model->where($field, "=", $value);
    }
}
