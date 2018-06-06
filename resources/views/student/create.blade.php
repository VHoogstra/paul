@extends('layouts.master') @section('content')

<div class="h4">
    upload hier de excel van de administratie
</div>
<hr>

<form action="{{route('student.store')}}"
      class="dropzone"
      id="my-awesome-dropzone" enctype="multipart/form-data">
{{ csrf_field() }}
<br>    
     <div class="fallback">
    <input name="file" type="file" multiple />
  </div>
</form>



<hr>
<form method='post' action='{{route('student.store')}}' enctype="multipart/form-data">
    {{ csrf_field() }}
   
    <div class="form-group">
        <label for="exampleFormControlFile1">Example file input</label>
        <input type="file" class="form-control-file " name='file' id="exampleFormControlFile1" multiple>
    </div>
    <button type="submit" class="btn btn-danger ">Upload</button>
</form>


<br>
<Br><br>

    <input id="fileupload" type="file" name="files[]" data-url="{{route('student.store')}}" multiple>
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.1/jquery.min.js"></script>
<script src={{asset("js/vendor/jquery.ui.widget.js")}}></script>
<script src={{asset("js/jquery.iframe-transport.js")}}></script>
<script src={{asset("js/jquery.fileupload.js")}}></script>
<script>

    $('#fileupload').fileupload({
    url: '{{route('student.store')}}',
    sequentialUploads: true,
    progressall: function (e, data) {
        var progress = parseInt(data.loaded / data.total * 100, 10);
        $('#progress .bar').css(
            'width',
            progress + '%'
        );
    }
});

</script>
@endsection
