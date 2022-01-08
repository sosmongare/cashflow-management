<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use DateTime;
use Illuminate\Support\Facades\Auth;
use Session;
use App\Models\User;
use Hash;



class AuthController extends Controller
{
    /**
     * Write code on Method
     *
     * @return response()
     */

    public function index(){
    	 return view('auth.login');
    }

    public function registration(){
    	return view('auth.registration');
    }

    public function postLogin(Request $request)
    {

    	//validation
    	$request->validate([
    		'email' => 'required',
    		'password' => 'required',
    	]);

    	//Store email and password into variable and check if it matches
    	$credentials = $request->only('email', 'password');
    	if (Auth::attempt($credentials)) {
    		# code...
    		 Auth::user()->last_login = new DateTime;
             Auth::user()->save();
             Session::flash('success','You have logged In successfully!'); //<--FLASH MESSAGE
            return redirect()->route("dashboard");
    	}
    	return redirect("/")->withSuccess('Opps! You have entered invalid credential');
    }

     public function postRegistration(Request $request)
     {
     	$request->validate([
     		'name' => 'required',
     		'email' => 'required|email|unique:users',
     		'password' => 'required|min:6',
     	]);


     	$data = $request->all();
     	$check = $this->create($data);

     	return redirect("registration")->withSuccess("Great, You have successfully registered");

		}

     public function dashboard()
     {
     	if (Auth::check()) {
     		# If user is authenticated, take him to dashboard
     		return view('dashboard');
     	}

     	return redirect("/")->withSuccess('Access denied');
     }


    public function create(array $data)
     {
     	return User::Create([
     		'name'=> $data['name'],
     		'email'=> $data['email'],
     		'password'=> Hash::make($data['password']),
     	]);
     }

    public function logout()
     {
     	Session::flush();
     	Auth::logout();

     	return Redirect('/');
     }

    public function users()
    {
        return view('users');
    }


}
