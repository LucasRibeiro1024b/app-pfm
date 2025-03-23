<?php

namespace App\Livewire;

use App\Models\Expense;
use App\Models\Receipt;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;

class FinancesTable extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Expense::query(),
                Receipt::query()

            )
            ->columns([
                TextColumn::make('title')
                ->searchable(),
                TextColumn::make('value'),
                TextColumn::make('type'),
            ]);
    }
}
