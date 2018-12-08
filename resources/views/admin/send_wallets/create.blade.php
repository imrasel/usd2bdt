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
            Create a new post
        </div>

        <div class="panel-body">
            <form action="{{ route('send_wallet.store') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                <div class="form-group">
                    <label for="title">Wallet Name</label>
                    <input type="text" name="name" class="form-control">
                </div>

                <div class="form-group">
                    <label for="title">Wallet Icon</label>
                    <input type="file" name="icon" class="">
                </div>
                <div class="form-group">
                    <label for="title">Reserve Amount</label>
                    <input type="text" name="amount" class="form-control">
                </div>
                <div class="form-group">
                    <label for="title">Reserve Currency</label>
                    <input type="text" name="currency" class="form-control">
                </div>
                <div class="form-group">
                    <label for="title">Your Account Number</label>
                    <input type="text" name="my_account" class="form-control">
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