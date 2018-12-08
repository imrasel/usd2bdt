@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading" style="overflow: hidden;">
            All Transaction Rates 
            <a href="{{ route('trrate.create') }}" class="btn btn-primary" style="float: right;">
                
                + Add New Transaction Rate
            </a>
        </div>

        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <th>
                    Serial
                </th>
                <th>
                    Send Wallet
                </th>
                <th>
                    Receive Wallet
                </th>
                <th>
                   Rates
                </th>
                
                <th>
                   Edit
                </th>
                <th>
                   Delete
                </th>
                </thead>

                <tbody>
                @foreach($trrates as $key=>$trrate)

                    <tr>
                        <td>{{ $key+1 }}</td>
                        
                        <td>
                            {{ $trrate->sendwallet->name }}
                        </td>
                        <td>
                            {{ $trrate->receivewallet->name }}
                        </td>
                        <td>
                            {{ $trrate->send_rate }} {{ $trrate->sendwallet->currency }} = {{ $trrate->receive_rate }} {{ $trrate->receivewallet->currency }}
                        </td>
                        
                        <td>
                            <a href="{{route('trrate.edit', ['id' => $trrate->id])}}" class="btn btn-xs btn-info">Edit</a>

                        </td>
                        <td>
                            <a href="{{route('trrate.delete', ['id' => $trrate->id])}}" class="btn btn-xs btn-danger">Delete</a>
                        </td>
                    </tr>

                @endforeach
                </tbody>

            </table>
        </div>
    </div>

@stop