<?php

namespace AjaxBlog\RapidGrid\Column\Sort;

use AjaxBlog\RapidGrid\Column\Sort;

abstract class Link extends Sort {

	public $templateCell = "link";

	abstract public function getUrl($row);

} 