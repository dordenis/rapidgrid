<?php

namespace AjaxBlog\RapidGrid\Header;

class Equal extends Filter {

	public $template = 'search';

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
			$criteria->equal($this->field, $this->getValue());
		}
	}

	protected function valid() {
		return ! is_null($this->getValue());
	}

} 
