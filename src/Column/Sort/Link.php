<?php

namespace AjaxBlog\RapidGrid\Column\Sort;

use AjaxBlog\RapidGrid\Column\Sort;

abstract class Link extends Sort {

	public $templateCell = "column.link";

	abstract public function getUrl($row);

} 