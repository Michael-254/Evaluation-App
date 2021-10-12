<?php

namespace App\Http\Controllers;

use App\Models\SectionFive;
use App\Models\SectionSix;
use App\Models\Signature;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SectionSixController extends Controller
{
    public function create()
    {
        $progress = SectionFive::where('user_id', auth()->id())->whereYear('created_at', '=', now()->year)->first();

        abort_if($progress == '', 403, 'You must complete the previous section');

        $data = Signature::where('user_id', auth()->id())->whereYear('created_at', '=', now()->year)->get();
        $info = SectionSix::where('user_id', auth()->id())->whereYear('created_at', '=', now()->year)->first();
        return view('User.section-six', compact('info','data'));
    }

    public function store(Request $request)
    {

        $validated_data = $request->validate([
            "employee_comments"  => "required",
            "supervisor_comments"  => "required",
        ]);

        auth()->user()->section_six()->create($validated_data);

        Toastr::success('Saved successfully', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('section.six');
    }

    public function final()
    {
        $data = User::with(
            'more_info',
            'section_one',
            'section_two',
            'section_three',
            'section_four',
            'section_five',
            'section_six',
            'sig'
        )->find(auth()->id());
        return view('User.final', compact('data'));
    }
}
