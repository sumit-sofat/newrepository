<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserUpdateRequest;
use App\Models\User;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    public function showProfile()
    {

        return view('profile.profile');
    }

    public function editProfile()
    {
        return view('profile.editProfile');
    }

    public function updateProfile(UserUpdateRequest $request)
    {
        //     $validated = $request->validate([
        //         'name' => 'required|min:3',
        //         'lastName' => 'required|min:3',
        //         'email' => 'email:rfc,dns'
        //     ],

        // );
        // $validator =Validator::make($request->all() ,
        //     [
        //         'name' => 'required|min:3',
        //         'lastName' => 'required|min:3',
        //         'email' => 'email:rfc,dns'
        //     ],
        //     [
        //         'name.required'=>'First Name Should not Blank.',
        //         'name.min'=>'Name must have minimum 3 chracters.',
        //         'lastName.required'=>'Last Name Should not Blank.',
        //         'lastName.min'=>'Last Name must have minimum 3 chracters.'
        //     ]);

        //     if ($validator->fails()) {
        //         return redirect('edit/profile')
        //                     ->withErrors($validator)
        //                     ->withInput();
        //     }

        $user = Auth::user();
        $userName = $user->name;
        $userLname = $user->last_name;
        $userEmail = $user->email;
        $user->name = $request->input('name');
        $user->last_name = $request->input('lastName');
        $user->email = $request->input('email');

        $user->update();

        // if ($userName != $request->input('name') || $userLname != $request->input('lastName') || $userEmail != $request->input('email')) {
        //     Mail::to($user->email)->send(new TestMail($user));
        // }

        return redirect('profile');

    }

    public function show()
    {

        return view('admin.adminProfile');
    }

    public function edit()
    {
        return view('admin.editAdminProfile');
    }

    public function updateAdminProfile(UserUpdateRequest $request)
    {
        $user = Auth::user();
        $userName = $user->name;
        $userLname = $user->last_name;
        $userEmail = $user->email;
        $user->name = $request->input('name');
        $user->last_name = $request->input('lastName');
        $user->email = $request->input('email');

        $user->update();
        return redirect()->route('admin.profile');
    }
}
