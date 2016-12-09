<?php
/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/27/16
 * Time: 7:01 PM
 */

namespace AjaxBlog\RapidGrid\Header;


use AjaxBlog\RapidGrid\Header;
use AjaxBlog\RapidGrid\Paginate;
use AjaxBlog\RapidGrid\Url;

class Sort extends Header
{
    const NAME = "sort";

    protected $template = "sort";
    protected $field;

    public function __construct($field)
    {
        $this->field = $field;
    }

    public function getUrl($sort) {
        $url = new Url();
        return ($this->getValue() == $sort) ?  null : $url->set(self::NAME, "{$this->field}|{$sort}")->clear(Paginate::NAME)->build();
    }

    public function criteria(&$criteria) {
        $sort = $this->getValue();
        if ($sort) {
            $criteria->order($this->field, $sort);
        }
    }

    private function getValue() {
        $value = Url::getInstance()->get(self::NAME);
        $value = explode("|", $value);
        if (is_array($value) and ($value[0] == $this->field)) {
            return  $value[1];
        }
        return null;
    }


}