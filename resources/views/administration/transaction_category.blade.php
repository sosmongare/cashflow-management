@extends('layouts.app')

@section('content')

		  <!-- User Add Modal -->

    <div class="modal fade" id="modaladdtransactioncategory" role="dialog" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add transaction category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			       <form action="{{ route('transaction_category.store') }}" method="post">
			      	@csrf  

              <div class="form-group mb-3">
                <span class="has-float-label">
                    <label for="transaction_category" class="label">Transaction cateogry</label>
                <input class="form-control" name="name" type="text" placeholder="Enter transaction category name"/>
              
                <div class="form-group">
                     @if ($errors->has('transaction_category'))
                        <span class="text-danger">{{ $errors->first('transaction_category') }}</span>
                     @endif
                </div> 
                </span>
              </div>

              <div class="form-group input-group">
                  <span class="has-float-label">
                  <select name="type" class="form-control" style="width: 100%;">
                    <option selected="selected" disabled="">Select Transaction category type</option>
                    <option value="Income">Income</option>
                    <option value="Expense">Expense</option>
                    <option value="Other">Other</option>

                          </select>
                  <label for="type">Transaction category type</label>
                    <div class="form-group">
                     @if ($errors->has('type'))
                        <span class="text-danger">{{ $errors->first('type') }}</span>
                     @endif
                  </div>  
                  </span>
              </div>

              <div class="form-group input-group">
                  <span class="has-float-label">
                  <textarea class="form-control" id="notes" rows="3" placeholder="Enter notes" name="notes"></textarea>
                  <label for="notes">Notes</label>
                    <div class="form-group">
                     @if ($errors->has('notes'))
                        <span class="text-danger">{{ $errors->first('notes') }}</span>
                     @endif
                  </div>  
                  </span>
              </div>

            
            </div>

           <div class="modal-footer">
              <button type="submit" class="btn btn-success btn-block btn-sm add-account-type">Add Transaction category</button>
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
                Transaction Categories List
              </h2>
                <button type="button" class="btn btn-success btn-outline btn-sm float-right" data-toggle="modal" data-target="#modaladdtransactioncategory">Add Transaction category</button>
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
                    <th>Category name</th>
                    <th>Category type</th>
                     <th>Notes</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
            
                 @foreach ($TransactionCategories as $TransactionCategory)
                  <tr>
                    <td>{{  $TransactionCategory->name }}</td>
                    <td>{{  $TransactionCategory->type }}</td>
                      <td>{{  $TransactionCategory->notes }}</td>
                    <td>
                      <div class="row">
                        <div class="col-2">    
                            <a href="#modaledittransactioncategory{{ $TransactionCategory->id }}" class="btn btn-outline-warning btn-sm editbtn" title="Edit transaction category" data-toggle="modal">
                                  <span><i class="fa fa-edit"></i> </span>
                            </a> 
                        </div>

                        <div class="col-2">
                             <form action="{{ route('transaction_category.destroy', $TransactionCategory->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-outline-danger btn-sm" title="Delete" type="submit"><span><i class="fa fa-trash"></i></button>
                            </form>
                        </div>

                      </div>

                    </td>
                  </tr>

    <!-- Edit Account Modal  -->
        <div class="modal fade" id="modaledittransactioncategory{{ $TransactionCategory->id }}" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit transaction category</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
          <form id="edit-form" action="{{ route('transaction_category.update', $TransactionCategory->id) }}" method="POST">
              @csrf
              {{ method_field('PATCH')}}

              <input type="hidden" name="id" value="{{ $TransactionCategory->id }}" >
            
                    <div class="form-group mb-3">
                <span class="has-float-label">
                <input class="form-control" name="name" type="text" value="{{ $TransactionCategory->name}}" placeholder="Enter transaction category name"/>
                <label for="transaction_category" class="label">Transaction cateogry</label>
                <div class="form-group">
                     @if ($errors->has('transaction_category'))
                        <span class="text-danger">{{ $errors->first('transaction_category') }}</span>
                     @endif
                </div> 
                </span>
              </div>

              <div class="form-group input-group">
                  <span class="has-float-label">
                  <select name="type" class="form-control" style="width: 100%;">
                    <option selected="selected" disabled="">Select Transaction category type</option>
                   <option @if($TransactionCategory->type == 'Income') selected @endif value="Income">Income</option>
                    <option @if($TransactionCategory->type == 'Expense') selected @endif value="Expense">Expense</option>
                    <option @if($TransactionCategory->type == 'Other') selected @endif value="Other">Other</option>

                          </select>
                  <label for="type">Transaction category type</label>
                    <div class="form-group">
                     @if ($errors->has('type'))
                        <span class="text-danger">{{ $errors->first('type') }}</span>
                     @endif
                  </div>  
                  </span>
              </div>

              <div class="form-group input-group">
                  <span class="has-float-label">
                  <textarea class="form-control" id="notes" rows="3" placeholder="Enter notes" name="notes">{{ $TransactionCategory->notes}}"</textarea>
                  <label for="notes">Notes</label>
                    <div class="form-group">
                     @if ($errors->has('notes'))
                        <span class="text-danger">{{ $errors->first('notes') }}</span>
                     @endif
                  </div>  
                  </span>
              </div>


               <!-- /.form-group -->

            </div>
            <!-- /.modal body -->

           <div class="modal-footer">
              <button type="submit" class="btn btn-success btn-block btn-sm" id="updateaccount">Update Transaction category</button>
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
                     <th>Category name</th>
                    <th>Category type</th>
                    <th>Notes</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              
           
            </div>
      
    </div>

@endsection