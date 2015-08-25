<?php

namespace AjaxBlog\RapidGrid\Column;

use AjaxBlog\RapidGrid\Paginate;

class Sort extends Base
{

    protected $templateHead = "column.sort";

    public function contentSortArrow($icons) {
        $current = $this->getUrl()->get($this->field);

        $content = [];
        foreach($icons as $sort => $icon) {
            $this->getUrl()->group($this->field, $sort);
            $this->getUrl()->clear(Paginate::NAME);
            $content[$sort] = "<a class='{$icon}' href='{$this->getUrl()->build()}'></a>";
        }

        if ($current) {
            $content[$current] = "<i class='{$icons[$current]}'></i>";
        }

        return implode(" ", $content);
    }

    public function criteria($criteria) {
        $sort = $this->getUrl()->get($this->field);
        if ($sort) {
            $criteria->order($this->field, $sort);
        }

        return parent::criteria($criteria);
    }


}
