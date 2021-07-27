<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        // $userid= \Auth::id();
        return view('home');
    }

    public function view()
    {

        // $user= Auth::id();

        return view('view');
    }

    public function update()
    {

        return view('update');

    }

    public function saveUpdate(Request $request, $id)
    {

        $user = User::find($id);
        $validated = $request->validate([
            'name' => 'required',
            'email' => 'required',
            // 'v1\.0' => 'required'
        ]);
        $user->name = $request['name'];
        $user->email = $request['email'];
        $user->save();
        return redirect('view');

    }

    public function resetpassword(Request $request, $id)
    {
        return view('resetpassword');
    }

    public function savepassword(Request $request, $id)
    {
        $user = User::find($id);
        $password = $request->input('password');
        $hashed = Hash::make($password);
        $user->password = $hashed;
        $user->save();
        return redirect('password-confirmation');

    }

    public function confirmpassword()
    {
        return view('password-confirmation');
    }

    public function adminHome()
    {
        return view('adminHome');
    }

}
