<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/28/16
 * Time: 12:51 PM
 */

namespace AjaxBlog\RapidGrid;

abstract class Header {

    use Template;

    protected $template;

    abstract public function criteria(&$criteria);

}