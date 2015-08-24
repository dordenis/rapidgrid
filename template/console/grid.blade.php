{{ "\e[1;32m" }}@foreach($grid->getColumns() as $column) @include($column->getTemplateHead()) @endforeach {{ "" }}
{{ "\e[0;37m" }}
@foreach($grid->rows() as $row)
@foreach($grid->getColumns() as $column) @include($column->getTemplateCell(), ["row" => $row])@endforeach {{ "" }}
@endforeach

{{ "\e[0m" }}<?php $paginate = $grid->getPaginate() ?>@include($paginate->getTemplate())
{{ "\e[0m\n" }}