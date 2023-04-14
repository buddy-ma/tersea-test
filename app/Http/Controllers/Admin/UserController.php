<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    public function User()
    {
        $users = User::orderBy('id','DESC')->get();
        return view('admin.mains-admin.user.user-list')->with("data", ['users' => $users]);
    }

    public function ShowAddUser()
    {
        return view('admin.mains-admin.user.user-add');
    }

    public function UserAdd(Request $request)
    {
        $validator = Validator::make($request->all(), self::RulesAdd());

        $validator->setAttributeNames(self::AttributeNames());
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        $user = User::create([
            'name' => $request->fullname,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ]);

        //history
        History::create([
            'user_id' => Auth::guard('web')->id(),
            'action' => 'a ajouté l\'administrateur '.$user->name,
            'link' => '/admin/admins'
        ]);

        return Redirect::to("admin/admins")->with('success', 'The record has been added successfully');
    }

    public function RulesAdd()
    {
        $rules = array(
            'fullname' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        );
        
        return $rules;
    }

    public function AttributeNames()
    {
        $attributeNames = array(
            'fullname' => 'fullname',
            'email' => "email",
            'password' => "password",
        );

        return $attributeNames;
    }
}