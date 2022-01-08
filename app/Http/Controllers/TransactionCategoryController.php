<?php

namespace App\Http\Controllers;

use App\Models\TransactionCategory;
use Illuminate\Http\Request;
use Session;
use DB;

class TransactionCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $TransactionCategories=TransactionCategory::all();
        return view('administration.transaction_category',['TransactionCategories'=>$TransactionCategories]);
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
        $request->validate(['name' => 'required','type' => 'required']);
        $store=TransactionCategory::create($request->all());

        if ($store) {
            Session::flash('success','Transaction category added successfully!'); //<--FLASH MESSAGE
            return redirect()->route("transaction_category.index");
        }else{
            Session::flash('fail','Transaction category not added!'); //<--FLASH MESSAGE
            return redirect()->route("transaction_category.index");
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\TransactionCategory  $transactionCategory
     * @return \Illuminate\Http\Response
     */
    public function show(TransactionCategory $transactionCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\TransactionCategory  $transactionCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(TransactionCategory $transactionCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\TransactionCategory  $transactionCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, TransactionCategory $transactionCategory)
    {
        $update = ['name' => $request->name,'type' => $request->type,'notes' => $request->notes ];

        $update=TransactionCategory::where('id',$request['id'])->update($update);
        
        if ($update) {
            # code...
            Session::flash('success','Transaction category updated successfully!'); //<--FLASH MESSAGE
            return redirect()->route("transaction_category.index");
        }else{
            Session::flash('fail','Transaction category not updated!'); //<--FLASH MESSAGE
            return redirect()->route("transaction_category.index");
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\TransactionCategory  $transactionCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $deletetransactioncategory = TransactionCategory::find($id);
        $execute = $deletetransactioncategory->delete();
        if($execute){
            Session::flash('success','Transaction category deleted successfully!'); //<--FLASH MESSAGE
            return redirect()->route("transaction_category.index");
        }
        else{
             Session::flash('fail','Oops! Transaction category not deleted!'); //<--FLASH MESSAGE
            return redirect()->route("transaction_category.index");
        }
    }
}
