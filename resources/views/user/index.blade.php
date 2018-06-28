@extends('layouts.master') @section('content')

    <div class="h4">
        <i class="fa fa-table"></i>
    </div>
    <hr>
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
            <th rowspan="1" colspan="1">naam</th>
            <th rowspan="1" colspan="1">email</th>
            <th rowspan="1" colspan="1">role</th>
        </tr>
        </tfoot>
        <tbody>
        @foreach ($users as $users)
            <tr>
                <td><a class='btn btn-secondary' href='{{ route('user.edit',['id' => $users->id])}}'><i class="fa fa-plus" aria-hidden="true"></i></a></td>
                <td>{{ $users->name}}</td>
                <td>{{ $users->email}}</td>
                <td>{{ $users->role}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function() {
            // Setup - add a text input to each footer cell


            // DataTable
            var table = $('.dataTable').DataTable({
                "columnDefs": [{
                    "orderable": false,
                    "targets": 0
                }],
                "order": [1, 'asc']
            });

            // Apply the search

        });

    </script>
@endsection
