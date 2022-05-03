<?php

namespace App\Http\Livewire\Notifications;

use App\Models\Notification;
use App\Traits\NotificationHelper;
use domain\Facades\Notifications\NotificationFacade;
use Livewire\Component;
use Carbon\Carbon;

class CreateNotificationForm extends Component
{
    use NotificationHelper;
    public $title, $description, $link, $send_time;
    protected $listeners = ['setSendTime' => 'setSendTimeFormat'];
    public function render()
    {
        return view('pages.notifications.components.create-notification-form');
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
        if ($this->send_time == null) {
            $this->send_time =  Carbon::now()->format('Y-m-d H:m:s');
            $data['status'] = Notification::STATUS['PUBLISHED'];
        }
        $data['send_time'] = $this->send_time;
        $data['link'] = $this->link;
        NotificationFacade::make($data);
        return redirect()->route('notifications.index')->with('alert-success', 'Notification Created Successfully');
    }

    public function setSendTimeFormat($dateText)
    {
        $this->send_time = Carbon::parse($dateText)->format('Y-m-d H:m:s');
    }
}
