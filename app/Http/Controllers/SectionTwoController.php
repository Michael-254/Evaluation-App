<?php

namespace App\Http\Controllers;

use App\Models\SectionTwo;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SectionTwoController extends Controller
{
    public function create(){
        $competences = DB::table('competences')->select('id','competence_skill')->get();
        $info = SectionTwo::with('comp')->where('user_id', auth()->id())->whereYear('created_at', '=', now()->year)->get();
        return view('User.section-two', compact('info','competences'));
    }

    public function store(Request $request){

         $request->validate([
            "Comments.*"  => "required",
        ]);

        foreach ($request->Competence_id as $key => $Competence_id) {
            SectionTwo::create([
                'user_id' => auth()->id(), 'Competence_id' => $Competence_id, 'Employee_level' => $request->Employee_level[$key],
                'Supervisor_level' => $request->Supervisor_level[$key], 'Comments' => $request->Comments[$key]
            ]);
        }
        Toastr::success('Saved successfully', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('section.two');
    }
}
