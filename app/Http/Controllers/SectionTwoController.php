<?php

namespace App\Http\Controllers;

use App\Models\ExtraInformation;
use App\Models\SectionOne;
use App\Models\SectionTwo;
use App\Models\Signature;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionTwoController extends Controller
{
    public function create()
    {
        $progress = ExtraInformation::where('user_id', auth()->id())->where('status', '!=', 'HOD reviewed')->latest()->first();

        abort_if($progress->sectionOne->q_oneA == '' && $progress->evaluation_type == 'yearly', 403, 'You must complete the previous section');
        $competences = DB::table('competences')->select('id', 'competence_skill')->get();
        $info = $progress->load('SectionTwo');
        return view('user.section-two', compact('info', 'competences'));
    }

    public function store(Request $request)
    {

        $request->validate([
            "Competence_id.*"  => "required",
            "Employee_level.*"  => "required_unless:Competence_id.*,no",
            "Supervisor_level.*"  => "required_unless:Competence_id.*,no",
            "Comments.*"  => "required_unless:Competence_id.*,no",
        ]);

        $info = ExtraInformation::where('user_id', auth()->id())->where('status', '!=', 'HOD reviewed')->latest()->first();

        foreach ($request->Competence_id as $key => $Competence_id) {
            if ($Competence_id != 'no') {
                SectionTwo::create([
                    'user_id' => auth()->id(), 'extra_info' => $info->id, 'Competence_id' => $Competence_id, 'Employee_level' => $request->Employee_level[$key],
                    'Supervisor_level' => $request->Supervisor_level[$key], 'Comments' => $request->Comments[$key]
                ]);
            }
        }
        Toastr::success('Saved successfully', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('section.two');
    }
}
