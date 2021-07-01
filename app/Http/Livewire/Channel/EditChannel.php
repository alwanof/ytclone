<?php

namespace App\Http\Livewire\Channel;

use Livewire\Component;

class EditChannel extends Component
{
    public $name = 'Murad';
    public function render()
    {
        return view('livewire.channel.edit-channel');
    }
    public function submit()
    {
        dd('ok!');
    }
}
