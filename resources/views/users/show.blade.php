@extends('layouts.app')

@section('content')
	<div class="card card-outline card-info">
            <div class="card-header">
              <h2 class="card-title">
                Users list
              </h2>
                <a href="{{ route('user.index') }}" class="btn btn-primary btn-outline btn-sm float-right">Back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            		<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered table-condensed table-sm">
							    <tbody>
							    	@foreach ($data as $key)
							      <tr>
							        <th>Name</th>
							        <td>{{ $key->name }}</td>		      
							      </tr>
							      <tr>
							      	  <th>Email</th>
							      	  <td>{{ $key->email }}</td>
							      </tr>
							        <tr>
							      	  <th>Registration Date</th>
							      	  <td>{{ $key->created_at }}</td>
							      </tr>
							      <tr>
							      	  <th>Last Login time</th>
							      	  <td>{{ $key->last_login }}</td>
							      </tr>
							    @endforeach
							    </tbody>
							  </table>

						</div>
					</div>
            </div>
        </div>
	
	
@endsection