@extends('layouts.master') @section('content')

<div class="h4">
    upload hier de foto's van de leerlingen.
</div>
<hr>

<form action="/student/storePhoto" class="dropzone" id="my-awesome-dropzone" enctype="multipart/form-data">
    {{ csrf_field() }}
    <div class="fallback">
        <input name="file" type="file" multiple />
    </div>
</form>
<small>plugin http://www.dropzonejs.com/</small>
<hr>

Huidige foto map jaar: {{$year}}<br><br>
<form action="/student/storePhotoYear" method="post">
    {{ csrf_field() }}
    <div class="form-group">
        <label for="exampleInputEmail1">foldernaam</label>
        <input type="txt" class="form-control" name="year" aria-describedby="yearhelp" placeholder="jaar">
        <small id="yearhelp" class="form-text text-muted">De map word pas aangemaakt als je een foto upload. Een bestaande map gebruiken? Kies hieronder</small>
    </div>
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
