@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading">
            Current Rates
        </div>

        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <th>
                    Icon
                </th>
                <th>
                    We accept
                </th>
                <th>
                    Buy
                </th>
                <th>
                   Sell
                </th>
                
                <th>
                   Edit
                </th>
                <th>
                   Delete
                </th>
                </thead>

                <tbody>
                @foreach($rates as $rate)

                    <tr>
                        <td>
                            <img class="img-responsive" width="40px" border-radius="50%" src="{{asset($rate->icon)}}" alt="">
                        </td>
                        <td>
                            {{$rate->name}}
                        </td>
                        <td>
                            {{$rate->buy}}
                        </td>
                        <td>
                            {{$rate->sell}}
                        </td>
                        
                        <td>
                            <a href="{{route('rate.edit', ['id' => $rate->id])}}" class="btn btn-xs btn-info">Edit</a>

                        </td>
                        <td>
                            <a href="{{route('rate.delete', ['id' => $rate->id])}}" class="btn btn-xs btn-danger">Delete</a>
                        </td>
                    </tr>

                @endforeach
                </tbody>

            </table>
        </div>
    </div>

@stop