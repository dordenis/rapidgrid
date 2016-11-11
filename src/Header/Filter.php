<?php

namespace AjaxBlog\RapidGrid\Header;

use AjaxBlog\RapidGrid\Header;
use AjaxBlog\RapidGrid\Paginate;
use AjaxBlog\RapidGrid\Url;

abstract class Filter extends Header {


	protected $field;

    protected $default = null;

    const NAME = "filter";

    abstract protected function valid();

	public function getValue() {
	    $value = Url::getInstance()->get($this->getField(), $this->default);
		return $value;
	}

	public function setField($field) {
		$this->field = $field;
        return $this;
	}

	public function getField() {
		return self::NAME."_".$this->field;
	}

    public function getUrl() {
        return clone $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

	public function urlReset() {
	    $url = new Url();
        $url = $url->clear(Paginate::NAME)->clear($this->getField())->build();
		return $url;
	}

	public function urlFilter($value=null) {
        $url = new Url();
        $url = $url->clear(Paginate::NAME)->set($this->getField(), $value)->build();
		return $url;
	}

    public function isActive() {
        return $this->valid();
    }

} 
