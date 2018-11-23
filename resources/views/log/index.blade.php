@extends('layouts.master') @section('content')

    <div class="h4">
        <i class="fas fa-hdd fa-lg"></i>
    </div>
    <hr>
    <div class="top-area">
        <ul class="nav-links issues-state-filters  nav nav-tabs">
            @if($categoryActive==null)
                <li class="active">
            @else
                <li>
                    @endif
                <a href="{{route('log.index')}}">All
                    <span class="badge badge-pill">{{$AllLogCount}}</span>
                </a>
            </li>
            @foreach($logCategory as $category)
                @if($category->id == $categoryActive)
                    <li class="active">
                @else
                    <li>
                        @endif
                        <a href="?category={{$category->id}}"  class="align-middle">
                            {{$category->name}}
                            <span class="badge badge-pill">{{$category->logs_count}}</span>
                        </a>
                    </li>
                    @endforeach
        </ul>
    </div>



    <table class="table table-bordered" id='datatable' width="100%" cellspacing="0"
           role="grid" aria-describedby="dataTable_info" style="width: 100%;">
        <thead>
        <tr role="row">
            <th rowspan="1" colspan="1">User</th>
            <th rowspan="1" colspan="1">Date</th>
            <th rowspan="1" colspan="1">Category</th>
            <th rowspan="1" colspan="1">Text</th>
        </tr>
        </thead>
        <tfoot>
        <tr>
            <th rowspan="1" colspan="1">User</th>
            <th rowspan="1" colspan="1">Date</th>
            <th rowspan="1" colspan="1">Category</th>
            <th rowspan="1" colspan="1">Text</th>
        </tr>
        </tfoot>
        <tbody>
        @foreach($log as $log)
            <tr>
                <td>{{$log->user->name}}</td>
                <td>{{$log->created_at}}</td>
                <td>{{$log->logCategory->name}}</td>
                <td>{{$log->info}}</td>
            </tr>
        @endforeach
        </tbody>
    </table>
    <script>
        $(document).ready(function () {
            var table = $('#datatable').DataTable();
        });
    </script>
@endsection
