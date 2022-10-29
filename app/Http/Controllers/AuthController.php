<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Client\Response;
use Illuminate\Support\Facades\View;
use Session;
use Illuminate\Pagination\LengthAwarePaginator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{

    public function index(Request $request)
    {
        return view('login.index');
    }

    public function process_login(Request $request){

        $validator = $this->validate($request, [
            'email' => 'required',
            'password' => 'required'
        ]);

        $email = $request->email;
        $password = $request->password;

        $status_user = User::where(['email' => $email,'status_user' => 'active'])->first();
        
        if (!$status_user) {
            return response()->json(['success' => false, 'http_code' => 404, 'message' => 'Account tidak active'], 404);
        }

        if (empty($email) or empty($password)) {
            return response()->json(['status' => 'error', 'message' => 'You must fill all the fields']);
        }

        $credentials = request(['email', 'password']);

        if (!$token = auth()->attempt($credentials)) {
            return response()->json(['error' => 'Unauthorized', 'message' => 'Unauthorized'], 401);
        }

        Session::put('id_user',auth()->user()->id);

        return redirect('admin/dashboard')
            ->withInput()
            ->withErrors(['login_gagal' => 'These credentials do not match our records.']);
    }

    public function logout(){
        auth()->logout();
        return redirect()->route('get-auth'); 
    }

    public function error404(){

        return view('error.error-404'); 
    }

    public function listUser(){
        $table = User::orderBy('create_date','DESC')->paginate();

        return view('profile.list-user',compact('table'));
    }

}
