<?php

namespace AjaxBlog\RapidGrid\Header;

abstract class ListFilter extends Filter
{

    protected $template = "list";
    protected $list = [];

    /**
     * @return array
     */
    abstract public function getList();

    public function __construct($field, $list=[]) {
        $this->field = $field;
        $this->setList($list);
    }

    protected function valid() {
        return isset($this->list[$this->getValue()]);
    }

    /**
     * @param array $list
     */
    public function setList($list)
    {
        $this->list = $list;
    }
}