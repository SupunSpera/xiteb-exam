<?php

namespace App\Http\Livewire;

use App\Models\Prescription;
use App\Traits\PrescriptionHelper;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class PrescriptionDataTable extends DataTableComponent
{
    use PrescriptionHelper;
    protected $listeners = ['deleteData'];
    public function query(): Builder
    {
        return Prescription::query();
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
            Column::make('Note', 'note')
                ->searchable()
                ->sortable(),
            Column::make('Delivery Address', 'delivery_address')
                ->searchable()
                ->sortable(),
            Column::make('Delivery Time', 'delivery_time')
                ->searchable()
                ->sortable(),
            Column::make('Actions', 'id')->format(function ($id) {
                return view('pages.pharmacy-user.prescription.components.actions', ['id' => $id]);
            }),
        ];
    }
}
