<?php


namespace AjaxBlog\RapidGrid\Column\Sort;

use AjaxBlog\RapidGrid\Column\Sort;

class Price extends Sort {

	private $currency = ' руб.';
	private $decimals = 0;

	public function setCurrency($currency) {
		$this->currency = $currency;
	}

	public function setDecimals($decimals) {
		$this->decimals = $decimals;
	}

	protected function contentBodyCell($model) {
		$price = $model[$this->field];
		return number_format($price, $this->decimals, ',', ' ').$this->currency;
	}

} 