@extends('layouts.master') @section('content')

    <div class="h4">
        upload hier de excel van de administratie
    </div>
    <hr>

    @if (session('error'))

        @foreach(session('error') as $error)
            <div class="alert alert-danger">
                {{$error}}
            </div>

        @endforeach
    @endif
    @if (session('succes'))

        <div class="alert alert-success">
            {{session('succes')}}
        </div>

    @endif
    <h4>
        {{$studentCount}} studenten in het systeem <small>(dit getal kan anders zijn dan het aantal excel rijen ivm duplicaten)</small>
    </h4>
    <div class="container" style="margin:0px;">
        <div class="row">
        <div class="col-6">
            <form method='post' action='{{route('student.store')}}' enctype="multipart/form-data">
                {{ csrf_field() }}
                <div class="form-group">
                    <label for="exampleFormControlFile1">Example file input</label>
                    <input type="file" class="form-control-file " name='file' id="exampleFormControlFile1" multiple>
                </div>
                <button type="submit" class="btn btn-danger ">Upload</button>
            </form>
        </div>
        <div class="col-6">
            <div class="alert alert-info" role="alert">
                <strong>Heads up!</strong> Dit excel bestand moet de volgende header colums hebben<br>
                <ul>
                    <li>A1 = Stamnr</li>
                    <li>B1 = Klas</li>
                    <li>C1 = Roepnaam</li>
                    <li>D1 = Tussenv</li>
                    <li>E1 = Achternaam</li>
                    <li>F1 = Woonplaats</li>
                    <li>G1 = adres</li>
                    <li>H1 = Telefoon</li>
                    <li>I1 = Geboortedatum</li>
                </ul>

            </div>
        </div>
        </div>
    </div>





    <br>
    <button class="btn btn-block btn-warning" data-toggle="modal" data-target="#removeStudent">verwijder alle
        studenten
    </button>
    <!-- Button trigger modal -->

    <!-- Modal -->
    <div class="modal fade" id="removeStudent" tabindex="-1" role="dialog" aria-labelledby="modelTitleId"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">

                    <h4 class="modal-title" id="modelTitleId">Are you sure?</h4>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Wil je echt alle studenten verwijderen?<br>
                    Hierna moet je opnieuw een excel bestand uploaden om weer studenten te hebben.
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Sluiten</button>
                    <form action="{{route('student.destroy',['id'=>'1'])}}" method="post">
                        @csrf
                        @method('DELETE')
                        <button type="submit" class="btn btn-danger">Verwijder alle studenten</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    {{--<script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>--}}
    {{--<script src={{asset("js/vendor/jquery.ui.widget.js")}}></script>--}}
    {{--<script src={{asset("js/jquery.iframe-transport.js")}}></script>--}}
    {{--<script src={{asset("js/jquery.fileupload.js")}}></script>--}}

@endsection
