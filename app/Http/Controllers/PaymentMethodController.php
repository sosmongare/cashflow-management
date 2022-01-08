<?php

namespace App\Http\Controllers;

use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use Session;
use DB;

class PaymentMethodController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $PaymentMethods=PaymentMethod::all();
        return view('administration.payment_method',['PaymentMethods'=>$PaymentMethods]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate(['name'=>'required']);
        $store=PaymentMethod::create($request->all());

         if ($store) {
            Session::flash('success','Payment method added successfully!'); //<--FLASH MESSAGE
            return redirect()->route("payment_methods.index");
        }else{
            Session::flash('fail','Payment method not added!'); //<--FLASH MESSAGE
            return redirect()->route("payment_methods.index");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function show(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function edit(PaymentMethod $paymentMethod)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PaymentMethod $paymentMethod)
    {
        //
        $update = ['name' => $request->name,'notes' => $request->notes ];

        $update=PaymentMethod::where('id',$request['id'])->update($update);
        
        if ($update) {
            # code...
            Session::flash('success','Payment method updated successfully!'); //<--FLASH MESSAGE
            return redirect()->route("payment_methods.index");
        }else{
            Session::flash('fail','Payment method not updated!'); //<--FLASH MESSAGE
            return redirect()->route("payment_methods.index");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PaymentMethod  $paymentMethod
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $delete = PaymentMethod::find($id);
        $execute = $deleted->delete();
        if($execute){
            Session::flash('success','Payment method deleted successfully!'); //<--FLASH MESSAGE
            return redirect()->route("payment_methods.index");
        }
        else{
             Session::flash('fail','Oops! Payment method not deleted!'); //<--FLASH MESSAGE
            return redirect()->route("payment_methods.index");
        }
    }
}
