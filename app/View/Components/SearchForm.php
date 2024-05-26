<?php

namespace App\View\Components;

use App\Models\Position;
use App\Models\Region;
use Illuminate\View\Component;

class SearchForm extends Component
{
    public function render()
    {
        return view('components.search-form',[
            'regions' => Region::all(),
            'positions' => Position::all()
        ]);
    }
}
