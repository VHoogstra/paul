@extends('layouts.master') @section('content')

<div class="card-header">
    <i class="fa fa-table"></i> 
    @if(!$activeParty)
        feest active not set
    @else
        feest {{$activeParty->name}} (active)
    @endif
    
</div>
<div class="card-body">
    <div class="table-responsive">
        <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered dataTable" id="datatable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th rowspan="1" colspan="1">show</th>
                                <th rowspan="1" colspan="1">student nummer</th>
                                <th rowspan="1" colspan="1">naam</th>
                                <th rowspan="1" colspan="1">klas</th>
                                <th rowspan="1" colspan="1">geboorteDatum</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">show</th>
                                <th rowspan="1" colspan="1">student nummer</th>
                                <th rowspan="1" colspan="1">naam</th>
                                <th rowspan="1" colspan="1">klas</th>
                                <th rowspan="1" colspan="1">geboorteDatum</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($students as $student)
                            <tr>
                                <td><a class='btn btn-secondary' href='signIn/{{ $student->id}}'><i class="fa fa-plus" aria-hidden="true"></i></a></td>
                                <td>{{ $student->stamnr}}</td>
                                <td>{{ $student->first_name}} {{ $student->middle_name}} {{ $student->last_name}}</td>
                                <td>{{ $student->class}}</td>
                                <td>{{ $student->birth_date}}</td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        // Setup - add a text input to each footer cell


        // DataTable
        var table = $('#datatable').DataTable();

        // Apply the search

    });

</script>
@endsection
