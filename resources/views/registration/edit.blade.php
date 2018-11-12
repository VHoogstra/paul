@extends('layouts.master') @section('content')

    <div class="card-header">

        <i class="fa fa-table"></i> {{$student->first_name}} {{$student->middle_name}} {{$student->last_name}}
        - {{$student->stamnr}} - {{$student->class}}
        <a class="float-right" href="{{route('registering.index')}}">
            <span class="nav-link-text">back</span>
            <i class="fa fa-chevron-right"></i>
        </a>
    </div>

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
                    <i class="fa fa-birthday-cake" aria-hidden="true"></i> {{$age}} Years old!<br>
                    <i class="fas fa-hand-holding-usd"></i> {{$status['msg']}}
                </div>
                <hr>
                @if(session('error'))
                    <div class="alert alert-warning">{{session('error')}}</div>
                @endif

                <div>
                    @if($payedCount === false)
                        <div class="alert alert-danger" role="alert" style='width:100%;'>
                            <strong>Oh snap!</strong> no active party set!!
                        </div>
                    @else

                        @if($status['code']== 0)
                            <a href="/registering/payed/{{$student->stamnr}}">
                                <button class="btn btn-primary btn-sm-block btn-block" style="margin-bottom: 10px;">
                                    Betaald
                                </button>
                            </a>

                            <a href="/registering/speciale/{{$student->stamnr}}">
                                <button class="btn btn-primary btn-block " style="margin-bottom: 10px;">
                                    Speciaal
                                </button>
                            </a>
                            <a href="/registering/inside/{{$student->stamnr}}">
                                <button type="button" class="btn btn-primary btn-block" style="margin-bottom: 10px;">
                                    Binnen
                                </button>
                            </a>
                            <a href="/registering/payedAndInside/{{$student->stamnr}}">
                                <button class="btn btn-warning btn-block " style="margin-bottom: 10px;">
                                    Betaald en binnen
                                </button>
                            </a>
                        @endif

                        @if($status['code']== 1)
                            <a href="/registering/payed/{{$student->stamnr}}">
                                <button class="btn btn-primary btn-sm-block btn-block" style="margin-bottom: 10px;" disabled>
                                    Betaald
                                </button>
                            </a>

                            <a href="/registering/speciale/{{$student->stamnr}}">
                                <button class="btn btn-primary btn-block " style="margin-bottom: 10px;" disabled>
                                    Speciaal
                                </button>
                            </a>
                            <a href="/registering/inside/{{$student->stamnr}}">
                                <button type="button" class="btn btn-primary btn-block" style="margin-bottom: 10px;">
                                    Binnen
                                </button>
                            </a>
                            <a href="/registering/payedAndInside/{{$student->stamnr}}">
                                <button class="btn btn-warning btn-block " style="margin-bottom: 10px;" disabled>
                                    Betaald en binnen
                                </button>
                            </a>
                        @endif

                        @if($status['code']== 2)
                            <a href="/registering/payed/{{$student->stamnr}}">
                                <button class="btn btn-primary btn-sm-block btn-block" style="margin-bottom: 10px;" disabled>
                                    Betaald
                                </button>
                            </a>

                            <a href="/registering/speciale/{{$student->stamnr}}">
                                <button class="btn btn-primary btn-block " style="margin-bottom: 10px;" disabled>
                                    Speciaal
                                </button>
                            </a>
                            <a href="/registering/inside/{{$student->stamnr}}">
                                <button type="button" class="btn btn-primary btn-block" style="margin-bottom: 10px;" disabled>
                                    Binnen
                                </button>
                            </a>
                            <a href="/registering/payedAndInside/{{$student->stamnr}}">
                                <button class="btn btn-warning btn-block " style="margin-bottom: 10px;" disabled>
                                    Betaald en binnen
                                </button>
                            </a>
                        @endif
                    @endif
                </div> {{--close button group--}}
            </div>{{--close row--}}


            <div class='col-sm-6'>
                <img src="{{$contents}}" class="img-fluid">
            </div>
            <div class='col-sm-12'>
                <a href="/registering/reset/{{$student->id}}">
                    <button class="btn btn-danger btn-block">reset!</button>
                </a>
            </div>

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
