<?php

namespace App\View\Components;

use Closure;
use App\Models\Region;
use App\Models\wineType;
use Illuminate\View\Component;
use Illuminate\Contracts\View\View;

class Navigation extends Component
{
    public $regions;
    public $wineTypes;
    /**
     * Create a new component instance.
     */
    public function __construct()
    {
        $this->regions = Region::orderBy('name','asc')->get();
        $this->wineTypes = WineType::orderBy('type', 'asc')->get();
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.navigation',['regions'=> $this->regions, 'wineTypes'=>$this->wineTypes]);
    }
}
