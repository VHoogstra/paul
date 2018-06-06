@extends('layouts.master') @section('content')

<div class="card-header">
    <i class="fa fa-table"></i>

</div>
<div class="card-body">
    <div class="table-responsive">
        <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
            <div class="row">
                <div class="col-sm-12">
                    <table class="table table-bordered dataTable" id="datatable" width="100%" cellspacing="0" role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                        <thead>
                            <tr role="row">
                                <th rowspan="1" colspan="1">naam</th>
                                <th rowspan="1" colspan="1">Datum</th>
                                <th rowspan="1" colspan="1">binnen</th>
                                <th rowspan="1" colspan="1">betaald</th>
                                <th rowspan="1" colspan="1">voorverkoop</th>
                                <th rowspan="1" colspan="1">speciaal</th>
                                <th rowspan="1" colspan="1">winst</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">naam</th>
                                <th rowspan="1" colspan="1">Datum</th>
                                <th rowspan="1" colspan="1">binnen</th>
                                <th rowspan="1" colspan="1">betaald</th>
                                <th rowspan="1" colspan="1">voorverkoop</th>
                                <th rowspan="1" colspan="1">speciaal</th>
                                <th rowspan="1" colspan="1">winst</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach($party as $party)
                            <?php
                                $date = date_create($party->start_date);
                                $date=  date_format($date, 'Y-m-d ');
                            ?>
                                <tr>
                                    <td>{{$party->name}}</td>
                                    <td>{{$date}}</td>
                                    <td>{{$party->inside}}</td>
                                    <td>{{$party->payed}}</td>
                                    <td>{{$party->special}}</td>
                                    <td>{{$party->presale}}</td>
                                    <td>{{$party->profit}}</td>
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
