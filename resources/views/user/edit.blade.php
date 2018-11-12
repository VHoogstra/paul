@extends('layouts.master') @section('content')

<h2> edit User</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
<form action = '/user/{{$users->id}}' method = 'post'>
        {{ csrf_field() }}
        {{ method_field('patch') }}
       <div class="form-group">
        <label for="exampleFormControlInput1">name</label>
        <input type="txt" class="form-control" name="name" value="{{$users->name}}">
    </div>
    <div class="form-group">
        <label for="exampleFormControlInput1">email</label>
        <input type="email" class="form-control" name="email" value="{{$users->email}}" readonly>
    </div>
    <div class="form-group">
        <label for="exampleFormControlSelect1">role</label>
        <select class="form-control" name="role" >
            @foreach($roles as $role)
                @if ($users->role_id == $role->id)
                    <option value="{{$role->id}}" selected>{{$role->name}}</option>
                @else
                <option value="{{$role->id}}">{{$role->name}}</option>
                @endif
            @endforeach

        </select>
    </div>
    <button type="submit" class="btn btn-primary ">Opslaan</button>


</form>


@endsection
