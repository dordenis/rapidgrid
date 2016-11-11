<?php

namespace AjaxBlog\RapidGrid;

/**
 * Created by PhpStorm.
 * User: user
 * Date: 10/27/16
 * Time: 2:57 PM
 */
class Column
{

    use Template;

    private $headers=[];

    protected $field;
    protected $template = "column";

    static public function factory($field=null) {
        return new static($field);
    }

    public function __construct($field=null) {
        $this->field = $field;
    }

    /**
     * @param $header
     * @return $this
     */
    public function setHeader($header) {
        $this->headers[] = $header;
        return $this;
    }


    /**
     * @param $headers array
     * @return $this
     */
    public function setHeaders($headers=[]) {
        foreach ($headers as $header) {
            $this->setHeader($header);
        }
        return $this;
    }

    /**
     * @return array
     */
    public function getHeaders() {
        return $this->headers;
    }

    public function criteria(&$criteria) {
        foreach ($this->getHeaders() as $header) {
            $header->criteria($criteria);
        }
    }

    public function getValue($model) {
        if (is_array($model)) {
            $model = (object) $model;
        }
        return isset($model->{$this->field}) ? $model->{$this->field} : null;
    }


}