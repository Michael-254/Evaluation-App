<?php

namespace App\Http\Controllers;

use App\Models\SectionFour;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SectionFourController extends Controller
{
    public function create(){
        $info = SectionFour::where('user_id', auth()->id())->whereYear('created_at', '=', now()->year)->first();
        return view('User.section-four', compact('info'));
    }

    public function store(Request $request)
    {

        $Validated_data = $request->validate([
            'sup_works_well' => 'required',
            'sup_needs_improvement' => 'required',
            'org_works_well' => 'required',
            'org_needs_improvement' => 'required',
        ]);

        $data = auth()->user()->section_four()->create($Validated_data);

        Toastr::success('Saved successfully', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('section.four');
    }
}
