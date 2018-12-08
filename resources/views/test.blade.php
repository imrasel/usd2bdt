@extends('layouts.app')

@section('content')

<div class="panel panel-default">
    <div class="panel-heading">Dashboard</div>

    <div class="panel-body">
       <table class="table table-bordered">
       	
       	@foreach($users as $user)
			<tr>
				<td>{{ $user->id }}</td>
				<td>{{ $user->email}}</td>
				<td>
					<form class="col-sm-6" action="{{ route('send_email') }}" method="post">
			       		{{csrf_field()}}
				       		<input type="hidden" class="form-control" name="id" value="{{ $user->id }}">
				       	</div>
				       	<button class="btn btn-success" type="submit">Send</button>
			       </form>
				</td>
			</tr>
       	@endforeach
       </table>
    </div>
</div>

@endsection
