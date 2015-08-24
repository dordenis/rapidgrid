<?php $text = $column->renderBodyCell($row) ?>
{{ str_pad($text, strlen($text) - mb_strlen($text) + 20) }}