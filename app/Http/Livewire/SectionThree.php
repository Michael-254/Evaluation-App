<?php

namespace App\Http\Livewire;

use App\Models\DropData;
use App\Models\SectionThree as ModelsSectionThree;
use Livewire\Component;

class SectionThree extends Component
{
    public $topic, $training_required, $how_achieved, $person_responsible;

    public function skill()
    {
        $this->verify();

        ModelsSectionThree::create([
            'user_id' => auth()->id(),
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
        return view('livewire.section-three', [
            'trainings' => ModelsSectionThree::where('user_id', auth()->id())->get(),
            'dropdowns' => DropData::all()
        ]);
    }
}
