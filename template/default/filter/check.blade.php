<?php
/**
 * @var $filter \AjaxBlog\RapidGrid\Filter\RadioList
 */
?>

<ul class="list-unstyled">
    <li><i class="fa @if($filter->isActive()) fa-square-o @else fa-check-square-o @endif"></i> <a href="{{ $filter->urlReset() }}">all</a></li>
@foreach($filter->getList() as $item)
    <li><i class="fa @if($item->is_active) fa-check-square-o @else fa-square-o @endif"></i> <a href="{{ $item->url }}">{{ $item->title }}</a></li>
@endforeach
</ul>
