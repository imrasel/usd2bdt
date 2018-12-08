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
            Update Transactions: {{$transaction->usd2bdt_transaction}}
        </div>

        <div class="panel-body">
            <form action="{{ route('transaction.update', ['id'=>$transaction->id]) }}" method="post">
                {{csrf_field()}}

                <table class="table table-hover">
                    <thead>
                        <th>From: {{$transaction->send_wallet}} | To: {{$transaction->receive_wallet}} | {{$transaction->receiveAmount}}</th>
                    </thead>
                </table>

                <div class="form-group">
                    <label for="title">Update Status</label>
                    <select name="status" id="" class="form-control">
                        <option value="{{$transaction->status}}">{{$transaction->status}}</option>
                        <option value="Completed">Completed</option>
                        <option value="Canceled">Canceled</option>
                        <option value="Processing">Processing</option>
                    </select>
                </div>



                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Update Transaction Status
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@stop