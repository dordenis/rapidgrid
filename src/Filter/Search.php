<?php

namespace AjaxBlog\RapidGrid\Filter;

class Search extends FilterAbstract {

	public $template = 'search';

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

} 