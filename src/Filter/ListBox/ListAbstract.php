<?php

namespace AjaxBlog\RapidGrid\Filter\ListBox;

use AjaxBlog\RapidGrid\Filter\FilterAbstract;


abstract class ListAbstract extends FilterAbstract
{

    protected $template = "list";
    protected $list = [];

    /**
     * @return array
     */
    abstract public function getList();

    static public function factory($list=[]) {
        return new static($list);
    }

    public function __construct($list=[]) {
        parent::__construct();
        $this->setList($list);
    }

    protected function valid() {
        return isset($this->list[$this->value()]);
    }

    /**
     * @param array $list
     */
    public function setList($list)
    {
        $this->list = $list;
    }
}