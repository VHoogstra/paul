@extends('layouts.master') @section('content')

    <div class="h4">
        <i class="fa fa-table"></i> @if(!$partyActive)
            Feest active not set
            <button class="btn" onclick="window.location.href='{{route("party.create")}}'">Nieuw feest</button>
        @else
            Feest {{$partyActive->name}} (active)
            <button class="btn" onclick="window.location.href='{{route("party.create")}}'">Nieuw feest</button>
        @endif
    </div>
    <hr>

    <div class="form-row">
        <div class="form-group" style="padding:2px;margin-bottom:0px;">
            <select class="form-control">
                <option>Actie</option>
                <option value="remove">Verwijderen</option>
                <option value="archive">Archiveren</option>
                <option value="activate">Activeren</option>
            </select>
        </div>
        <div class="form-group" style="padding:2px;margin-bottom:0px;">
            <input id='button1' type="button" class="form-control" id="inputPassword4" value="Toepassen">
        </div>

    </div>
    <table class="table table-bordered" width="100%" cellspacing="0"
           role="grid" aria-describedby="dataTable_info" style="width: 100%;">
        <thead>
        <tr role="row">
            <th rowspan="1" colspan="1"><input id="cb-select-all-1" type="checkbox"></th>
            <th rowspan="1" colspan="1">naam</th>
            <th rowspan="1" colspan="1">prijs</th>
            <th rowspan="1" colspan="1">datum</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th rowspan="1" colspan="1"><input id="cb-select-all-1" type="checkbox"></th>
            <th rowspan="1" colspan="1">naam</th>
            <th rowspan="1" colspan="1">prijs</th>
            <th rowspan="1" colspan="1">datum</th>
        </tr>
        </tfoot>
        <tbody>
        @foreach($partys as $party)
            @if($party->active==1)
                <tr style='background-color:#00800042'>
            @else
                <tr>
                    @endif
                    <td><input type="checkbox" name="users[]" id="user_{{$party->id}}" class="administrator"
                               value="{{$party->id}}"></td>
                    <td><a class=''
                           href='{{ route('party.edit',['id' => $party->id])}}'><strong>{{ $party->name}}</strong></a>
                    </td>
                    {{--                                    <td>{{$party->name}}</td>--}}
                    <td>{{$party->price}}</td>
                    <td>{{$party->start_date}}</td>
                </tr>
                @endforeach
        </tbody>
    </table>


    <script>
        // $(document).ready(function () {
        //     var table = $('#datatable').DataTable();
        // });
        //href="{{route("party.archive", ['id' =>$party->id])}}">
        // href="{{route("party.active", ['id' =>$party->id])}}">
        //ction="{{route("party.destroy", ['id' =>$party->id])}}"
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
