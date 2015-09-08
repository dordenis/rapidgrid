<?php

namespace AjaxBlog\RapidGrid\Column;

class Sample extends ColumnAbstract {

    protected function contentHeaderCell() {
        return $this->label;
    }

    protected function contentBodyCell($model) {
        return $model[$this->field];
    }

    public function criteria($criteria) {
        return $criteria;
    }

} 