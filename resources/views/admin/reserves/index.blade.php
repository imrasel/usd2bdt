@extends('layouts.app')

@section('content')

    <div class="panel panel-default">

        <div class="panel-heading">
            Reserve Accounts
        </div>

        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                <th>
                    Icon
                </th>
                <th>
                    Reserve Account Name
                </th>
                <th>
                    Reserve Amount
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
                @foreach($reserves as $reserve)

                    <tr>
                        <td>
                            <img class="img-responsive" width="40px" border-radius="50%" src="{{asset($reserve->icon)}}" alt="">
                        </td>
                        <td>
                            {{$reserve->name}}
                        </td>
                        <td>
                            {{$reserve->amount}}
                        </td>
                        <td>
                            {{$reserve->currency}}
                        </td>
                        <td>
                            <a href="{{route('reserve.edit', ['id' => $reserve->id])}}" class="btn btn-xs btn-info">Edit</a>

                        </td>
                        <td>
                            <a href="{{route('reserve.delete', ['id' => $reserve->id])}}" class="btn btn-xs btn-danger">Delete</a>
                        </td>
                    </tr>

                @endforeach
                </tbody>

            </table>
        </div>
    </div>

@stop