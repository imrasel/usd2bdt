@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading">
            Categories
        </div>

        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                    <th>
                        Icon
                    </th>
                <th>
                    Wallet Name
                </th>
                <th>
                    Reserve
                </th>
                <th>
                    Currency
                </th>
                <th>
                    Editing
                </th>
                <th>
                    Deleting
                </th>
                </thead>

                <tbody>
                @foreach($receive_wallets as $wallet)

                    <tr>
                        <td>
                            <img class="img-responsive" width="40px" border-radius="50%" src="{{asset($wallet->icon)}}" alt="">
                        </td>
                        <td>
                            {{$wallet->name}}
                        </td>
                        <td>
                            {{$wallet->amount}}
                        </td>
                        <td>
                            {{$wallet->currency}}
                        </td>
                        <td>
                            <a href="{{route('receive_wallet.edit', ['id' => $wallet->id])}}" class="btn btn-xs btn-info">Edit</a>

                        </td>
                        <td>
                            <a href="{{route('receive_wallet.delete', ['id' => $wallet->id])}}" class="btn btn-xs btn-danger">Delete</a>
                        </td>
                    </tr>

                @endforeach
                </tbody>

            </table>
        </div>
    </div>

@stop