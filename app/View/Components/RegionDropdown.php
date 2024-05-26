<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Region;

class RegionDropdown extends Component
{
    public function render()
    {
        return view('components.region-dropdown', [
            'regions' => Region::all()
        ]);
    }
}