<?php

namespace App\Http\Livewire;

use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class UserDatatable extends LivewireDatatable
{
    public $model = User::class;

    function columns()
    {
    	return [
    		NumberColumn::name('id')->label('ID')->sortBy('id'),
    		Column::name('name')
                ->label('Name')
                ->editable(),
    		Column::name('email')
                ->label('Email Address')
                ->editable(),
    		DateColumn::name('created_at')->label('Creation Date'),
            Column::delete(),
    	];
    }
}
