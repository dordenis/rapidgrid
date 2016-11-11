<table class="table table-striped table-condensed">
    <thead>
    <tr>
        @foreach($grid->getColumns() as $column)
            <th>
            @foreach($column->getHeaders() as $header)
                @include("header.".$header->getTemplate(), ['header' => $header])
            @endforeach
            </th>
        @endforeach
    </tr>
    </thead>

    <tbody>
        @foreach($grid->getRows() as $row)
            <tr>
            @foreach($grid->getColumns() as $column)
                <td>@include("cell.".$column->getTemplate(), ["row" => $row])</td>
            @endforeach
            </tr>
        @endforeach
    </tbody>
</table>

<div>
    <?php $paginate = $grid->getPaginate() ?>
    @include($paginate->getTemplate())
</div>

<script>
    $('.filter-popover').popover({
        html: true,
        placement: "bottom",
        content: function () {
            return $(this).next('.filter-popover-content').html()
        }
    });
</script>
