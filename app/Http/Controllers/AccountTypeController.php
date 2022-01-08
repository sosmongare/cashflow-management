<?php

namespace App\Http\Controllers;

use App\Models\account_type;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Session;
use DB;

class AccountTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $account_types= account_type::all();
        return view('administration.account_type',['account_types'=>$account_types]);
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
        //
        $request->validate(['account_type' => 'required']);
        $store=account_type::create($request->all());

        if ($store) {
            Session::flash('success','Account created successfully!'); //<--FLASH MESSAGE
            return redirect()->route("account_type.index");
        }else{
            Session::flash('fail','Account not created!'); //<--FLASH MESSAGE
            return redirect()->route("account_type.index");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\account_type  $account_type
     * @return \Illuminate\Http\Response
     */
    public function show(account_type $account_type)
    {
         $account_types = Accounccount_type::where('id',$id)->get();
         return view('administration.account_type', ['data'=>$account_types]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\account_type  $account_type
     * @return \Illuminate\Http\Response
     */
    public function edit(account_type $account_type)
    {
        //
       
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\account_type  $account_type
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, account_type $account_type)
    {
        //
         $update = ['account_type' => $request->account_type ];

        $update=account_type::where('id',$request['id'])->update($update);
        //dd($request['id']);
        //dd($request->all());
        if ($update) {
            # code...
            Session::flash('success','Account type updated successfully!'); //<--FLASH MESSAGE
            return redirect()->route("account_type.index");
        }else{
            Session::flash('fail','Account type not updated!'); //<--FLASH MESSAGE
            return redirect()->route("account_type.index");
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\account_type  $account_type
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $deleteaccounttype = Account_type::find($id);
        $fire = $deleteaccounttype->delete();
        if($fire){
            Session::flash('success','Account type deleted successfully!'); //<--FLASH MESSAGE
            return redirect()->route("account_type.index");
        }
        else{
             Session::flash('fail','Oops! Account type not deleted!'); //<--FLASH MESSAGE
            return redirect()->route("account_type.index");
        }
    }
}
