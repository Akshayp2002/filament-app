<?php

namespace App\Filament\Resources\CustomerResource\Pages;

use App\Filament\Resources\CustomerResource;
use Filament\Actions;
use Filament\Resources\Components\Tab;
use Filament\Resources\Pages\ListRecords;
use Illuminate\Database\Eloquent\Builder;

class ListCustomers extends ListRecords
{
    protected static string $resource = CustomerResource::class;

    protected function getHeaderActions(): array
    {
        return [
            Actions\CreateAction::make(),
        ];
    }

    public function getTabs(): array
    {
        return [
            'All' => Tab::make()
            ->icon('heroicon-m-user-group'),
            'Male' => Tab::make()
            ->modifyQueryUsing(fn(Builder $query) => $query->where('gender',1))
                ->icon('heroicon-m-user'),
            'Female' => Tab::make()
            ->modifyQueryUsing(fn (Builder $query) => $query->where('gender', 2))
                ->icon('heroicon-m-user')
        ];
    }
}
