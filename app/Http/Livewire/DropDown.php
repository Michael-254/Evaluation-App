<?php

namespace App\Http\Livewire;

use App\Models\DropData;
use Livewire\Component;

class DropDown extends Component
{
    public $type, $dropdown_item;

    public function save()
    {
        $validated = $this->validate([
            'type' => 'required',
            'dropdown_item' => 'required',
        ]);

        DropData::create($validated);

        $this->reset();
    }

    public function remove($id)
    {
        DropData::whereId($id)->delete();
    }

    public function render()
    {
        return view('livewire.drop-down',[
           'dropdowns' => DropData::orderBy('id','desc')->paginate(10)
        ]);
    }
}
