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
            Edit Rate: {{ $rate->name }}
        </div>

        <div class="panel-body">

            <form action="{{ route('rate.update', ['id' => $rate->id]) }}" method="post" enctype="multipart/form-data">

                {{csrf_field()}}

                <div class="form-group">
                    <label for="title">Wallet Name</label>
                    <input type="text" name="name" class="form-control" value="{{$rate->name}}">
                </div>

                <div class="form-group">
                        <label for="title">Wallet Icon</label>
                        <input type="file" name="icon" class="">
                    </div>

                    <div class="form-group">
                        <label for="title">Buy</label>
                        <input type="text" name="buy" class="form-control" value="{{$rate->buy}}">
                    </div>

                    <div class="form-group">
                        <label for="title">Sell</label>
                        <input type="text" name="sell" class="form-control" value="{{$rate->sell}}">
                    </div>
            


                <div class="form-group">
                    <div class="text-center">
                        <button class="btn btn-success" type="submit">
                            Update Rate
                        </button>
                    </div>
                </div>

            </form>
        </div>
    </div>

@stop