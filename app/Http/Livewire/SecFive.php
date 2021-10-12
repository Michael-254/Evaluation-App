<?php

namespace App\Http\Livewire;

use App\Models\SectionFive;
use Livewire\Component;

class SecFive extends Component
{
    public $proposed_objective, $department_linked, $objective_measurement, $steps_to_achieve,$completion_date;

    public function save()
    {

        $validated_data = $this->validate([
            'proposed_objective' => 'required',
            'department_linked' => 'required',
            'objective_measurement' => 'required',
            'steps_to_achieve' => 'required',
            'completion_date' => 'required',
        ]);

        auth()->user()->section_five()->create($validated_data);

        $this->reset();
    }

    public function remove($id)
    {
        SectionFive::whereId($id)->delete();
    }

    public function render()
    {
        return view('livewire.sec-five',[
            'objectives' => SectionFive::where('user_id', auth()->id())->get()
        ]);
    }
}
