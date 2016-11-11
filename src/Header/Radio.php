<?php

namespace AjaxBlog\RapidGrid\Header;


class Radio extends ListFilter
{

    protected $template = "radio";

    /**
     * @param $criteria Criteria
     * @return mixed
     */
    public function criteria(&$criteria)
    {
        if($this->valid()) {
            return $criteria->equal($this->field, $this->getValue());
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
                'is_active' => ($this->getValue() !== $this->default) && ($this->getValue() == $value)
            ];
        }
        return $result;
    }

}