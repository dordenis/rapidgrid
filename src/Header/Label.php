<?php

namespace  AjaxBlog\RapidGrid\Header;
use AjaxBlog\RapidGrid\Header;

/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/27/16
 * Time: 4:04 PM
 */
class Label extends Header
{

    public $label;
    protected $template = "label";

    public function __construct($label) {
        $this->label = $label;
    }

    public function criteria(&$criteria)
    {
        // TODO: Implement criteria() method.
    }

}