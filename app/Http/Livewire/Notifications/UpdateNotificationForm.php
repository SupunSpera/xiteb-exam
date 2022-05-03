<?php

namespace App\Http\Livewire\Notifications;

use Livewire\Component;
use Carbon\Carbon;
use domain\Facades\Notifications\NotificationFacade;

class UpdateNotificationForm extends Component
{
    public $title, $description, $link, $send_time, $notification;
    protected $listeners = ['setSendTime' => 'setSendTimeFormat'];
    public function render()
    {
        return view('pages.notifications.components.update-notification-form');
    }

    public function mount()
    {
        $this->title = $this->notification->title;
        $this->description = $this->notification->description;
        $this->link = $this->notification->link;
        $this->send_time = $this->notification->send_time;
    }

    protected function rules()
    {
        return [
            'title' => 'required',
            'description' => 'required',
        ];
    }

    protected $messages = [
        'title.required' => 'Please Enter Notification Title',
        'description.required' => 'Please Enter Notification Description',
    ];

    /**
     * updated
     *
     * @param  mixed $propertyName
     * @return void
     */
    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function submit()
    {
        $data = $this->validate();
        $data['send_time'] = $this->send_time;
        $data['link'] = $this->link;
        NotificationFacade::update($this->notification, $data);
        return redirect()->route('notifications.index')->with('alert-success', 'Notification Updated Successfully');
    }


    public function setSendTimeFormat($dateText)
    {
        $this->send_time = Carbon::parse($dateText)->format('Y-m-d H:m:s');
    }
}
