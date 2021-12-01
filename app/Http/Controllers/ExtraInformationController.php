<?php

namespace App\Http\Controllers;

use App\Models\ExtraInformation;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class ExtraInformationController extends Controller
{
    public function dashboard()
    {
        $extra_info = ExtraInformation::with('supervisor')->where('user_id', auth()->id())->whereYear('created_at', '=', now()->year)->get();
        return view('dashboard',compact('extra_info'));
    }

    public function index()
    {
        return view('user.non-disclosure');
    }

    public function moreInfo()
    {
        $info = ExtraInformation::with('supervisor')->where('user_id', auth()->id())->whereYear('created_at', '=', now()->year)->first();
        $users = User::all();
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

    public function file(Request $request)
    {
        $timestamp = $request->password;
        $path = storage_path('app/public/pdf/'.$timestamp.'/evaluation.pdf', );
        return response()->file($path);
    }

    public function excel(){
        $users = User::whereHas('section_one')
         ->with(
            'more_info',
            'section_one',
            'items',
            'section_two',
            'section_three',
            'section_four',
            'section_five',
            'section_six',
        )->get();

        return view('hod.excel',compact('users'));
    }
}
