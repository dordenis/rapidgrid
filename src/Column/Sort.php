<?php

namespace AjaxBlog\RapidGrid\Column;
use AjaxBlog\RapidGrid\Column;
use AjaxBlog\RapidGrid\Header\Label;

/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/28/16
 * Time: 5:00 PM
 */
class Sort extends Column
{

    static public function factory($field=null, $label=null) {
        return new static($field, $label);
    }

    public function __construct($field=null, $label=null) {
        $this->field = $field;
        $this->initHeaders($label);
    }

    protected function initHeaders($label) {
        $this->setHeaders([new Label($label), new \AjaxBlog\RapidGrid\Header\Sort($this->field)]);
    }

}