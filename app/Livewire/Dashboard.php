<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Capacitacion;

class Dashboard extends Component
{
    public function render()
    {
        $capacitaciones = Capacitacion::with('participantes')->get();
        return view('livewire.dashboard', compact('capacitaciones'));
    }
}
