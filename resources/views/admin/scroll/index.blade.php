@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading">
            Scrolling Text
        </div>

        <div class="panel-body">
            <form action="{{ route('scroll.update') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" name="name" class="form-control" value="{{$scroll->name}}">
                </div>

                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Update Scroll Text
                        </button>
                    </div>
                </div>


            </form>
            
        </div>
    </div>

@stop