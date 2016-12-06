<?php

namespace AjaxBlog\RapidGrid\Filter\ListBox;

use AjaxBlog\RapidGrid\Criteria;

class Check extends ListAbstract
{

    const SPLIT = "|";

    protected $template = "check";

    /**
     * @param $criteria Criteria
     * @return mixed
     */
    public function criteria($criteria)
    {
        foreach($this->value() as $value) {
            $criteria->equal($this->getField(), $value);
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
                'is_active' => in_array($value, $this->value())
            ];
        }
        return $result;
    }

    protected function valid() {
        return count($this->value()) > 0;
    }

    public function value() {
        $keys = array_keys($this->list);

        $value = $this->getUrl()->get($this->getField(), $this->default);
        $values = explode(self::SPLIT, $value);

        return array_intersect($keys, $values);
    }

    public function urlFilter($value=null) {
        $values = $this->value();
        if(in_array($value, $values)) {
            $values = array_diff($values, [$value]);
        } else {
            $values = array_merge($values, [$value]);
        }

        $value = implode($values, self::SPLIT);
        return parent::urlFilter($value);
    }

}