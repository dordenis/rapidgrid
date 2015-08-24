<?php

namespace AjaxBlog\RapidGrid\Filter;

use AjaxBlog\RapidGrid\Paginate;

class Search extends FilterAbstract {

	public $template = 'filter.search';

	final public function isNotResetStat() {
		return $this->valid();
	}

	/**
	 * @param $criteria \CDbCriteria
	 * @return mixed
	 */
	public function criteria($criteria) {
		if ($this->valid()) {
			$criteria->match($this->getField(), $this->value());
		}

		return $criteria;
	}

	protected function valid() {
		return ! is_null($this->value());
	}

	public function urlReset() {
        $this->getUrl()->clear($this->getField());
        return $this->getUrl()->build();
    }

    public function urlSearch() {
        $this->getUrl()->clear(Paginate::NAME);
        $this->getUrl()->group($this->getField(), 'VALUE');
        return $this->getUrl()->build();
    }

} 