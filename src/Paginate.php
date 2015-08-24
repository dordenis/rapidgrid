<?php

namespace AjaxBlog\RapidGrid;


class Paginate {

    protected $template = "paginate";

	private $total = 0;
	private $limit = 20;
    private $current = 1;

	/**
	 * @var $url Url
	 */
	public $url;

	const NAME = "page";

    public function __construct($prefix = null) {
        $this->url = new Url($prefix);
        $this->current = $this->url->get(self::NAME, 1);
    }

	/**
	 * @param $criteria Criteria
	 * @return array
	 */
	public function criteria($criteria) {
		$criteria->offset($this->limit * ($this->getCurrentPage() - 1));
		$criteria->limit($this->limit);
		return  $criteria;
	}

	public function getCurrentPage() {
		return $this->current;
	}

	public function getUrl($page) {
		$this->url->group(self::NAME, $page);
		return $this->url->build();
	}

	public function getTotal() {
		return $this->total;
	}

	public function setTotal($records) {
		$this->total = ceil($records/$this->getLimit());
	}

	public function getLimit() {
		return $this->limit;
	}

	public function setLimit($limit) {
		$this->limit = $limit;
	}

	public function getTemplate() {
		return $this->template;
	}

} 