<?php

namespace App\Http\Livewire;

use App\Models\Post;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;

class PostDatatable extends LivewireDatatable
{
    public $model = Post::class;

    function columns()
    {
    	return [
    		NumberColumn::name('id')->label('ID')->sortBy('id'),
    		Column::name('body')
                ->label('body')
                ->editable(),
    		Column::name('user.name')
                ->label('Created By')
                ->editable(),
    		DateColumn::name('created_at')->label('Creation Date'),
            Column::delete(),
    	];
    }
}
