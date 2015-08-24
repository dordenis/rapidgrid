<?php
/**
 * @var $filter \AjaxBlog\RapidGrid\Filter\Search
 */
?>

<form action="{{ $filter->urlSearch() }}" id="{{ $filter->getField() }}" method="get">
    <div class="row">
        <div class="col-xs-10">
            <div class="input-group input-group-sm">
                <input type="text" class="form-control" value="{{ $filter->value() }}">
                <span class="input-group-btn">
                  <button class="btn btn-xs btn-info btn-flat fa fa-search" type="submit"></button>
                </span>
            </div>
        </div>
        <div class="col-xs-2 no-padding">
            <div class="input-group input-group-sm">
                <span class="input-group-btn">
                    <a class="btn btn-danger btn-flat fa fa-eraser" href="{{ $filter->urlReset() }}"></a>
                </span>
            </div>
        </div>
    </div>
</form>
<script>
    $('#{{ $filter->getField() }}').submit(function() {
        var val = $(this).find('input').val();
        var href = $(this).attr('action').replace('VALUE', val);
        document.location.href = href;
        return false;
    })
</script>