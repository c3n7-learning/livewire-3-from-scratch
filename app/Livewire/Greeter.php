<?php

namespace App\Livewire;

use App\Models\Greeting;
use Livewire\Attributes\Validate;
use Livewire\Component;

class Greeter extends Component
{
    #[Validate('required|min:2')]
    public $name = '';

    public $greeting = '';

    public $greetingMessage = '';

    public $greetings = [];

    public function mount()
    {
        $this->greetings = Greeting::all();
    }

    public function render()
    {
        return view('livewire.greeter');
    }

    // public function updated($property, $value)
    // {
    //     if ($property === 'name') {
    //         $this->name = strtolower($value);
    //     }
    // }

    public function updatedName($value)
    {
        $this->name = strtolower($value);
    }

    // public function rules()
    // {
    //     return [
    //         'name' => 'required|min:2',
    //     ];
    // }

    public function changeGreeting()
    {
        $this->reset('greetingMessage');
        // $this->greetingMessage = '';

        $this->validate();
        // $this->validate([
        //     'name' => 'required|min:2',
        // ]);

        // $this->validate();

        $this->greetingMessage = "{$this->greeting}, {$this->name}!";
    }
}
