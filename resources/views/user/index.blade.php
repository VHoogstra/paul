@extends('layouts.master') @section('content')

    <div class='h4'>
        <i class='fa fa-users fa-lg'></i> Gebruikers <a href="{{route('user.create')}}" class='btn btn-outline-success'>Nieuwe Gebruiker</a>

    </div>
    <hr>

    <div class='form-row'>
        <div class='form-group' style='padding:2px;margin-bottom:0px;'>
            <select class='form-control' id='rolActionValue'>
                <option value='0'>Actie</option>
                <option value='1'>Verwijderen</option>
            </select>
        </div>
        <div class='form-group' style='padding:2px;margin-bottom:0px;'>
            <input id='actionButton' type='button' class='form-control' id='inputPassword4' value='Toepassen'>
        </div>
        <div class='form-group' style='padding:2px; padding-left:20px;margin-bottom:0px;'>
            <select class='form-control' id='rolChangeValue'>
                <option value='0'>Rol wijzigen naar...</option>
                @foreach ($userRoles as $role)
                    <option value='{{$role->id}}'>{{$role->name}}</option>
                @endforeach
            </select>
        </div>
        <div class='form-group' style='padding:2px;margin-bottom:0px;'>
            <input type='button' class='form-control' id='rolChangeButton' value='Bijwerken'>
        </div>
    </div>

    <table class='table' cellspacing='0' width='100%'>
        <thead class='thead-dark'>
        <tr role='row'>
            <th rowspan='1' colspan='1'><input id='cb-select-all-1' type='checkbox'></th>
            <th rowspan='1' colspan='1'>Naam</th>
            <th rowspan='1' colspan='1'>E-mail</th>
            <th rowspan='1' colspan='1'>Rol</th>
        </tr>
        </thead>
        <tfoot class='thead-dark'>
        <tr>
            <th rowspan='1' colspan='1'><input id='cb-select-all-2' type='checkbox'></th>
            <th rowspan='1' colspan='1'>Naam</th>
            <th rowspan='1' colspan='1'>E-mail</th>
            <th rowspan='1' colspan='1'>Rol</th>
        </tr>
        </tfoot>
        <tbody>
        @foreach ($users as $user)
            <tr id="user_{{$user->id}}">
                <td><input type='checkbox' name='users[]' id='user_{{$user->id}}' class='administrator'
                           value='{{$user->id}}'></td>
                <td><a class='' href='{{ route('user.edit',['id' => $user->id])}}'><strong>{{ $user->name}}</strong></a>
                </td>
                <td>{{ $user->email}}</td>
                <td>{{ $user->userRole->name}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function () {

        });
        $('#actionButton').click(function () {
            var value = $("[name='users[]']:checked");
            var actie = $("#rolActionValue").val();
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
            if (actie == 1) {
                $.ajax({
                    url: "{{ route('user.destroy',['id' => 6])}}",
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
                            $('#user_' + value[i].value).closest('tr').fadeOut(500, function () {
                                $(this).remove();
                            });
                        }
                    },
                    error: function (jqhr, textstatus, errorthrow) {
                        console.log(JSON.stringify(jqhr));
                        console.log('ajax error ' + textstatus + ' ' + errorthrow);
                    }
                });
            }
            // console.log('id is ' + value[0].id + ' val is ' + value[0].value);
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
                    location.reload();
                },
                error: function(data){
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
           if(!$(this).is(':checked')){
               $("#cb-select-all-1").prop('checked', false);
               $("#cb-select-all-2").prop('checked', false);
           }
        });

    </script>
@endsection
