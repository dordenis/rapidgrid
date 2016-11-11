<div class="pull-right th-sort">
@foreach([
        'asc' => 'fa fa-sort-asc',
        'desc' => 'fa fa-sort-desc'
    ] as $sort => $icon)
    <?php $url = $header->getUrl($sort) ?>
    @if($url)
        <a href="{!! $url !!}" class="{{ $icon }}"></a>
    @else
        <i class="{{ $icon }}"></i>
     @endif
@endforeach
</div>