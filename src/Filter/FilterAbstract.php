<?php

namespace AjaxBlog\RapidGrid\Filter;

use AjaxBlog\RapidGrid\Criteria;
use AjaxBlog\RapidGrid\Url;

abstract class FilterAbstract {

	/**
	 * @var $url Url
	 */
	private $url;

	protected $field;
	protected $template;

    protected $default = null;

	/**
	 * @param $criteria Criteria
	 * @return mixed
	 */
	abstract public function criteria($criteria);
	abstract public function isNotResetStat();

    final static public function factory() {
        return new static();
    }

	final public function value() {
		return $this->getUrl()->get($this->getField(), $this->default);
	}

	public function setField($field) {
		$this->field = "filter_".$field;
        return $this;
	}

	public function getField() {
		return $this->field;
	}

    public function setUrl($url) {
        $this->url = $url;
        return $this;
    }

    public function getUrl() {
        return $this->url;
    }

} 