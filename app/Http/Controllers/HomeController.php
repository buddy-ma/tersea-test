<?php

namespace App\Http\Controllers;

use App\Models\Company;
use App\Models\Employe;
use App\Models\Invitation;
use Illuminate\Http\Request;
use App\Rules\PhoneValidation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Redirect;

class HomeController extends Controller
{
    public function index()
    {
        return view('employe.mains.index');
    }

    public function home()
    {
        if (Auth::user()->status == 0) {
            return view('employe.mains.wait');
        } else {
            return view('employe.mains.home');
        }
    }

    public function invitation($id)
    {
        $invitation = Invitation::findOrFail($id);
        if ($invitation->isCanceled == 1 || $invitation->isOpen == 1) {
            return redirect('/employe')->with('error', 'This link has expired');
        } else {
            $invitation->isOpen = 1;
            $invitation->save();
            return view('employe.mains.invitation', ['invitation' => $invitation]);
        }
    }

    public function invitationRegister(Request $request)
    {
        $request->validate([
            'fullname' => 'required|string|min:3',
            'email' => 'required|email|min:5|unique:employes',
            'phone' => ['required', 'digits:10', 'unique:employes', new PhoneValidation()],
            'address' => 'required|string|min:4',
            'date_naissance' => 'required|date',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $employe = new Employe();
        $employe->company_id = $request->company_id;
        $employe->fullname = $request->fullname;
        $employe->email = $request->email;
        $employe->phone = $request->phone;
        $employe->address = $request->address;
        $employe->date_naissance = $request->date_naissance;
        $employe->password = Hash::make($request->password);
        $employe->status = 0;
        $employe->save();

        return Redirect::to("employe/home")->with('success', 'We received your informations, we will contact you soon !');
    }

    public function profile()
    {
        $profile = Auth::user();
        return view('employe.mains.profile', ['profile' => $profile]);
    }

    public function profileUpdate(Request $request)
    {
        $id = Auth::guard('employe')->id();
        $request->validate([
            'fullname' => 'required|string|min:3',
            'email' => "required|email|min:5|unique:employes,email,$id,id",
            'phone' => ['required', 'digits:10', "unique:employes,phone,$id,id", new PhoneValidation()],
            'address' => 'required|string|min:4',
            'date_naissance' => 'required|date',
            'password' => 'nullable|string|min:6|confirmed',
        ]);

        $employe = Auth::guard('employe')->user();
        $employe->fullname = $request->fullname;
        $employe->email = $request->email;
        $employe->phone = $request->phone;
        $employe->address = $request->address;
        $employe->date_naissance = $request->date_naissance;
        if (isset($request->password)) {
            $employe->password = Hash::make($request->password);
        }
        $employe->save();

        return Redirect::back()->with('success', 'Saved successfully');
    }

    public function company()
    {
        $company_id = Auth::user()->company_id;
        $company = Company::find($company_id);
        return view('employe.mains.company', ['company' => $company]);
    }
}
