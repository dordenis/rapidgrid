<i class="th-filter fa fa-filter filter-popover pull-right @if($header->isActive()) filter-active @else filter-passive @endif"></i>
<div class='filter-popover-content hide'>
    <select class="list-unstyled" id="{{ $header->getField() }}">
        <option @if($header->isActive()) selected @endif  value="{{ $header->urlReset() }}">all</option>
    @foreach($header->getList() as $item)
        <option @if($item->is_active) selected @endif value="{{ $item->url }}">{{ $item->title }}</option>
    @endforeach
    </select>
    <script>
        $("#{{ $header->getField() }}").on("change", function() {
            document.location.href = $(this).val();
        })
    </script>
</div>
