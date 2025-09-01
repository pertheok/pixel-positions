<?php

namespace App\Livewire;

use Livewire\Attributes\Layout;
use Livewire\Component;

#[Layout('components.layouts.admin')]
class AdminComponent extends Component
{
    // public function render() // using computed property makes render() unnecessary in most cases
    // {
    //     return view('livewire.dashboard');
    // }
}
