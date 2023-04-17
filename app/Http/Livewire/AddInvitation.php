<?php

namespace App\Http\Livewire;

use App\Models\History;
use App\Models\Invitation;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class AddInvitation extends Component
{
    public $company_id, $title, $email, $link;
    protected $listeners = ['addInvitation'];
    
    public function mount($company_id)
    {
        $this->company_id = $company_id;
    }
    public function render()
    {
        return view('livewire.add-invitation');
    }

    public function addInvitation()
    {
        $this->validate([
            'title' => 'required|string|min:4',
            'email' => 'required|email|min:5|unique:invitations',
        ]);

        $invitation = new Invitation();
        $invitation->company_id = $this->company_id;
        $invitation->title = $this->title;
        $invitation->email = $this->email;
        $invitation->save();
        History::create([
            'user_id' => Auth::guard('web')->id(),
            'action' => 'a invite l\'employe ' . $invitation->title . ' a la societe ' . $invitation->company->title,
            'link' => '/admin/companies/show/' . $this->company_id
        ]);

        $this->link = 'http://localhost:8000/invitation/'. $invitation->id;

        $this->dispatchBrowserEvent('saved');
    }
}