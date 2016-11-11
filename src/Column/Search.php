<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/31/16
 * Time: 1:43 PM
 */

namespace AjaxBlog\RapidGrid\Column;

use AjaxBlog\RapidGrid\Header\Label;

class Search extends Sort
{
    protected function initHeaders($label) {
        $this->setHeaders([
            new Label($label),
            new \AjaxBlog\RapidGrid\Header\Sort($this->field),
            new \AjaxBlog\RapidGrid\Header\Search($this->field)
        ]);
    }
}