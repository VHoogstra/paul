@extends('layouts.master') @section('content')

    <h2>Create user</h2>
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action='/user' method='post'>
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleFormControlInput1">name</label>
            <input type="txt" class="form-control" name="name" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">email</label>
            <input type="email" class="form-control" name="email" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">password</label>
            <input type="password" class="form-control" name="password" >
        </div>
        <div class="form-group">
            <label for="exampleFormControlInput1">re enter password</label>
            <input type="password" class="form-control" name="password_confirmation" >
        </div>

        <div class="form-group">
            <label for="exampleFormControlSelect1">role</label>
            <select class="form-control" name="role">

                @foreach($roles as $role)
                    <option value="{{$role->id}}">{{$role->name}}</option>
                @endforeach

            </select>
        </div>
        <button type="submit" class="btn btn-primary ">Opslaan</button>


    </form>


@endsection
