<?php

namespace App\Http\Livewire;

use App\Models\Drug;
use App\Models\QuotationDrug;
use domain\Facades\Quotations\QuotationFacade;
use Illuminate\Support\Facades\Session;
use Livewire\Component;

class CreateQuotation extends Component
{
    public $drugs;
    public $quantity;
    public $selected_drug;
    public $quotation = null;
    public $prescription;
    public function render()
    {
        return view('pages.pharmacy.quotations.components.create-quotation');
    }

    public function mount()
    {
        $this->drugs = Drug::all();
    }

    public function submit()
    {
        $this->quotation = QuotationFacade::getByPrescription($this->prescription->id);
        $total = $this->calculateTotal($this->selected_drug);
        if ($this->quotation == null) {
            $this->quotation = QuotationFacade::make([
                'user_id' => $this->prescription->user->id,
                'prescription_id' => $this->prescription->id,
                'total' => $total,

            ]);
            QuotationDrug::create([
                'quotation_id' => $this->quotation->id,
                'drug_id' => $this->selected_drug,
                'quantity' => $this->quantity,
            ]);
            $this->emit('quotation_id', $this->quotation->id);
        }
        $quotation_drug = QuotationDrug::where('quotation_id', $this->quotation->id)->where('drug_id', $this->selected_drug)->first();
        if ($quotation_drug) {
            Session::flash('alert-danger', 'This Drug Already Added For this quotation');
        } else {
            QuotationDrug::create([
                'quotation_id' => $this->quotation->id,
                'drug_id' => $this->selected_drug,
                'quantity' => $this->quantity,
            ]);
            $this->emit('quotationId', $this->quotation->id);
        }
    }

    /**
     * calculateTotal
     *
     * @param  mixed $selected_drug
     * @return void
     */
    public function calculateTotal($selected_drug)
    {
        $drug = Drug::where('id', $selected_drug)->first();
        $drug_price = $drug->price * $this->quantity;
        return $drug_price;
    }
}
