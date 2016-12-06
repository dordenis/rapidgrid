<table class="table table-striped table-condensed">
    <thead>
    <tr>
        @foreach($grid->getColumns() as $column)
            <th>@include("head.".$column->getTemplate())</th>
        @endforeach
    </tr>
    </thead>
    <tbody>
    @foreach($grid->rows() as $row)
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
    $(document).ready(function () {
        var el = $('.filter-popover').popover({
            html: true,
            placement: "bottom",
            content: function () {
                return $(this).next('.filter-popover-content').html()
            }
        });
    });
</script>