@extends('layouts.master') @section('content')

<div class="h4">
    <i class="fa fa-table"></i> @if(!$activeParty) feest active not set @else feest {{$activeParty->name}} (active) @endif
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
            <th rowspan="1" colspan="1">student nummer</th>
            <th rowspan="1" colspan="1">naam</th>
            <th rowspan="1" colspan="1">klas</th>
        </tr>
    </tfoot>
    <tbody>
        @foreach ($students as $student)
        <tr>
            <td><a class='btn btn-secondary' href='{{ route('registering.edit',['id' => $student->id])}}'><i class="fa fa-plus" aria-hidden="true"></i></a></td>
            <td>{{ $student->stamnr}}</td>
            <td>{{ $student->first_name}} {{ $student->middle_name}} {{ $student->last_name}}</td>
            <td>{{ $student->class}}</td>
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
