<?php

namespace AjaxBlog\RapidGrid\Filter;

use AjaxBlog\RapidGrid\Criteria;
use AjaxBlog\RapidGrid\Paginate;
use AjaxBlog\RapidGrid\Url;

abstract class FilterAbstract {

	/**
	 * @var $url Url
	 */
	private $url;

	protected $field;
	protected $template;

	/**
	 * @return mixed
	 */
	public function getTemplate()
	{
		return $this->template;
	}

    protected $default = null;

	/**
	 * @param $criteria Criteria
	 * @return mixed
	 */
	abstract public function criteria($criteria);

    abstract protected function valid();

    static public function factory() {
        return new static();
    }

    public function __construct() {
        $this->url = new Url();
    }

	public function value() {
		return $this->getUrl()->get($this->getField(), $this->default);
	}

	public function setField($field) {
		$this->field = "filter_".$field;
        return $this;
	}

	public function getField() {
		return $this->field;
	}

    public function getUrl() {
        return clone $this->url;
    }

    public function setUrl($url) {
        $this->url = $url;
    }

	public function urlReset() {
        $url = $this->getUrl()->clear(Paginate::NAME)->clear($this->getField());
		return $url->build();
	}

	public function urlFilter($value=null) {
        $url = $this->getUrl()->clear(Paginate::NAME)->group($this->getField(), $value);
		return $url->build();
	}

    public function isActive() {
        return $this->valid();
    }

} 