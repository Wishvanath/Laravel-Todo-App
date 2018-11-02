@extends('layout')


@section('content')
    {{-- new form section --}}
    <div class="row form_body">
        <div class="col-lg-6 col-lg-offset-3">
            <form action="/create/todo" method="post">
                {{csrf_field()}}
                <input type="text" name="txt_item" class="form-control">
            </form>
        </div>
    </div>
    {{-- end of new form section --}}
    <h2>Todo List Items:</h2>
    <table class="table">
        <thead>
            <tr>
                <th>S.NO</th>
                <th>Item Name</th>
                <th>Delete</th>
                <th>Update</th>
                <th>Status</th>
            </tr>
        </thead>
        @foreach ($fetch_data as $data)
        <tbody>
            <tr>
                <td>{{$data -> id}}</td>
                <td>{{$data -> todo}}</td>
                <td><a href="{{route('todo.delete', ['id'=> $data->id])}}" class="btn btn-danger">X</a></td>
                <td>
                <a href="{{route('todo.update',['id' => $data->id])}}" class="btn btn-info">Update</a>
                </td>
                <td>
                    @if(!$data->completed)
                <a href="{{route('todos.completed',['id' => $data->id])}}" class="btn btn-xs btn-warning">Not completed</a>
                    @else
                        <span  class = "btn-success btn-xs">Completed</span>
                    @endif
                </td>
            </tr>
        </tbody>
        @endforeach
    </table>

@stop
