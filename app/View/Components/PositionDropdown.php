<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Position;


class PositionDropdown extends Component
{
    public function render()
    {
        return view('components.position-dropdown',[
            'positions' => Position::all()
        ]);
    }
}
