<?php

namespace App\Http\Controllers;

use App\Models\SectionOne;
use App\Models\SectionOnePartB;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SectionOneController extends Controller
{
    public function create()
    {
        $info = SectionOne::with('partB')->where('user_id', auth()->id())->whereYear('created_at', '=', now()->year)->first();
        return view('User.section-one', compact('info'));
    }

    public function store(Request $request)
    {

        $Validated_data = $request->validate([
            'q_oneA' => 'required',
            'q_oneB' => 'required',
            'q_oneC' => 'required',
            'q_three' => 'required',
            'q_four' => 'required',
            'q_five' => 'required',
            'q_six' => 'required',
        ]);

        $data = auth()->user()->section_one()->create($Validated_data);

        foreach ($request->Objective as $key => $Objective) {
            SectionOnePartB::create([
                'section_one_id' => $data->id, 'Objective' => $Objective, 'status' => $request->status[$key],
                'E_comments' => $request->E_comments[$key], 'S_comments' => $request->S_comments[$key]
            ]);
        }
        Toastr::success('Saved successfully', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('section.one');
    }
}
