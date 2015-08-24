<?php

namespace AjaxBlog\RapidGrid\Column;

use AjaxBlog\RapidGrid\Paginate;

class Sort extends Base
{

    public $icons = [
        'asc' => 'fa fa-sort-asc',
        'desc' => 'fa fa-sort-desc'
    ];

    public function contentHeaderCell() {
        return parent::contentHeaderCell().$this->contentSortArrow();
    }

    protected function contentSortArrow() {

        $content = [];
        foreach($this->icons as $sort => $icon) {
            $this->getUrl()->group($this->field, $sort);
            $this->getUrl()->clear(Paginate::NAME);
            $content[$sort] = "<a class='{$icon}' href='{$this->getUrl()->build()}'></a>";
        }

        $sort = $this->getUrl()->get($this->field);
        if ($sort) {
            $content[$sort] = "<i class='{$this->icons[$sort]}'></i>";
        }

        return '<div class="th-sort pull-right">'.implode(" ", $content).'</div>';
    }

    public function criteria($criteria) {
        $sort = $this->getUrl()->get($this->field);
        if ($sort) {
            $criteria->order($this->field, $sort);
        }

        return parent::criteria($criteria);
    }


}