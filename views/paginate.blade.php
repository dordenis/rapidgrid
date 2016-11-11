@if($paginate->getTotal() > 1)

    <ul class="pagination pagination-sm no-margin pull-right">
        @if($paginate->getCurrentPage() == 1)
            <li class="disabled"><a href="#">«</a></li>
        @else
            <li><a href="{{ $paginate->getUrl($paginate->getCurrentPage() - 1) }}">«</a></li>
        @endif

        <?php $min = max($paginate->getCurrentPage() - 4, 1) ?>
        <?php $max = min($paginate->getCurrentPage() + 5, $paginate->getTotal()) ?>


        @if($min > 1)
            <li class="disabled"><a href="#">...</a></li>
        @endif

        @for($i=$min; $i<=$max; $i++)
            @if($i == $paginate->getCurrentPage())
                <li class="active"><a href="{{ $paginate->getUrl($i) }}">{{ $i }}</a></li>
            @else
                <li><a href="{{ $paginate->getUrl($i) }}">{{ $i }}</a></li>
            @endif
        @endfor

        @if($max < $paginate->getTotal())
            <li class="disabled"><a href="#">...</a></li>
        @endif

        @if($paginate->getCurrentPage() == $paginate->getTotal())
            <li class="disabled"><a href="#">»</a></li>
        @else
            <li><a href="{{ $paginate->getUrl($paginate->getCurrentPage() + 1) }}">»</a></li>
        @endif
    </ul>

@endif