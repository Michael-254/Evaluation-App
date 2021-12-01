<?php

namespace App\Http\Livewire;

use App\Models\Audits;
use App\Models\SectionOne;
use App\Models\SectionOnePartB;
use App\Models\SectionThree;
use App\Models\SectionTwo;
use App\Models\User;
use Mediconesystems\LivewireDatatables\Column;
use Mediconesystems\LivewireDatatables\DateColumn;
use Mediconesystems\LivewireDatatables\NumberColumn;
use Mediconesystems\LivewireDatatables\Http\Livewire\LivewireDatatable;


class FollowUp extends LivewireDatatable
{
    public $hideable = 'select';
    public $exportable = true;
    public $complex = true;
    public $persistComplexQuery = true;

    public function builder()
    {
        return User::query()
         ->whereHas('section_one')
         ->with(
            'more_info',
            'section_one',
            'items',
            'section_two',
            'section_three',
            'section_four',
            'section_five',
            'section_six',
        );
    }

    public function columns()
    {
        return [
            NumberColumn::name('id')->label('#')->defaultSort('asc'),
            Column::name('name')->label('Employee Name')->searchable(),
            Column::name('department')->label('Department')->filterable($this->department)->searchable(),
            Column::name('site')->label('Site')->filterable($this->site),
            Column::name('more_info.status')->label('Status')->filterable(),
            Column::name('more_info.Designation')->label('Designation')->filterable(),
            Column::callback(['id','name'], function ($id) {
                $secOne_id = SectionOne::where('user_id',$id)->first()->id;
                $objectives = SectionOnePartB::where('section_one_id',$secOne_id)->select('id','Objective','status',
                     'E_comments','S_comments')->get();
                     return   $objectives;
            })->label('Objective and Comments'),         
            Column::name('section_two.Employee_level:sum')->label('Employee Marks'),
            Column::name('section_two.Supervisor_level:sum')->label('Supervisor Marks'),
            Column::name('section_two.Supervisor_level:count')->label('Marks Out of'),
            // Column::callback(['id','trainings'], function ($id) {
            //     $objectives = SectionThree::where('user_id',$id)->select('id','Objective','status',
            //          'E_comments','S_comments')->get();
            //          return   $objectives;
            // })->label('Training and Development'),
            Column::name('section_three.topic')->label('Type'),
            Column::name('section_three.training_required')->label('Training and Development'),
            Column::name('section_three.how_achieved')->label('How will it be achieved'),
            Column::name('section_three.person_responsible')->label('Person Responsible'),
            Column::name('section_four.sup_works_well')->label('Sup works Well')->filterable(),
            Column::name('section_four.sup_needs_improvement')->label('Sup need improvement')->filterable(),
            Column::name('section_four.org_works_well')->label('Org works Well')->filterable(),
            Column::name('section_four.org_needs_improvement')->label('Org need improvement')->filterable(),
            Column::name('section_six.employee_comments')->label('Employee Comment')->filterable(),
            Column::name('section_six.supervisor_comments')->label('Supervisor Comment')->filterable(),
            Column::name('section_six.hod_comments')->label('HOD Comments')->filterable(),
            Column::callback(['id'], function ($id) {
                return view('livewire.follow-up', ['id' => $id]);
            })->label('Action')
        ];
    }

    public function getDepartmentProperty()
    {
        return array('IT','Operations','M&E','Human Resources',
        'Communications','Accounts','Operations','Human Resources','Forestry','Miti Magazine');
    }

    public function getSiteProperty()
    {
        return array('Head Office','Kiambere','Dokolo','Nyongoro','7 Forks','Kampala','Tanzania');
    }
}
