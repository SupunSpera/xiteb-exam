<?php

namespace App\Http\Livewire\Notifications;

use App\Models\Notification;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Rappasoft\LaravelLivewireTables\DataTableComponent;
use Rappasoft\LaravelLivewireTables\Views\Column;

class NotificationDataTable extends DataTableComponent
{
    public function query(): Builder
    {
        return Notification::query();
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
            Column::make('Title', 'title')
                ->searchable()
                ->sortable(),
            Column::make('Description', 'description')
                ->searchable()
                ->sortable(),
        ];
    }
}
