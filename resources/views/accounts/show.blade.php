@extends('layouts.app')

@section('content')
	<div class="card card-outline card-info">
            <div class="card-header">
              <h2 class="card-title">
                Accounts list
              </h2>
                <a href="{{ route('account.index') }}" class="btn btn-primary btn-outline btn-sm float-right">Back</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
            		<div class="row">
						<div class="col-md-12">
							<table class="table table-bordered table-condensed table-sm">
							    <tbody>
							    	@foreach ($data as $key)
							      <tr>
							        <th>Account Name</th>
							        <td>{{ $key->account_name }}</td>		      
							      </tr>
							      <tr>
							      	  <th>Account Number</th>
							      	  <td>{{ $key->account_number }}</td>
							      </tr>
							        <tr>
							      	  <th>Opening Balance</th>
							      	  <td>{{ $key->opening_balance }}</td>
							      </tr>
							      <tr>
							      	  <th>Account Type</th>
							      	  <td>{{ $key->account_type }}</td>
							      </tr>
							      <tr>
							      	  <th>Description</th>
							      	  <td>{{ $key->description }}</td>
							      </tr>
							      <tr>
							      	  <th>Account Status</th>
							      	  <td>{{ $key->account_status }}</td>
							      </tr>
							    @endforeach
							    </tbody>
							  </table>

						</div>
					</div>
            </div>
        </div>
	
	
@endsection