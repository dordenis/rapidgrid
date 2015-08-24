<?php $text = $column->renderHeaderCell() ?>
{{ str_pad($text, strlen($text) - mb_strlen($text) + 20) }}