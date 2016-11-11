<i class="th-filter fa fa-filter filter-popover pull-right @if($header->isActive()) filter-active @else filter-passive @endif"></i>
<div class='filter-popover-content hide'>
    <form action="{{ $header->urlFilter("VALUE") }}" id="{{ $header->getField() }}" method="get" class="form-inline">
        <div class="form-group">
            <div class="input-group input-group-sm">
                <input type="text" class="form-control" value="{{ $header->getValue() }}" name="{{ $header->getField() }}" style="height: 22px; padding: 1px 5px;">
                <span class="input-group-btn btn-group-xs">
              <button class="btn btn-info btn-flat fa fa-search" type="submit" style="height: 22px; padding: 1px 5px;"></button>
            </span>
            </div>
            <div class="input-group btn-group-xs">
                <a class="btn btn-danger btn-flat fa fa-eraser" href="{{ $header->urlReset() }}"></a>
            </div>
        </div>
    </form>
    <script>
        $('#{{ $header->getField() }}').submit(function() {
            var val = $(this).find('input').val();
            var href = $(this).attr('action').replace('VALUE', val);
            document.location.href = href;
            return false;
        })
    </script>
</div>