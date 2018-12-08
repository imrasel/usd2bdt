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
            Edit Transaction Rate
        </div>

        <div class="panel-body">
            <form action="{{ route('trrate.update', $trrate->id) }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                
                    <div class="form-group">
                        <label for="title">Send Wallet Name</label>
                        <input type="text" name="send_wallet" id="" class="form-control" value="{{ $trrate->sendwallet->name }}" readonly>
                            
                    </div>

                    <div class="form-group">
                        <label for="title">Receive Wallet Name</label>
                        <input type="text" name="send_wallet" id="" class="form-control" value="{{ $trrate->receivewallet->name }}" readonly>
                    </div>

                    <div class="form-group">
                        <label for="title">Send Rate</label>
                        <input type="text" name="send_rate" class="form-control" value="{{ $trrate->send_rate }}">
                    </div>

                    <div class="form-group">
                        <label for="title">Receive Rate</label>
                        <input type="text" name="receive_rate" class="form-control" value="{{ $trrate->receive_rate }}">
                    </div>
            


                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Update Transaction Rate
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@stop