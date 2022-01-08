@extends('layouts.app')

@section('content')

		  <!-- User Add Modal -->

    <div class="modal fade" id="modaladdpaymentmethod" role="dialog" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Add Payment method</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
			       <form action="{{ route('payment_methods.store') }}" method="post">
			      	@csrf  

              <div class="form-group mb-3">
                <span class="has-float-label">
                    <label for="payment-method" class="label">Payment method</label>
                <input class="form-control" name="name" type="text" placeholder="Enter payment method"/>
              
                <div class="form-group">
                     @if ($errors->has('payment_method'))
                        <span class="text-danger">{{ $errors->first('payment_method') }}</span>
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
              <button type="submit" class="btn btn-success btn-block btn-sm add-account-type">Add payment method</button>
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
                Payment method List
              </h2>
                <button type="button" class="btn btn-success btn-outline btn-sm float-right" data-toggle="modal" data-target="#modaladdpaymentmethod">Add payment method</button>
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
                    <th>Payment method name</th>
                    <th>Notes</th>
                    <th>Action</th>
                  </tr>
                  </thead>
                  <tbody>
            
                 @foreach ($PaymentMethods as $PaymentMethod)
                  <tr>
                    <td>{{  $PaymentMethod->name }}</td>
                      <td>{{  $PaymentMethod->notes }}</td>
                    <td>
                      <div class="row">
                        <div class="col-2">    
                            <a href="#modaleditpaymentmethod{{ $PaymentMethod->id }}" class="btn btn-outline-warning btn-sm editbtn" title="Edit" data-toggle="modal">
                                  <span><i class="fa fa-edit"></i> </span>
                            </a> 
                        </div>

                        <div class="col-2">
                             <form action="{{ route('payment_methods.destroy', $PaymentMethod->id)}}" method="post">
                              @csrf
                              @method('DELETE')
                              <button class="btn btn-outline-danger btn-sm" title="Delete" type="submit"><span><i class="fa fa-trash"></i></button>
                            </form>
                        </div>

                      </div>

                    </td>
                  </tr>

    <!-- Edit Account Modal  -->
        <div class="modal fade" id="modaleditpaymentmethod{{ $PaymentMethod->id }}" tabindex="-1">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h4 class="modal-title">Edit Payment method</h4>
              <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
              </button>
            </div>
            <div class="modal-body">
          <form id="edit-form" action="{{ route('payment_methods.update', $PaymentMethod->id) }}" method="POST">
              @csrf
              {{ method_field('PATCH')}}

              <input type="hidden" name="id" value="{{ $PaymentMethod->id }}" >
            
                    <div class="form-group mb-3">
                <span class="has-float-label">
                <input class="form-control" name="name" type="text" value="{{ $PaymentMethod->name}}"/>
                <label for="payment_method" class="label">Payment method</label>
                <div class="form-group">
                     @if ($errors->has('payment_method'))
                        <span class="text-danger">{{ $errors->first('payment_method') }}</span>
                     @endif
                </div> 
                </span>
              </div>

              <div class="form-group input-group">
                  <span class="has-float-label">
                  <textarea class="form-control" id="notes" rows="3" placeholder="Enter notes" name="notes">{{ $PaymentMethod->notes}}"</textarea>
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
              <button type="submit" class="btn btn-success btn-block btn-sm" id="updateaccount">Update Payment method</button>
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
                    <th>Payment method name</th>
                    <th>Notes</th>
                    <th>Action</th>
                  </tr>
                  </tfoot>
                </table>
              
           
            </div>
      
    </div>

@endsection