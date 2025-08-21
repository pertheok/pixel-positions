<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Greeter extends Component
{
    public $name = 'John';

    public function render()
    {
        return view('livewire.greeter');
    }
}
