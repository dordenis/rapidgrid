@if($paginate->getTotal() > 1)
<?php $min = max($paginate->getCurrentPage() - 4, 1) ?>
<?php $max = min($paginate->getCurrentPage() + 5, $paginate->getTotal()) ?>
@if($min > 1) ... @endif @for($i=$min; $i<$max; $i++) @if($i == $paginate->getCurrentPage())[{{ $i }}]@else{{ $i }}@endif @endfor @if($max < $paginate->getTotal()) ... @endif
@endif