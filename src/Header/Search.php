<?php

namespace AjaxBlog\RapidGrid\Header;

class Search extends Filter  {

	protected $template = 'search';

    public function __construct($field)
    {
        $this->field = $field;
    }

	/**
	 * @param $criteria \AjaxBlog\RapidGrid\Criteria
	 * @return mixed
	 */
	public function criteria(&$criteria) {
		if ($this->valid()) {
			$criteria->match($this->field, $this->getValue());
		}
	}

	protected function valid() {
		return ! is_null($this->getValue());
	}

} 
