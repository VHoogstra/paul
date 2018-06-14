@extends('layouts.master') @section('content')

    <div class="card-header">
        <i class="fa fa-table"></i> {{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}
        - {{$student->stamnr}} - {{$student->class}}</div>
    <div class="card-body">
        <div class='row'>
            <div class='col-sm-6'>
                <div>
                    <i class="fa fa-map-marker" aria-hidden="true"></i> {{$student->adres}}<br>
                    <i class="fa fa-home" aria-hidden="true"></i> {{$student->postalcode}} - {{$student->town}}
                </div>
                <div>
                    <i class="fa fa-phone" aria-hidden="true"></i> {{$student->phone_number}}<br>
                    <i class="fa fa-birthday-cake" aria-hidden="true"></i> {{$student->birth_date}}<br>
                    <i class="fa fa-birthday-cake" aria-hidden="true"></i> {{$age}} Years old!
                </div>
                <hr>
                @if(session('error'))
                    <div class="alert alert-warning">{{session('error')}}</div>
                @endif
                <div class="btn-group" role="group" aria-label="Basic example">
                    @if($payedCount === false)
                        <div class="alert alert-danger" role="alert" style='width:100%;'>
                            <strong>Oh snap!</strong> no active party set!!
                        </div>
                </div>
                @else
                    @if($payedCount == 0)
                        <a href="/registering/payed/{{$student->id}}">
                            <button class="btn btn-primary ">betaald</button>
                        </a>
                        <a>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#error"
                                    disabled>binnen
                            </button>
                        </a>
                        <a href="/registering/speciale/{{$student->id}}">
                            <button class="btn btn-primary ">speciaal</button>
                        </a>
            </div>
            <br>
            <a href="/registering/payedAndInside/{{$student->id}}">
                <button class="btn btn-warning ">betaald en binnen</button>
            </a>
            @else
                @if($payed[0]->payed == 1 || $payed[0]->special == 1)<a>
                    <button class="btn btn-primary" disabled>betaald</button>
                </a>
                @else <a href="/registering/payed/{{$student->id}}">
                    <button class="btn btn-primary">betaald</button>
                </a> @endif

                @if($payed[0]->payed == 1 || $payed[0]->special == 1)
                    @if($payed[0]->inside == 1)<a>
                        <button class="btn btn-primary" disabled>binnen</button>
                    </a>
                    @else <a href="/registering/inside/{{$student->id}}">
                        <button class="btn btn-primary ">binnen</button>
                    </a>@endif

                @else
                    <a>
                        <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#error">binnen
                        </button>
                    </a>
                @endif

                @if($payed[0]->special == 1 || $payed[0]->payed == 1)<a>
                    <button class="btn btn-primary" disabled>speciaal</button>
                </a>
                @else<a href="/registering/speciale/{{$student->id}}">
                    <button class="btn btn-primary ">speciaal</button>
                </a>@endif

        </div>
        <br>
        @if($payed[0]->payed == 1 || $payed[0]->special == 1 || $payed[0]->inside == 1)
            <a>
                <button class="btn btn-warning" disabled>betaald en binnen</button>
            </a>
        @else
            <a href="/registering/payedAndInside/{{$student->id}}">
                <button class="btn btn-warning ">betaald en binnen</button>
            </a>
        @endif
        @endif
        @endif
        <hr>
        <a href="/registering/reset/{{$student->id}}">
            <button class="btn btn-danger btn-block">reset!</button>
        </a>

    </div>

    <div class='col-sm-6'>
        <img src="{{$contents}}" class="img-fluid">
    </div>
    </div>

    <!-- Modal -->
    <div class="modal fade" id="error" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
         aria-hidden="true">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Let op!</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Deze student heeft nog niet betaald
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>
@endsection
