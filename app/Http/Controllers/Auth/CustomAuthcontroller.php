<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Validator;
class CustomAuthcontroller extends Controller
{
    public function adults(){
        return view('customAuth.index');
    }
    public function site(){
        return view('customAuth.site');
    }
    public function admin(){
        return view('customAuth.admin');
    }
    public function adminlogin(){
        return view('auth.adminlogin');
    }
    public function CheckaAminLogin(Request $request){
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);

        if (Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password])) {

            return redirect()->intended('/admin');
        }
        return back()->withInput($request->only('email'));
    }
}
