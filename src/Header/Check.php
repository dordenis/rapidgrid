<?php

namespace AjaxBlog\RapidGrid\Header;

use AjaxBlog\RapidGrid\Url;

class Check extends ListFilter
{

    const SPLIT = "|";

    protected $template = "check";

    /**
     * @param $criteria Criteria
     * @return mixed
     */
    public function criteria(&$criteria)
    {
        if ($this->valid()) {
            $criteria->in($this->field, $this->getValue());
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
                'is_active' => in_array($value, $this->getValue())
            ];
        }
        return $result;
    }

    protected function valid() {
        return count($this->getValue()) > 0;
    }

    public function getValue() {
        $keys = array_keys($this->list);

        $value = Url::getInstance()->get($this->getField(), $this->default);
        $values = explode(self::SPLIT, $value);

        return array_intersect($keys, $values);
    }

    public function urlFilter($value=null) {
        $values = $this->getValue();
        if(in_array($value, $values)) {
            $values = array_diff($values, [$value]);
        } else {
            $values = array_merge($values, [$value]);
        }

        $value = implode($values, self::SPLIT);
        return parent::urlFilter($value);
    }

}
