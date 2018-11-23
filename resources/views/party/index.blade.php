@extends('layouts.master') @section('content')

    <div class="h4">
        <i class="fa fa-table"></i> @if(!$partyActive)
            Feest active not set
        @else
            Feest {{$partyActive->name}} (active)
        @endif
        <button class="btn btn-outline-success" onclick="window.location.href='{{route("party.create")}}'">Nieuw feest
        </button>

    </div>
    <hr>

    <div class="form-row">
        <div class="form-group" style="padding:2px;margin-bottom:0px;">
            <select class="form-control" id="actionValue">
                <option value="0">Actie</option>
                <option value="delete">Verwijderen</option>
                <option value="archive">Archiveren</option>
                <option value="activate">Activeren</option>
            </select>
        </div>
        <div class="form-group" style="padding:2px;margin-bottom:0px;">
            <input id='actionButton' type="button" class="form-control" id="inputPassword4" value="Toepassen">
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
                    <td><input type="checkbox" name="parties[]" id="party_{{$party->id}}"
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
        $('#actionButton').click(function () {
            var value = $("[name='parties[]']:checked");
            var actie = $("#actionValue").val();
            if (actie == 0) {
                console.log('no role selected');
                return
            }
            if (value.length == 0) {
                console.log('no user selected');
                return
            }
            usersId = [];
            for (let i = 0; i < value.length; i++) {
                usersId[i] = (value[i].value);
            }
            if (actie == 'delete') {
                $.ajax({
                    url: "{{ route('party.destroy',['id' => 0])}}",
                    dataType: 'json',
                    type: 'DELETE',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        'actie': actie,
                        'users': usersId
                    },
                    success: function (data) {
                        for (let i = 0; i < value.length; i++) {
                            $('#party_' + value[i].value).closest('tr').fadeOut(500, function () {
                                $(this).remove();
                            });
                        }
                    },
                    error: function (jqhr, textstatus, errorthrow) {
                        console.log(JSON.stringify(jqhr));
                        console.log('ajax error ' + textstatus + ' ' + errorthrow);
                    }
                });
                return;
            }
            if (actie == 'archive') {
                $.ajax({
                    url: "{{ route('party.archive',['id' => 0])}}",
                    dataType: 'json',
                    type: 'get',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        'actie': actie,
                        'users': usersId
                    },
                    success: function (data) {
                        for (let i = 0; i < value.length; i++) {
                            $('#party_' + value[i].value).closest('tr').fadeOut(500, function () {
                                $(this).remove();
                            });
                        }
                    },
                    error: function (jqhr, textstatus, errorthrow) {
                        console.log(JSON.stringify(jqhr));
                        console.log('ajax error ' + textstatus + ' ' + errorthrow);
                    }
                });
                return;

            }
            if (actie == 'activate' && value.length == 1) {
                id = value[0].value;
                $.ajax({
                    url: "/party/active/"+id,
                    dataType: 'json',
                    type: 'get',
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    data: {
                        'actie': actie,
                        'users': usersId
                    },
                    success: function (data) {
                        location.reload();
                    },
                    error: function (jqhr, textstatus, errorthrow) {
                        console.log(JSON.stringify(jqhr));
                        console.log('ajax error ' + textstatus + ' ' + errorthrow);
                    }
                });
                return;

            }

        });
        $('#rolChangeButton').click(function () {
            var value = $("[name='users[]']:checked");
            var role = $("#rolChangeValue").val();
            if (role == 0) {
                console.log('no role selected');
                return
            }
            if (value.length == 0) {
                console.log('no user selected');
                return
            }

            usersId = [];
            for (let i = 0; i < value.length; i++) {
                usersId[i] = (value[i].value);
            }
            $.ajax({
                url: "{{ route('user.update',['id' => 0])}}",
                data: {
                    'role': role,
                    'users': usersId
                },
                type: 'PUT',
                dataType: 'json',
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                },
                success: function (data) {
                    console.log(data);
                    //location.reload();
                },
                error: function (data) {
                    console.log(data);
                }
            });
        });

        $('#cb-select-all-1').click(function () {
            console.log($("[name='users[]']").is(':checked'));
            $("[name='users[]']").prop('checked', $("#cb-select-all-1").is(':checked'));
            $("#cb-select-all-2").prop('checked', $("#cb-select-all-1").is(':checked'));
        });
        $('#cb-select-all-2').click(function () {
            console.log($("[name='users[]']").is(':checked'));
            $("[name='users[]']").prop('checked', $("#cb-select-all-2").is(':checked'));
            $("#cb-select-all-1").prop('checked', $("#cb-select-all-2").is(':checked'));
        });
        $("[name='users[]']").click(function () {
            console.log($(this).is(':checked'));
            if (!$(this).is(':checked')) {
                $("#cb-select-all-1").prop('checked', false);
                $("#cb-select-all-2").prop('checked', false);
            }
        });
        // $(document).ready(function () {
        //     var table = $('#datatable').DataTable();
        // });

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
