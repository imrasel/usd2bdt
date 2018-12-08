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
            Create a new Wallet
        </div>

        <div class="panel-body">
            <form action="{{ route('reserve.store') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="title">Reserve Account Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="featured">Select Icon Image</label><br>
                    <span class="btn btn-default btn-file">
                         <input type="file" name="icon">
                    </span>
                </div>

                <div class="form-group col-sm-6">
                    <label for="title">Reserve Amount</label>
                    <input type="text" name="amount" class="form-control">
                </div>
                <div class="form-group col-sm-6">
                    <label for="title">Currency</label>
                    
                    <input type="text" name="currency" class="form-control">
                </div>


                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Save Wallet
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@stop