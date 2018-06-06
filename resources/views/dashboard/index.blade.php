@extends('layouts.master') @section('content')
    <div class="row">
        @if(!$activeParty)
            <div class="alert alert-danger" role="alert" style='width:100%;'>
                <strong>Oh snap!</strong> no active party set!!
            </div>
        @else
            <div class="alert alert-info" role="alert" style='width:100%;'>
                Active Party is set to <strong>{{$activeParty->name}} </strong>
            </div>
        @endif
    </div>
    <div class="row">
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-primary o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-paper-plane"></i>
                    </div>
                    <div class="mr-5">{{$inside}} Inside!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="/inside">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-warning o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-list"></i>
                    </div>
                    <div class="mr-5">{{$payed}} Payed!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="/payed">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                </a>
            </div>
        </div>
        <div class="col-xl-3 col-sm-6 mb-3">
            <div class="card text-white bg-success o-hidden h-100">
                <div class="card-body">
                    <div class="card-body-icon">
                        <i class="fa fa-fw fa-shopping-cart"></i>
                    </div>
                    <div class="mr-5">{{$payedNInside}} Payed but not inside!</div>
                </div>
                <a class="card-footer text-white clearfix small z-1" href="/payedNinside">
                    <span class="float-left">View Details</span>
                    <span class="float-right">
                <i class="fa fa-angle-right"></i>
              </span>
                </a>
            </div>
        </div>
    </div>

@endsection

