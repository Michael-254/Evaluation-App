<?php

namespace App\Http\Livewire;

use App\Models\DropData;
use App\Models\ExtraInformation;
use App\Models\SectionThree as ModelsSectionThree;
use Livewire\Component;

class SectionThree extends Component
{
    public $topic, $training_required, $how_achieved, $person_responsible,$extra_info_id;

    public function skill()
    {
        $this->verify();

        ModelsSectionThree::create([
            'user_id' => auth()->id(),
            'extra_info' => $this->extra_info_id,
            'topic' => 'Skill',
            'training_required' => $this->training_required,
            'how_achieved' => $this->how_achieved,
            'person_responsible' => $this->person_responsible,
        ]);

        $this->reset();
    }

    public function experience()
    {

        $this->verify();

        ModelsSectionThree::create([
            'user_id' => auth()->id(),
            'extra_info' => $this->extra_info_id,
            'topic' => 'Experience',
            'training_required' => $this->training_required,
            'how_achieved' => $this->how_achieved,
            'person_responsible' => $this->person_responsible,
        ]);

        $this->reset();
    }

    public function Knowledge()
    {

        $this->verify();

        ModelsSectionThree::create([
            'user_id' => auth()->id(),
            'extra_info' => $this->extra_info_id,
            'topic' => 'Knowledge',
            'training_required' => $this->training_required,
            'how_achieved' => $this->how_achieved,
            'person_responsible' => $this->person_responsible,
        ]);

        $this->reset();
    }

    public function Other()
    {

        $this->verify();

        ModelsSectionThree::create([
            'user_id' => auth()->id(),
            'extra_info' => $this->extra_info_id,
            'topic' => 'Other',
            'training_required' => $this->training_required,
            'how_achieved' => $this->how_achieved,
            'person_responsible' => $this->person_responsible,
        ]);

        $this->reset();
    }

    public function remove($id)
    {
        ModelsSectionThree::whereId($id)->delete();
    }

    public function verify()
    {
        $this->validate([
            'training_required' => 'required',
            'how_achieved' => 'required',
            'person_responsible' => 'required',
        ]);
    }

    public function render()
    {
        $data = ExtraInformation::with('sectionThree')->where('user_id', auth()->id())->where('status', '!=', 'HOD reviewed')->latest()->first();
        $this->extra_info_id = $data->id;
        return view('livewire.section-three', [
            'trainings' => $data,
            'dropdowns' => DropData::orderBy('dropdown_item', 'asc')->get()
        ]);
    }
}
