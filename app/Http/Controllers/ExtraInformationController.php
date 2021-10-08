<?php

namespace App\Http\Controllers;

use App\Models\ExtraInformation;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ExtraInformationController extends Controller
{
    public function index()
    {
        return view('user.non-disclosure');
    }

    public function moreInfo()
    {
        $info = ExtraInformation::with('supervisor')->where('user_id', auth()->id())->whereYear('created_at', '=', now()->year)->first();
        $users = User::select('id', 'name')->get();
        return view('user.personal-info', compact(['users', 'info']));
    }

    public function store(Request $request)
    {
        $validatedData =  $request->validate([
            'Academic' => 'required',
            'Designation' => 'required',
            'service_years' => 'required',
            'review_supervisor' => 'required',
            'review_period' => 'required',
            'last_appraisal' => 'required',
        ]);

        $data = auth()->user()->more_info()->create($validatedData);
        Toastr::success('Saved successfully', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect('/user/Extra-Information');
    }
}
