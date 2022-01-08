@extends('layouts.app')

@section('content')

		  <!-- User Add Modal -->

    <div class="modal fade" id="modaladdaccounttype" role="dialog" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Account type</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			       <form action="{{ route('account_type.store') }}" method="post">
			      	@csrf  

              <div class="form-group mb-3">
                <span class="has-float-label">
                <input class="form-control" name="account_type" type="text" placeholder="Enter Account type"/>
                <label for="account_type" class="label">Account type</label>
                <div class="form-group">
                     @if ($errors->has('account_type'))
                        <span class="text-danger">{{ $errors->first('account_type') }}</span>
                     @endif
                </div> 
                </span>
              </div>
            
            </div>

           <div class="modal-footer">
              <button type="submit" class="btn btn-success btn-block btn-sm add-account-type">Add Account type</button>
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
                Accounts type list
              </h2>
                <button type="button" class="btn btn-success btn-outline btn-sm float-right" data-toggle="modal" data-target="#modaladdaccounttype">Add Account type</button>
            </div>
            <!-- /.card-header -->
            <div class="card-body">

                     @if(session()->has('success'))
                          <div id="result" class="alert alert-success">
                              {{ session()->get('success') }}
                          </div>
                      @elseif(session()->has('fail'))
                         <div id="result" class="alert alert-danger">
                              {{ session()->get('fail') }}
                          </div>
                      @endif
                

                <table id="datatable" class="table table-bordered table-striped table-condensed table-hover table-sm">
                  <thead>
                  <tr>
                    <th>#</th>
                    <th>Account type</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
            
                 @foreach ($account_types as $key)
                  <tr>
                    <td>{{  $key->id }}</td>
                    <td>{{  $key->account_type }}</td>
                    <td>
                      <div class="row">
                        <div class="col-2">    
                            <a href="#modaleditaccounttype{{ $key->id }}" class="btn btn-outline-warning btn-sm editbtn" title="Edit Account type" data-toggle="modal">
                                  <span><i class="fa fa-edit"></i> </span>
                            </a> 
                        </div>

                        <div class="col-2">
                             <form action="{{ route('account_type.destroy', $key->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-outline-danger btn-sm" title="Delete" type="submit"><span><i class="fa fa-trash"></i></button>
                            </form>
                        </div>

                      </div>

                    </td>
                  </tr>

    <!-- Edit Account Modal  -->
        <div class="modal fade" id="modaleditaccounttype{{ $key->id }}" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Account type</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
          <form id="edit-form" action="{{ route('account_type.update', $key->id) }}" method="POST">
              @csrf
              {{ method_field('PATCH')}}

            <input type="hidden" name="id" value="{{ $key->id }}" >
            
              <div class="form-group mb-3">
                <span class="has-float-label">
                <input class="form-control" name="account_type" value="{{ $key->account_type }}" id="account_type" type="text" placeholder="Enter Account name"/>
                <label for="account_type">Account type</label>
                <div class="form-group">
                     @if ($errors->has('account_type'))
                        <span class="text-danger">{{ $errors->first('account_type') }}</span>
                     @endif
                  </div> 
                </span>
              </div>

               <!-- /.form-group -->

            </div>
            <!-- /.modal body -->

           <div class="modal-footer">
              <button type="submit" class="btn btn-success btn-block btn-sm" id="updateaccount">Update Account type</button>
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
                    <th>Account type</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              
           
            </div>
      
    </div>

@endsection