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
            Create a new Transaction Rate
        </div>

        <div class="panel-body">
            <form action="{{ route('trrate.store') }}" method="post" enctype="multipart/form-data">
                {{csrf_field()}}

                
                    <div class="form-group">
                        <label for="title">Send Wallet Name</label>
                        <select name="send_wallet" id="" class="form-control">
                            <option value=""></option>
                            @foreach ($sendwallets as $sendwallet)
                                <option value="{{ $sendwallet->id }}">
                                    {{ $sendwallet->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title">Receive Wallet Name</label>
                        <select name="receive_wallet" id="" class="form-control">
                            <option value=""></option>
                            @foreach ($receivewallets as $receivewallet)
                                <option value="{{ $receivewallet->id }}">
                                    {{ $receivewallet->name }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="form-group">
                        <label for="title">Send Rate</label>
                        <input type="text" name="send_rate" class="form-control">
                    </div>

                    <div class="form-group">
                        <label for="title">Receive Rate</label>
                        <input type="text" name="receive_rate" class="form-control">
                    </div>
            


                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Save Transaction Rate
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@stop