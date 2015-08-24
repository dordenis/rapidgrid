<?php

namespace AjaxBlog\RapidGrid\Column\Sort;

use AjaxBlog\RapidGrid\Column\Sort;

class Date extends Sort {

    public $template = "column.date";

    public function getDate($row, $format="d.m.Y") {
        $date = $this->date($row);
        return $date->format($format);
    }

    public function getTime($row, $format="H:i") {
        $date = $this->date($row);
        return $date->format($format);
    }

	private function date($row) {
		$date = $row[$this->field];
		if (empty($date)) {
			return;
		}

		if (is_string($date)) {
			$date = new \DateTime($date);
		}

        return $date;
	}

} 