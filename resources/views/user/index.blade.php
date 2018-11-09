@extends('layouts.master') @section('content')

    <div class="h4">
        <i class="fa fa-users fa-lg"></i> Gebruikers
    </div>


    <div class="form-row">
        <div class="form-group" style="padding:2px;margin-bottom:0px;">
            <select class="form-control">
                <option>Actie</option>
                <option value="verwijderen">Verwijderen</option>
            </select>
        </div>
        <div class="form-group" style="padding:2px;margin-bottom:0px;">
            <input id='button1' type="button" class="form-control" id="inputPassword4" value="Toepassen">
        </div>
        <div class="form-group" style="padding:2px; padding-left:20px;margin-bottom:0px;">
            <select class="form-control">
                <option>Rol wijzigen naar...</option>
                <option value="1">Gast</option>
                <option value="2">Admin</option>
            </select>
        </div>
        <div class="form-group" style="padding:2px;margin-bottom:0px;">
            <input type="button" class="form-control" id="inputPassword4" value="Bijwerken">
        </div>
    </div>

    <table class="table" cellspacing="0" width="100%">
        <thead class="thead-dark">
        <tr role="row">
            <th rowspan="1" colspan="1"><input id="cb-select-all-1" type="checkbox"></th>
            <th rowspan="1" colspan="1">Naam</th>
            <th rowspan="1" colspan="1">E-mail</th>
            <th rowspan="1" colspan="1">Rol</th>
        </tr>
        </thead>
        <tfoot class="thead-dark">
        <tr>
            <th rowspan="1" colspan="1"><input id="cb-select-all-2" type="checkbox"></th>
            <th rowspan="1" colspan="1">Naam</th>
            <th rowspan="1" colspan="1">E-mail</th>
            <th rowspan="1" colspan="1">Rol</th>
        </tr>
        </tfoot>
        <tbody>
        @foreach ($users as $user)
            <tr>
                <td><input type="checkbox" name="users[]" id="user_{{$user->id}}" class="administrator"
                           value="{{$user->id}}"></td>
                <td><a class='' href='{{ route('user.edit',['id' => $user->id])}}'><strong>{{ $user->name}}</strong></a>
                </td>
                <td>{{ $user->email}}</td>
                <td>{{ $user->role}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>

    <script>
        $(document).ready(function () {

        });
        $('#button1').click(function () {
            var value = $("[name='users[]']:checked");
            console.log(value);
            console.log('id is ' + value[0].id + ' val is ' + value[0].value);
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

    </script>
@endsection
