@extends('layout')

@section('content')

<h1>update here</h1>


{{-- define to display old data --}}
<div class="row form_body">
    <div class="col-lg-6 col-lg-offset-3">
    <form action="{{route('todo.save',['id'=> $update_data ->id])}}" method="post">
            {{csrf_field()}}
            <input type="text" class="form-control" name="txt_update" value="{{$update_data -> todo}}">
            <button type="submit" class="btn btn-warning" style="margin-left:280px; margin-top:20px;">update</button>
        </form>
    </div>
</div>
{{-- end of the defination --}}
@stop