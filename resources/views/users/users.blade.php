@extends('layouts.app')

@section('content')


		  <!-- User Add Modal -->

        <div class="modal fade" id="add-user">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			    <form action="{{ route('user.store') }}" method="post">
			      	@csrf
			      
			        <div class="form-group mb-3">
			          <input type="text" name="name" class="form-control" placeholder="Full name">
			       	<div class="form-group">
			       		 @if ($errors->has('name'))
			          		<span class="text-danger">{{ $errors->first('name') }}</span>
			        	 @endif
			       	</div>   
			        </div>

			        <div class="form-group mb-3">
			          <input type="email" name="email" class="form-control" placeholder="Email">
			           <div class="form-group">
			           @if ($errors->has('email'))
			          	<span class="text-danger">{{ $errors->first('email') }}</span>
			        @endif
			        </div>
			    	</div>

			        <div class="form-group mb-3">
			          <input type="password" name="password" class="form-control" placeholder="Password">
			          <div class="form-group">
			           @if ($errors->has('password'))
			          	<span class="text-danger">{{ $errors->first('password') }}</span>
			          @endif
			         </div>
			        </div>
			      
            </div>

           <div class="modal-footer">
              <button type="submit" class="btn btn-success btn-block btn-sm add-user">Add User</button>
           </div>
          
          </div>
          <!-- /.modal-content -->
          </form>
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- / end  .modal -->


	<div class="card card-outline card-success">
            <div class="card-header">
              <h2 class="card-title">
                Users list
              </h2>
                <button type="button" class="btn btn-success btn-outline btn-sm float-right" data-toggle="modal" data-target="#add-user">Add User</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                     @if(session()->has('success'))
                          <div id="result" class="alert alert-success">
                              {{ session()->get('success') }}
                          </div>
                      @endif

                                      <table id="datatable" class="table table-bordered table-striped table-condensed table-hover table-sm">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>last login</th>
                     <th>Created At</th>
                    <th>Action</th>
                  </tr>
                  </thead>


                  <tbody>

             @foreach ($data as $key)
                  <tr>
                    <td>{{$key->id}}</td>
                     <td>{{ $key->name }}</td>
                    <td>{{ $key->email }}</td>
                    <td> {{ $key->last_login}}</td>
                    <td>{{ $key->created_at }}</td>
                    <td>
                      <div class="row">
                        <div class="col-2 offset-1">
                          <a href="{{ route('user.show',$key->id) }}" class="btn btn-outline-info btn-sm" title="View User"><span><i class="fa fa-eye"></i></span></a>
                          
                          </div>
                            <div class="col-2 offset-1">    
                            <a href="#modaledituser{{ $key->id }}" class="btn btn-outline-warning btn-sm editbtn" title="Update" data-toggle="modal">
                                  <span><i class="fa fa-edit"></i> </span>
                            </a> 
                        </div>
                        <div class="col-2 offset-1">
                             <form action="{{ route('user.destroy', $key->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-outline-danger btn-sm" title="Delete" type="submit"><span><i class="fa fa-trash"></i></button>
                            </form>
                        </div>
                      </div>

                    </td>
                  </tr>
      
      <!-- Edit User Modal  -->
        <div class="modal fade" id="modaledituser{{ $key->id }}">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit User</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
          <form id="edit-form" action="{{ route('user.update', $key->id) }}" method="POST">
              @csrf
              {{ method_field('PATCH')}}

              <input type="hidden" name="id" value="{{ $key->id }}" >
              <div class="form-group mb-3">
                <input type="text" name="name" value="{{ $key->name }}" id="name" class="form-control name">
                  <div class="form-group">
                     @if ($errors->has('name'))
                        <span class="text-danger">{{ $errors->first('name') }}</span>
                     @endif
                  </div>   
              </div>

            </div>

           <div class="modal-footer">
         <!--    <button type="button" class="btn btn-danger btn-block btn-sm" id="btn-update-user">Update</button> -->
              <button type="submit" class="btn btn-success btn-block btn-sm" id="updatebtn">Update User</button>
           </div>
          
          </div>
          <!-- /.modal-content -->
          </form>
        </div>
        <!-- /.modal-dialog -->
      </div>
      <!-- /Edit .modal -->

                   @endforeach
                  </tbody>
                  <tfoot>
                  <tr>
                    <th>#</th>
                    <th>Name</th>
                    <th>Email</th>
                    <th>last login</th>
                     <th>Created At</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              
           
            </div>
      
    </div>

@endsection