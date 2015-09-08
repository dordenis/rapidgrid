<?php

namespace AjaxBlog\RapidGrid\Filter;

class Equal extends FilterAbstract {

	public $template = 'search';

	/**
	 * @param $criteria \AjaxBlog\RapidGrid\Criteria
	 * @return mixed
	 */
	public function criteria($criteria) {
		if ($this->valid()) {
			$criteria->equal($this->getField(), $this->value());
		}

		return $criteria;
	}

	protected function valid() {
		return ! is_null($this->value());
	}

} 
