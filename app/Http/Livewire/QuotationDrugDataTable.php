<?php

namespace App\Http\Livewire;

use App\Models\QuotationDrug;
use App\Notifications\SendQuotation;
use domain\Facades\Quotations\QuotationFacade;
use Livewire\Component;

class QuotationDrugDataTable extends Component
{
    protected $listeners = ['deleteData', 'quotationId', 'sendQuotation'];
    public $q_id = null;
    public $quotation_drugs = [];
    public $total = 0;
    public $prescription;
    public $quotation;

    public function mount()
    {
        $this->quotation = QuotationFacade::getByPrescription($this->prescription->id);
        if ($this->quotation) {
            $this->quotation_drugs = QuotationDrug::where('quotation_id', $this->quotation->id)->get();
            foreach ($this->quotation_drugs as $drug) {
                $this->total +=  $drug->quantity * $drug->drug->price;
            }
            QuotationFacade::update(QuotationFacade::get($this->quotation->id), [
                'total' => $this->total,
            ]);
        }
    }
    public function quotationId($id)
    {
        $this->total = 0;
        $this->quotation = QuotationFacade::get($id);
        if ($this->quotation) {
            $this->quotation_drugs = QuotationDrug::where('quotation_id', $this->quotation->id)->get();
            foreach ($this->quotation_drugs as $drug) {
                $this->total +=  $drug->quantity * $drug->drug->price;
            }
            QuotationFacade::update(QuotationFacade::get($this->quotation->id), [
                'total' => $this->total,
            ]);
        }
    }

    /**
     * render
     *
     * @return view
     */
    public function render()
    {
        return view('pages.pharmacy.quotations.components.quotation-drugs');
    }

    public function sendQuotation()
    {
        if ($this->quotation) {
            $this->quotation->user->notify(new SendQuotation($this->quotation));
        }
    }
}
