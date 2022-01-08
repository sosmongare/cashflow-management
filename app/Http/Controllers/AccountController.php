<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\Account;
use App\Models\account_type;
use DB;

class AccountController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $data= Account::all();
        $account_types = account_type::all();
        return view('accounts.accounts',['data'=>$data,'account_types'=>$account_types]);
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
        $request->validate([
            'account_name' => 'required',
            'account_number' => 'required',
            'opening_balance' => 'required',
            'account_type' => 'required',
            'account_status' => 'required|min:6'
        ]);

        $fire=Account::create($request->all());
        if ($fire) {
            # code...
            Session::flash('success','Account created successfully!'); //<--FLASH MESSAGE
            return redirect()->route("account.index");
        }
        else{
            Session::flash('fail','Oops! Account not created!'); //<--FLASH MESSAGE
            return redirect()->route("account.index");
        }
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //\
        $data = Account::where('id',$id)->get();

        return view('accounts.show', ['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $update =['account_name' => $request->account_name,
        'account_number' => $request->account_number,
        'opening_balance' => $request->opening_balance,
        'description' => $request->description,
        'account_type' => $request->account_type,
        //'account_status'=> $request->account_status
        ];

        $update=Account::where('id',$request['id'])->update($update);
        //dd($request['id']);
        //dd($request->all());
        if ($update) {
            # code...
            Session::flash('success','Account updated successfully!'); //<--FLASH MESSAGE
            return redirect()->route("account.index");
        }else{
            Session::flash('fail','Account not updated!'); //<--FLASH MESSAGE
            return redirect()->route("account.index");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $deleteuser = Account::find($id);
        $fire = $deleteuser->delete();
        if($fire){
            Session::flash('success','Account deleted successfully!'); //<--FLASH MESSAGE
            return redirect()->route("account.index");
        }
        else{
             Session::flash('fail','Oops! Account not deleted!'); //<--FLASH MESSAGE
            return redirect()->route("account.index");
        }
    }
}
