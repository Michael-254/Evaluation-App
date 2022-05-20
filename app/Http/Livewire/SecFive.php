<?php

namespace App\Http\Livewire;

use App\Models\ExtraInformation;
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

        $info = ExtraInformation::where('user_id', auth()->id())->where('status', '!=', 'HOD reviewed')->latest()->first();
        $validated_data["extra_info"] = $info->id;

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
            'objectives' => ExtraInformation::with('sectionFive')->where('user_id', auth()->id())->where('status', '!=', 'HOD reviewed')->latest()->first()
        ]);
    }
}
