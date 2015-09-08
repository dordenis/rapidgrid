<?php

namespace AjaxBlog\RapidGrid\Column;

use AjaxBlog\RapidGrid\Paginate;

class Sort extends Sample
{

    protected $template = "sort";

    public function contentSortArrow($icons) {
        $current = $this->getUrl()->get($this->field);

        $content = [];
        foreach($icons as $sort => $icon) {
            $url = $this->getUrl()->group($this->field, $sort)->clear(Paginate::NAME);
            $content[$sort] = "<a class='{$icon}' href='{$url->build()}'></a>";
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