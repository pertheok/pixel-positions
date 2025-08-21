<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Greeter extends Component
{
    public $name = 'John';

    public function changeName($newName) {
        $this->name = $newName;
    }

    public function render()
    {
        return view('livewire.greeter');
    }
}
