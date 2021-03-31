<?php

namespace App\Http\Livewire;

use App\Http\Middleware\User;
use Livewire\Component;

class Counters extends Component
{
    public $number = 0;

    public function render()
    {
        return view('livewire.counters', ['number' => $this->number]);
    }

    public function increment()
    {
        // dd("tambah");
        $this->number = $this->number + 1;

    }

    public function decrement()
    {
        // dd("tolak");
        $this->number = $this->number - 1;
    }
}
