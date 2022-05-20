<?php

namespace App\Http\Controllers;

use App\Models\ExtraInformation;
use App\Models\SectionFour;
use App\Models\SectionThree;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SectionFourController extends Controller
{
    public function create()
    {
        $progress = ExtraInformation::where('user_id', auth()->id())->where('status', '!=', 'HOD reviewed')->latest()->first();

        abort_if($progress->sectionThree->count() < 3 && $progress->evaluation_type == 'yearly', 403, 'You must complete the previous section');
        $info = $progress->load('SectionFour');
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

        $info = ExtraInformation::where('user_id', auth()->id())->where('status', '!=', 'HOD reviewed')->latest()->first();
        $Validated_data["extra_info"] = $info->id;

        $data = auth()->user()->section_four()->create($Validated_data);

        Toastr::success('Saved successfully', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('section.four');
    }
}
