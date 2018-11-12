@extends('layouts.master') @section('content')

    <div class="h4">
        <i class="fa fa-table"></i> @if(!$activeParty) feest active not set @else feest {{$activeParty->name}}
        (active) @endif
    </div>
    <div class="form-inline">
        <div class="form-group mx-sm-3 mb-2">
            <input type="txt" class="form-control" id='search_input' placeholder="Zoeken">
        </div>
        <button id='search_go_button' type="submit" class="btn btn-primary mb-2">Zoeken</button>
    </div>

    <table class="table dataTable" cellspacing="0" width="100%">
        <thead>
        <tr role="row">
            <th rowspan="1" colspan="1">show</th>
            <th rowspan="1" colspan="1">student nummer</th>
            <th rowspan="1" colspan="1">naam</th>
            <th rowspan="1" colspan="1">klas</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th rowspan="1" colspan="1">show</th>
            <th rowspan="1" colspan="1">student nummer</th>
            <th rowspan="1" colspan="1">naam</th>
            <th rowspan="1" colspan="1">klas</th>
        </tr>
        </tfoot>
        <tbody>
        <tr>
            <td></td>
            <td></td>
            <td></td>
            <td></td>
        </tr>
        </tbody>
    </table>

    <script>
        $(document).ready(function () {
            // Setup - add a text input to each footer cell

            // DataTable
            var table = $('.dataTable').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": 0
                }],
                "order": [1, 'asc']
            });
            $('#search_input').change(function () {
                search(table);
            }).keyup(function (e) {
                if (e.keyCode === 13) {
                    search(table);
                }
            });
            $('#search_go_button').click(function () {
                search(table);
            });
        });

        function search(table) {
            test = $('#search_input').val();
            if (test == null) {
                return
            }
            $.ajax({
                url: "/registering/find/" + test,
                context: document.body
            }).done(function (data) {
                table
                    .clear();
                for (let i = 0; i < data.length; i++) {
                    table.row.add([
                        "<a class='btn btn-secondary' href='/registering/get/" + data[i].id + "'><i class='fa fa-plus' aria-hidden='true'></i></a>",
                        data[i].stamnr,
                        data[i].first_name + ' ' + data[i].middle_name + ' ' + data[i].last_name,
                        data[i].class,
                    ])
                }
                table.draw(false);
            });
        }
    </script>
@endsection
