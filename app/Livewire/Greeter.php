<?php

namespace App\Livewire;

use App\Models\Greeting;
use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Greeter extends Component
{
    #[Validate('required|min:2')]
    public $name = '';

    public $greeting = '';
    public $greetings = [];
    public $greetingMessage = '';

    public function changeGreeting() {
        $this->reset('greetingMessage');

        $this->validate(); // <- empty validate() method utilises the rules() method or the valdiate attribute

        $this->greetingMessage = "{$this->greeting}, {$this->name}!";
    }

    public function mount() // Used to load data from the database from example
    {
        $this->greetings = Greeting::all();
    }

    public function updated($property, $value)
    {
        // if($property === 'name')
        // {
        //     $this->name = strtolower($value);
        // }
    }

    public function updatedName($value) // updatedPROPERTY - method specific for updating the PROPERTY
    {
        $this->name = strtolower($value);
    }

    // public function rules()
    // {
    //     return [
    //         'name' => 'required|min:2'
    //     ];
    // }

    public function render()
    {
        return view('livewire.greeter');
    }
}
