<?php

namespace App\Http\Livewire\Notifications;

use App\Models\Notification;
use Livewire\Component;

class NotificationCount extends Component
{
    public $notificationCount;
    public function render()
    {
        return view('pages.notifications.components.notification-count');
    }

    public function mount()
    {
        $this->notificationCount = Notification::count();
    }
}
