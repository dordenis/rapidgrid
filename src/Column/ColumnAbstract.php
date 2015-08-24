<?php

namespace AjaxBlog\RapidGrid\Column;


use AjaxBlog\RapidGrid\Filter\FilterAbstract;
use AjaxBlog\RapidGrid\Url;

abstract class ColumnAbstract {

    protected $templateHead = "header";
	protected $templateCell = "column";

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
        if($this->url) {
            $filter->setUrl($this->getUrl());
        }
        $filter->setField($this->field);
		$this->filter = $filter;
		return $this;
	}

    public function getFilter() {
        return $this->filter;
    }

    public function setUrl($url) {
        if($this->getFilter()) {
            $this->getFilter()->setUrl($url);
        }
        $this->url = $url;
        return $this;
    }

    public function getUrl() {
        return $this->url;
    }

    public function getTemplateHead() {
        return $this->templateHead;
    }

    public function getTemplateCell() {
        return $this->templateCell;
    }

	abstract protected function contentHeaderCell();
	abstract protected function contentBodyCell($model);
    abstract public function criteria($criteria);

} 