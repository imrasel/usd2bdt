@extends('layouts.app')

@section('content')

    @if(count($errors) > 0)

        <ul class="list-group">
            @foreach($errors->all() as $error)
                <li class="list-group-item text-danger">
                    {{$error}}
                </li>
            @endforeach
        </ul>

    @endif

    <div class="panel panel-default">
        <div class="panel-heading">
            Update Permission: {{$user->name}}
        </div>

        <div class="panel-body">
            <form action="{{ route('permission.update', ['id'=>$user->id]) }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="title">Permission:</label>
                        ( input 1 for admin and 0 for user )
                    <input type="text" name="permission" value="{{$user->admin}}" class="form-control">
                </div>



                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Update User Permission
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@stop