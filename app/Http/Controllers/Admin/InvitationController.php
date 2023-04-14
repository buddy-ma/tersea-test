<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\History;
use App\Models\Invitation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvitationController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|min:4',
            'email' => 'required|email|min:5|unique:invitations',
        ]);

        $invitation = new Invitation();
        $invitation->company_id = $request->input('company_id');
        $invitation->title = $request->input('title');
        $invitation->email = $request->input('email');
        $invitation->save();
        History::create([
            'user_id' => Auth::guard('web')->id(),
            'action' => 'a ajouté une invitation '. $invitation->title .' a la societe '.$invitation->company->title,
            'link' => '/admin/companies/'.$request->input('company_id')
        ]);
        session()->flash('success','Invitation has been sent successfully');
        return redirect('admin/companies/'.$request->input('company_id')); 
    }

    public function close($id)
    {
        $invitation = Invitation::find($id);
        $invitation->isCanceled = 1;
        $invitation->save();
        History::create([
            'user_id' => Auth::guard('web')->id(),
            'action' => 'a annulé l\'invitation '. $invitation->title,
            'link' => '/admin/invitations'
        ]);
        session()->flash('success','Employe has been added successfully');
        return redirect('admin/invitations'); 
    }
}