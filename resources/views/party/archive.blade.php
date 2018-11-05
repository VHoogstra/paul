@extends('layouts.master') @section('content')

    <div class="card-header">
        <i class="fa fa-table"></i> @if(!$partyActive)
            Feest active not set
        @else
            Feest {{$partyActive->name}} (active)

        @endif</div>
    <div class="card-body">
        <div class="table-responsive">
            <div id="dataTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4">
                <div class="row">
                    <div class="col-sm-12">
                        <table class="table table-bordered dataTable" id="datatable" width="100%" cellspacing="0"
                               role="grid" aria-describedby="dataTable_info" style="width: 100%;">
                            <thead>
                            <tr role="row">
                                <th rowspan="1" colspan="1">naam</th>
                                <th rowspan="1" colspan="1">prijs</th>
                                <th rowspan="1" colspan="1">datum</th>
                                <th rowspan="1" colspan="1">option</th>
                            </tr>
                            </thead>
                            <tfoot>
                            <tr>
                                <th rowspan="1" colspan="1">naam</th>
                                <th rowspan="1" colspan="1">prijs</th>
                                <th rowspan="1" colspan="1">datum</th>
                                <th rowspan="1" colspan="1">option</th>
                            </tr>
                            </tfoot>
                            <tbody>
                            @foreach($partys as $party)
                                @if($party->active==1)
                                    <tr style='background-color:#00800042'>
                                @else
                                    <tr>
                                        @endif
                                        <td>{{$party->name}}</td>
                                        <td>{{$party->price}}</td>
                                        <td>{{$party->start_date}}</td>

                                        <td>
                                            <div class="btn-group">
                                                <form action="{{route("party.destroy", ['id' =>$party->id])}}"
                                                      method="POST" class="btn-group">
                                                    <button type="button" class="btn btn-danger">
                                                        <i class="fa fa-trash-o"></i> Remove
                                                    </button>

                                                    @CSRF
                                                    @method('DELETE')
                                                </form>
                                                <a class="btn btn-primary"
                                                   href="{{route("party.edit", ['id' =>$party->id])}}">
                                                    <i class="fa fa-pencil"></i> Edit
                                                </a>

                                                <a class="btn btn-info"
                                                   href="{{route("party.dearchive", ['id' =>$party->id])}}">
                                                    <i class="fa fa-archive "></i> Dearchive
                                                </a>
                                            </div>
                                        </td>
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
        $(document).ready(function () {
            var table = $('#datatable').DataTable();
        });

    </script>
@endsection
