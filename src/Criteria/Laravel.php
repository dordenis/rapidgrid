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
        $this->model = $this->model->orderBy($field, $sort);
        $query = $this->model->getQuery();
        $query->orders = [[
            "column" => $field,
            "direction" => $sort
        ]];
        $this->model->getQuery($query);
    }

    public function offset($offset)
    {
        $this->model = $this->model->skip($offset);
    }

    public function limit($limit)
    {
        $this->model = $this->model->take($limit);
    }

    public function match($field, $value)
    {
        $this->model = $this->model->where($field, "like", "%{$value}%");
    }

    public function equal($field, $value)
    {
        $this->model = $this->model->where($field, "=", $value);
    }

    public function in($field, $values=[]) {
        $this->model = $this->model->whereIn($field, $values);
    }

    public function sql() {
        return $this->model->toSql();
    }

    function __clone()
    {
        // Принудительно копируем this->object, иначе
        // он будет указывать на один и тот же объект.
        $this->model = clone $this->model;
    }
}
