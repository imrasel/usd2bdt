@extends('layouts.app')

@section('content')

    <div class="panel panel-default">
        
        <div class="panel-heading">
            Users
        </div>

        <div class="panel-body">
            <table class="table table-hover">
                <thead>
                
                <th>
                    Name
                </th>
                <th>
                    Email
                </th>
                <th>
                    Permission
                </th>
                

                </thead>

                <tbody>
                
                    @if($users->count() > 0)
                        
                        @foreach($users->sortByDesc('id')->sortByDesc('admin') as $user)

                    <tr>
                        

                        <td>
                            {{$user->name}}
                        </td>
                        <td>
                            {{$user->email}}
                        </td>
                        <td>
                            @if($user->admin)
                                <a href="{{route('permission.edit',['id'=>$user->id])}}" class="btn btn-danger btn-sm">
                                    Admin
                                </a>
                                

                            @else
                                <a href="{{route('permission.edit',['id'=>$user->id])}}" class="btn btn-primary btn-sm">
                                    User
                                </a>
                            @endif
                        </td>
                        
                    </tr>

                @endforeach

                    @else
                        <tr>
                            <th colspan="5" class="text-center">No Ueser is Available</th>
                        </tr>
    
                    @endif


                </tbody>
               
            </table>
             {{ $users->links() }}
        </div>
    </div>

@stop