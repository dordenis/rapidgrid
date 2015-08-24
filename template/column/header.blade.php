<?php $filter = $column->getFilter() ?>

{{ $column->renderHeaderCell() }}
@if($filter)
<i class="th-filter fa fa-filter filter-popover pull-right @if($filter->isNotResetStat()) filter-active @else filter-passive @endif"></i>
<div class='filter-popover-content hide'>
    <div>@include($filter->template, ['filter' => $filter])</div>
</div>
@endif