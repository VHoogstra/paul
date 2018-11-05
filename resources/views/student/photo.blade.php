@extends('layouts.master') @section('content')

<div class="h4">
    upload hier de foto's van de leerlingen.
</div>
<hr>

<form action="{{route("studentStore")}}" class="dropzone" id="my-awesome-dropzone" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="fallback">
        <input name="file" type="file" multiple />
    </div>
</form>
<small>plugin http://www.dropzonejs.com/</small>
<hr>

Huidige foto map jaar: {{$year}}<p>Wil je naar een ander jaar uploaden? Verander het hieronder</p>
<hr>
<h2>Settings</h2>
<form action="{{route("studentStoreYear")}}" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="exampleInputEmail1">foldernaam</label>
        <input type="txt" class="form-control" name="year" aria-describedby="yearhelp" placeholder="jaar">
        <small id="yearhelp" class="form-text text-muted">De map word pas aangemaakt als je een foto upload. Een bestaande map gebruiken? Kies hieronder</small>
    </div>
    <p> <b>OF</b></p>
    <div class="form-group">
        <select class="form-control" name="yearmulti">
            <option value="">geen</option>
            @for ($i = 0; $i < count($directories); $i++)
                <option value="{{$directories[$i]}}">{{$directories[$i]}}</option>
            @endfor
        </select>
        <small id="yearhelp" class="form-text text-muted">Laat deze op none staan als je een nieuwe map kiest</small>
    </div>
    <button type="submit" class="btn btn-primary">verstuur</button>
</form>
{{$error}}
@endsection
