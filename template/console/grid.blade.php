{{ "\e[1;32m" }}@foreach($grid->getColumns() as $column) @include("head.".$column->getTemplate()) @endforeach {{ "" }}
{{ "\e[0;37m" }}
@foreach($grid->rows() as $row)
@foreach($grid->getColumns() as $column) @include("cell.".$column->getTemplate(), ["row" => $row])@endforeach {{ "" }}
@endforeach

{{ "\e[0m" }}<?php $paginate = $grid->getPaginate() ?>@include($paginate->getTemplate())
{{ "\e[0m\n" }}