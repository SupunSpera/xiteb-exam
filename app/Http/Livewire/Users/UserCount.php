<?php

namespace App\Http\Livewire\Users;

use App\Models\User;
use Livewire\Component;

class UserCount extends Component
{
    public $userCount;

    public function render()
    {
        return view('pages.users.components.user-count');
    }

    public function mount()
    {
        $this->userCount = User::where('user_role', 2)->count();
    }
}
