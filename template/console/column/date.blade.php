<?php $text = $column->getDate($row)." ".$column->getTime($row) ?>
{{ str_pad($text, strlen($text) - mb_strlen($text) + 20) }}