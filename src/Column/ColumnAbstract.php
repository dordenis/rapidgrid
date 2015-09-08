<?php

namespace AjaxBlog\RapidGrid\Column;


use AjaxBlog\RapidGrid\Filter\FilterAbstract;
use AjaxBlog\RapidGrid\Url;

abstract class ColumnAbstract {

    protected $template = "column";

	/**
	 * @var Url
	 */
	private $url;

	protected $field;
	protected $label;
	protected $filter;

	final static public function factory($field=null, $label=null) {
		return new static($field, $label);
	}

	final public function __construct($field=null, $label=null) {
		$this->field = $field;
		$this->label = $label;
		$this->url = new Url();
	}

	final public function renderHeaderCell() {
		return $this->contentHeaderCell();
	}

	final public function renderBodyCell($model) {
		return $this->contentBodyCell($model);
	}

	/**
	 * @param $filter FilterAbstract
	 * @return $this
	 */
	public function setFilter($filter) {
        $filter->setField($this->field);
		$this->filter = $filter;
		return $this;
	}

    public function getFilter() {
        return $this->filter;
    }

    public function getUrl() {
        return clone $this->url;
    }

	public function setUrl($url) {
		$this->url = $url;
	}

    public function getTemplate() {
        return $this->template;
    }

	abstract protected function contentHeaderCell();
	abstract protected function contentBodyCell($model);
    abstract public function criteria($criteria);

} 