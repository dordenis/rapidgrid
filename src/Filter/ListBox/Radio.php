<?php

namespace AjaxBlog\RapidGrid\Filter\ListBox;

use AjaxBlog\RapidGrid\Criteria;

class Radio extends ListAbstract
{

    protected $template = "radio";

    /**
     * @param $criteria Criteria
     * @return mixed
     */
    public function criteria($criteria)
    {
        if($this->valid()) {
            $criteria->equal($this->getField(), $this->value());
        }
    }

    /**
     * @return array
     */
    public function getList()
    {
        $result = [];
        foreach($this->list as $value => $title) {
            $result[$value] = (object) [
                'title' => $title,
                'url' => $this->urlFilter($value),
                'is_active' => ($this->value() !== $this->default) && ($this->value() == $value)
            ];
        }
        return $result;
    }

}