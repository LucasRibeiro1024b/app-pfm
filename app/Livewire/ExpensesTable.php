<?php

namespace App\Livewire;

use App\Models\Expense;
use App\Models\Receipt;
use Filament\Tables;
use Filament\Tables\Columns\TextColumn;
use Filament\Tables\Filters\Filter;
use Filament\Tables\Filters\SelectFilter;
use Filament\Tables\Table;
use Filament\Widgets\TableWidget as BaseWidget;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;

class ExpensesTable extends BaseWidget
{
    public function table(Table $table): Table
    {
        return $table
            ->query(
                Expense::query()->select(
                    'id',
                    'title',
                    'value',
                    'project_id',
                    'payment_date',
                    'end_date'
                )
            )
            ->columns([
                TextColumn::make('title')
                ->sortable()
                ->searchable(),
                TextColumn::make('value')
                ->sortable(),
                TextColumn::make('project.title'),
            ])
            ->filters([
                
            ]);
    }
}
