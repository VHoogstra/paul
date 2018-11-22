@extends('layouts.master') @section('content')

    <div class="h4">
        <i class="fas fa-hdd fa-lg"></i>
    </div>
    <hr>

    <table class="table table-bordered" id='datatable' width="100%" cellspacing="0"
           role="grid" aria-describedby="dataTable_info" style="width: 100%;">
        <thead>
        <tr role="row">
            <th rowspan="1" colspan="1">logged user</th>
            <th rowspan="1" colspan="1">category</th>
            <th rowspan="1" colspan="1">info</th>
            <th rowspan="1" colspan="1">var</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th rowspan="1" colspan="1">logged user</th>
            <th rowspan="1" colspan="1">category</th>
            <th rowspan="1" colspan="1">info</th>
            <th rowspan="1" colspan="1">var</th>
        </tr>
        </tfoot>
        <tbody>
        @foreach($log as $log)
            <tr>
            <td>{{$log->user_id}}</td>
            <td>
                {{$log->logCategory->name}}</td>
            <td>
                {{$log->info}}</td>
            <td>
                {{$log->var}}</td></tr>
        @endforeach
        </tbody>
    </table>


    <script>




        $(document).ready(function () {
            var table = $('#datatable').DataTable();
        });

        //and delete
        {{--<form action="{{route("party.destroy", ['id' =>$party->id])}}"--}}
        {{--method="POST" class="btn-group">--}}
        {{--<button type="submit" class="btn btn-danger">--}}
        {{--<i class="fa fa-trash-o"></i> Remove--}}
        {{--</button>--}}

        {{--@CSRF--}}
        {{--@method('DELETE')--}}
        {{--</form>--}}

    </script>
@endsection
