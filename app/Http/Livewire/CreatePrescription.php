<?php

namespace App\Http\Livewire;

use domain\Facades\Image\ImageFacade;
use domain\Facades\Prescription\PrescriptionFacade;
use domain\Facades\Prescription\PrescriptionImageFacade;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class CreatePrescription extends Component
{
    use WithFileUploads;
    public $images = [];
    public $note;
    public $delivery_address;
    public $delivery_time;
    public function render()
    {
        return view('pages.pharmacy-user.prescription.components.create-prescription');
    }


    /**
     * rules
     *
     * @return array
     */
    protected function rules()
    {
        return [
            'images.*' => 'image|max:1024',
            'note' => 'required',
            'delivery_address' => 'required',
            'delivery_time' => 'required',
        ];
    }
    /**
     * messages
     *
     * @var array
     */
    protected $messages = [
        'note.required' => 'Please Enter Prescription Note',
        'delivery_address.required' => 'Please Enter Delivery Address',
        'delivery_time.required' => 'Please Enter Delivery Time',
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
        $data['user_id'] = Auth::user()->id;
        $prescription =  PrescriptionFacade::make($data);
        foreach ($data['images'] as $key => $image) {
            $path = $image->store('media', 'public');
            $path_parts = explode("media/", $path);
            $created_image = ImageFacade::make([
                'name' => $path_parts[1],
                'url' => $path
            ]);
            PrescriptionImageFacade::make([
                'image_id' => $created_image->id,
                'prescription_id' => $prescription->id,
            ]);
        }
        return redirect()->route('prescription.index')->with('alert-success', 'Prescription Created Successfully');
    }
}
