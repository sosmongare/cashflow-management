@extends('layouts.app')

@section('content')

		  <!-- User Add Modal -->

    <div class="modal fade" id="modaladdaccount" role="dialog" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Account</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			    <form action="{{ route('account.store') }}" method="post">
			      	@csrf     
              <div class="form-group mb-3">
                <span class="has-float-label">
                <input class="form-control" name="account_name" id="account_name" type="text" placeholder="Enter Account name"/>
                <label for="account_name">Account name</label>
                <div class="form-group">
                     @if ($errors->has('account_name'))
                        <span class="text-danger">{{ $errors->first('account_name') }}</span>
                     @endif
                  </div> 
                </span>
              </div>

              <div class="form-group input-group">
                <span class="has-float-label">
                <input class="form-control" name="account_number" id="account_number" type="text" placeholder="Enter Account number"/>
                <label for="account_number">Account number</label>
                <div class="form-group">
                     @if ($errors->has('account_number'))
                        <span class="text-danger">{{ $errors->first('account_number') }}</span>
                     @endif
                  </div> 
                </span>
              </div>

              <div class="form-group input-group">
                <span class="has-float-label">
                <input class="form-control" name="opening_balance" id="opening_balance" type="text" placeholder="Enter Opening balance"/>
                <label for="opening_balance">Opening balance</label>
                <div class="form-group">
                     @if ($errors->has('opening_balance'))
                        <span class="text-danger">{{ $errors->first('opening_balance') }}</span>
                     @endif
                  </div> 
                </span>
              </div>

              <div class="form-group input-group">
                  <span class="has-float-label">
                  <textarea class="form-control" id="description" rows="3" placeholder="Enter account description" name="description"></textarea>
                  <label for="description">Description</label>
                    <div class="form-group">
                     @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                     @endif
                  </div>  
                  </span>
              </div>

              <div class="form-group input-group">
                  <span class="has-float-label">
                  <select name="account_type" class="form-control" style="width: 100%;">
                    <option selected="selected" disabled="">Select Account Type</option>
                    @foreach($account_types as $account_type)
                    <option value="{{ $account_type->id }}" @if(old('account_type')&&old('account_type')== $account_type->id) selected='selected' @endif >{{ $account_type->account_type }}</option>
                  @endforeach
                          </select>
                  <label for="account_type">Account type</label>
                    <div class="form-group">
                     @if ($errors->has('account_type'))
                        <span class="text-danger">{{ $errors->first('account_type') }}</span>
                     @endif
                  </div>  
                  </span>
              </div>

              <div class="form-group input-group">
                  <span class="has-float-label">
                  <select name="account_status" class="form-control" style="width: 100%;">
                    <option selected="selected" disabled="">Select account status</option>
                    <option value="Active">Active</option>
                    <option value="InActive">In Active</option>

                          </select>
                  <label for="account_status">Account type</label>
                    <div class="form-group">
                     @if ($errors->has('account_status'))
                        <span class="text-danger">{{ $errors->first('account_status') }}</span>
                     @endif
                  </div>  
                  </span>
              </div>
			      
            </div>

           <div class="modal-footer">
              <button type="submit" class="btn btn-success btn-block btn-sm add-account">Add Account</button>
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
                Accounts list
              </h2>
                <button type="button" class="btn btn-success btn-outline btn-sm float-right" data-toggle="modal" data-target="#modaladdaccount">Add Account</button>
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
                    <th>Account Name</th>
                    <th>Account No</th>
                    <th>Opening Bal</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
            
                 @foreach ($data as $key)
                  <tr>
                    <td>{{  $key->id }}</td>
                    <td>{{  $key->account_name }}</td>
                    <td>{{  $key->account_number }}</td>
                    <td>{{  $key->opening_balance }}</td>
                    <td>{{  $key->description }}</td>
                    <td>{{  $key->account_type }}</td>
                    <td>{{  $key->account_status }}</td>
                    <td>
                      <div class="row">
                        <div class="col-2 offset-1">
                          <a href="{{ route('account.show',$key->id) }}" class="btn btn-outline-info btn-sm" title="View Account"><span><i class="fa fa-eye"></i></span></a>   
                        </div>  

                        <div class="col-2 offset-1">    
                            <a href="#modaleditaccount{{ $key->id }}" class="btn btn-outline-warning btn-sm editbtn" title="Edit Account" data-toggle="modal">
                                  <span><i class="fa fa-edit"></i> </span>
                            </a> 
                        </div>

                        <div class="col-2 offset-1">
                             <form action="{{ route('account.destroy', $key->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-outline-danger btn-sm" title="Delete" type="submit"><span><i class="fa fa-trash"></i></button>
                            </form>
                        </div>

                      </div>

                    </td>
                  </tr>

    <!-- Edit Account Modal  -->
        <div class="modal fade" id="modaleditaccount{{ $key->id }}" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Account</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
          <form id="edit-form" action="{{ route('account.update', $key->id) }}" method="POST">
              @csrf
              {{ method_field('PATCH')}}

            <input type="hidden" name="id" value="{{ $key->id }}" >
            
              <div class="form-group mb-3">
                <span class="has-float-label">
                <input class="form-control" name="account_name" value="{{ $key->account_name }}" id="account_name" type="text" placeholder="Enter Account name"/>
                <label for="account_name">Account name</label>
                <div class="form-group">
                     @if ($errors->has('account_name'))
                        <span class="text-danger">{{ $errors->first('account_name') }}</span>
                     @endif
                  </div> 
                </span>
              </div>

              <div class="form-group input-group">
                <span class="has-float-label">
                <input class="form-control" name="account_number" id="account_number" type="text" value="{{ $key->account_number }}" placeholder="Enter Account number"/>
                <label for="account_number">Account number</label>
                <div class="form-group">
                     @if ($errors->has('account_number'))
                        <span class="text-danger">{{ $errors->first('account_number') }}</span>
                     @endif
                  </div> 
                </span>
              </div>

              <div class="form-group input-group">
                <span class="has-float-label">
                <input class="form-control" name="opening_balance" value="{{ $key->opening_balance }}" id="opening_balance" type="text" placeholder="Enter Opening balance"/>
                <label for="opening_balance">Opening balance</label>
                <div class="form-group">
                     @if ($errors->has('opening_balance'))
                        <span class="text-danger">{{ $errors->first('opening_balance') }}</span>
                     @endif
                  </div> 
                </span>
              </div>

              <div class="form-group input-group">
                  <span class="has-float-label">
                  <textarea class="form-control" id="description" rows="3" placeholder="Enter account description" name="description">{{ $key->description }}</textarea>
                  <label for="description">Description</label>
                    <div class="form-group">
                     @if ($errors->has('description'))
                        <span class="text-danger">{{ $errors->first('description') }}</span>
                     @endif
                  </div>  
                  </span>
              </div>

              <div class="form-group input-group">
                  <span class="has-float-label">
                <select name="account_type" class="form-control" style="width: 100%;">
                  <option selected disabled="">Select account type</option>
                 @foreach($account_types as $account_type)
                  <option value="{{ $account_type->id }}"  @if($account_type->id==$key->account_type) selected='selected' @endif >{{ $account_type->account_type }}</option>
              @endforeach  

                </select>
                  <label for="account_type">Account type</label>
                    <div class="form-group">
                     @if ($errors->has('account_type'))
                        <span class="text-danger">{{ $errors->first('account_type') }}</span>
                     @endif
                  </div>  
                  </span>
              </div>

              <div class="form-group input-group">
                  <span class="has-float-label">
                  <select name="account_status" class="form-control" style="width: 100%;">
                    <option selected disabled="">Select account status</option>
                    <option @if($key->account_status == 'Active') selected @endif value="Active">Active</option>
                    <option @if($key->account_status == 'In Active') selected @endif value="In Active">In Active</option>
                 
                  </select>
                  <label for="account_status">Account status</label>
                    <div class="form-group">
                     @if ($errors->has('account_status'))
                        <span class="text-danger">{{ $errors->first('account_status') }}</span>
                     @endif
                  </div>  
                  </span>
              </div>

           
               <!-- /.form-group -->

            </div>
            <!-- /.modal body -->

           <div class="modal-footer">
              <button type="submit" class="btn btn-success btn-block btn-sm" id="updateaccount">Update Account</button>
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
                    <th>Account Name</th>
                    <th>Account No</th>
                    <th>Opening Bal</th>
                    <th>Description</th>
                    <th>Type</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              
           
            </div>
      
    </div>

@endsection