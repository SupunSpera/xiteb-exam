<?php

namespace App\Http\Livewire;

use App\Models\Quotation;
use domain\Facades\Notifications\NotificationFacade;
use domain\Facades\Quotations\QuotationFacade;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class QuotationDataTable extends DataTableComponent
{
    protected $listeners = ['deleteData', 'acceptQuotation', 'rejectQuotation'];
    public function query(): Builder
    {
        if (Auth::user()->user_role == 2) {

            return Quotation::query()->where('user_id', Auth::user()->id);
        } else {
            return Quotation::query();
        }
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function columns(): array
    {
        return [
            Column::make('ID', 'id')
                ->searchable()
                ->sortable(),
            Column::make('Drugs', 'id')
                ->searchable()
                ->format(function ($status, $column, $quotation) {
                    return $this->getQuotationDrugs($quotation);
                })
                ->sortable()
                ->asHtml(),
            Column::make('Status', 'status')
                ->searchable()
                ->format(function ($status) {
                    return $this->getStatus($status);
                })
                ->sortable()
                ->asHtml(),

            Column::make('Actions', 'id')->format(function ($id) {
                return view('pages.pharmacy-user.quotations.components.actions', ['id' => $id]);
            }),
        ];
    }

    public function getQuotationDrugs($quotation)
    {
        $response['quotation'] = $quotation;
        return view('pages.pharmacy-user.quotations.components.quotation-drugs')->with($response);
    }
    /**
     * changeStatus
     *
     * @param  mixed $id
     * @return void
     */
    public function acceptQuotation($id)
    {
        NotificationFacade::make([
            'title' => "Quotation Notification",
            'description' => 'Quotation Accepted By User',
        ]);
        QuotationFacade::acceptQuotation(QuotationFacade::get($id));
        $this->dispatchBrowserEvent('live-alert', [
            "type" => "success",
            "msg" => 'Article Category Status Changed Successfully !'
        ]);
    }
    /**
     * changeStatus
     *
     * @param  mixed $id
     * @return void
     */
    public function rejectQuotation($id)
    {
        QuotationFacade::rejectQuotation(QuotationFacade::get($id));
        $this->dispatchBrowserEvent('live-alert', [
            "type" => "success",
            "msg" => 'Article Category Status Changed Successfully !'
        ]);
        NotificationFacade::make([
            'title' => "Quotation Notification",
            'description' => 'Quotation Rejected By User',
        ]);
    }

    public function getStatus($status)
    {
        switch ($status) {
            case Quotation::STATUS['PENDING']:
                return "<span class=' badge bg-warning'>Pending</span>";
                break;
            case Quotation::STATUS['ACCEPTED']:
                return "<span class='badge bg-primary'>Accepted</span> ";
                break;
            case Quotation::STATUS['REJECTED']:
                return "<span class='badge bg-danger'>Rejected</span> ";
                break;
        }
    }
}
