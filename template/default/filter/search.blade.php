<?php
/**
 * @var $filter \AjaxBlog\RapidGrid\Filter\Search
 */
?>

<form action="{{ $filter->urlFilter($filter->value()) }}" id="{{ $filter->getField() }}" method="get" class="form-inline">
    <div class="form-group">
        <div class="input-group input-group-sm">
            <input type="text" class="form-control" value="{{ $filter->value() }}" name="{{ $filter->getField() }}" style="height: 22px; padding: 1px 5px;">
            <span class="input-group-btn btn-group-xs">
              <button class="btn btn-info btn-flat fa fa-search" type="submit" style="height: 22px; padding: 1px 5px;"></button>
            </span>
        </div>
        <div class="input-group btn-group-xs">
            <a class="btn btn-danger btn-flat fa fa-eraser" href="{{ $filter->urlReset() }}"></a>
        </div>
    </div>
</form>