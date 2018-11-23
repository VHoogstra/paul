@extends('layouts.master') @section('content')

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
<form method='post' action='{{route("party.store")}}'>
     {{ csrf_field() }}
    <div class="form-group row">
        <label for="example-text-input" class="col-2 col-form-label">Feest naam</label>
        <div class="col-10">
            <input class="form-control" type="text" name='name'>
        </div>
    </div>

    <div class="form-group row">
        <label for="example-number-input" class="col-2 col-form-label">entree prijs</label>
        <div class="col-10">
            <input class="form-control" type="number" name='price' value="0">
        </div>
    </div>
    <div class="form-group row">
        <label for="example-number-input" class="col-2 col-form-label">voorverkoop prijs</label>
        <div class="col-10">
            <input class="form-control" type="number" name='price_presale' value="0">
        </div>
    </div>
    <div class="form-group row">
        <label for="example-number-input" class="col-2 col-form-label">speciale prijs</label>
        <div class="col-10">
            <input class="form-control" type="number" name='price_speciale' value="0">
        </div>
    </div>

    <div class="form-group row">
        <label for="example-datetime-local-input" class="col-2 col-form-label">Start voorverkoop datum</label>
        <div class="col-10">
            <input class="form-control" type="datetime-local" name='presale_start' value='{{$today}}'>
            <p id="passwordHelpBlock" class="form-text text-muted">voor deze datum verkoop je geen kaartjes voor dit feest</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="example-datetime-local-input" class="col-2 col-form-label">Deuren open</label>
        <div class="col-10">
            <input class="form-control" type="datetime-local" name='start_date' value='{{$today}}'>
            <p id="passwordHelpBlock" class="form-text text-muted">na deze datum en tijd gaat de deur prijs in</p>
        </div>
    </div>
    <div class="form-group row">
        <label for="example-datetime-local-input" class="col-2 col-form-label">Eind van het feest</label>
        <div class="col-10">
            <input class="form-control" type="datetime-local" name='stop_date' value='{{$today}}'>
            <p id="passwordHelpBlock" class="form-text text-muted">na deze tijd weet het programma dat hij de statistieken kan maken</p>
        </div>
    </div>
 <button type="submit" class="btn btn-primary">Submit</button>

</form>

@endsection
