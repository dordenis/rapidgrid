<?php
/**
 * @var $filter \AjaxBlog\RapidGrid\Filter\RadioList
 */
?>

<select class="list-unstyled" id="{{ $filter->getField() }}">
    <option @if($filter->isActive()) selected @endif  value="{{ $filter->urlReset() }}">all</option>
@foreach($filter->getList() as $item)
    <option @if($item->is_active) selected @endif value="{{ $item->url }}">{{ $item->title }}</option>
@endforeach
</select>
<script>
    $("#{{ $filter->getField() }}").on("change", function() {
        document.location.href = $(this).val();
    })
</script>