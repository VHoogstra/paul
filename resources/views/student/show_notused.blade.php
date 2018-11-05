@extends('layouts.master') @section('content')

<div class="card-header">
    <i class="fa fa-table"></i>
    sdfhhsdfh
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
                                <th rowspan="1" colspan="1">betaald</th>
                                <th rowspan="1" colspan="1">binnen</th>
                                <th rowspan="1" colspan="1">speciaal</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                               <th rowspan="1" colspan="1">naam</th>
                                <th rowspan="1" colspan="1">betaald</th>
                                <th rowspan="1" colspan="1">binnen</th>
                                <th rowspan="1" colspan="1">speciaal</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script>
    $(document).ready(function() {
        var table = $('#datatable').DataTable();
    });

</script>
@endsection
