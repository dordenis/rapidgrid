<i class="th-filter fa fa-filter filter-popover pull-right @if($header->isActive()) filter-active @else filter-passive @endif"></i>
<div class='filter-popover-content hide'>
    <ul class="list-unstyled">
        <li><i class="fa @if($header->isActive()) fa-circle-o @else fa-dot-circle-o @endif"></i> <a href="{{ $header->urlReset() }}">all</a></li>
        @foreach($header->getList() as $item)
            <li><i class="fa @if($item->is_active) fa-dot-circle-o @else fa-circle-o @endif"></i> <a href="{{ $item->url }}">{{ $item->title }}</a></li>
        @endforeach
    </ul>
</div>