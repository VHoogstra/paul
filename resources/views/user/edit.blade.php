@extends('layouts.master') @section('content')

<h2> edit user name</h2>

<form action = '/user/{{$users->id}}' method = 'post'>
        {{ csrf_field() }}
        {{ method_field('patch') }}
    <div class="form-group">
        <label for="exampleFormControlInput1">name</label>
        <input type="email" class="form-control" value="{{$users->name}}" readonly>
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">email</label>
        <input type="email" class="form-control" value="{{$users->email}}" readonly>
    </div>

    <div class="form-group">
        <label for="exampleFormControlSelect1">role</label>
        <select class="form-control" name="role" value="{{$users->role_id}}">

           @foreach($roles as $role)
                @if ($users->role_id == $role->id)
                    <option value="{{$role->id}}" selected>{{$role->name}}</option>
                @else
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endif
            @endforeach

        </select>
    </div>
    <button type="submit" class="btn btn-primary "> change</button>


</form>


@endsection
