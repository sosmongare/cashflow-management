<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;
use DB;
class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $data = User::all();
        // $usercount= User::count();
        return view('users.users', ['data'=>$data]);

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //User::create($data);
        //return view('users.create');
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
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:6',
        ]);

        // $data = $request->all();
        // $check = $this->created($data);

        User::create($request->all());
        
        Session::flash('success','User Inserted successfully!'); //<--FLASH MESSAGE

        return redirect()->route("user.index");
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
         $data = User::where('id',$id)->get();
         return view('users.show', ['data'=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        // //
        // $User = Customer::find($id);
        // return response()->json($User);
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
       

        $id = $request->input('id');
        $name = $request->input('name');
        $fire  = user::where('id',$id)
        ->update(
            [
                'name'=>$name, 
            ]

        );
        if($fire){
        Session::flash('success','User updated succesfully!'); //<--FLASH MESSAGE
        return redirect()->route("user.index");
        }
        else{
        Session::flash('fail','Oops! User not updated!'); //<--FLASH MESSAGE
        return redirect()->route("user.index");
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
       
        $deleteuser = User::find($id);
        $fire = $deleteuser->delete();
        if($fire){
            Session::flash('success','User deleted successfully!'); //<--FLASH MESSAGE
            return redirect()->route("user.index");
        }
        else{
            echo "Not Deleted";
        }
    }
}
