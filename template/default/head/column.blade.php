<?php $filter = $column->getFilter() ?>

{!! $column->renderHeaderCell() !!}
@if($filter)
<i class="fa fa-filter filter-popover pull-right @if($filter->isActive()) filter-active @else filter-passive @endif"></i>
<div class='filter-popover-content hide'>
    <div>@include("filter.".$filter->getTemplate(), ['filter' => $filter])</div>
</div>
@endif
