<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Greeter extends Component
{
    public $name = '';
    public $greeting = '';

    public function changeName() {
        
    }

    public function render()
    {
        return view('livewire.greeter');
    }
}
