<?php

namespace App\Http\Controllers;

use App\Models\ExtraInformation;
use App\Models\SectionFive;
use App\Models\SectionSix;
use App\Models\Signature;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Mail;

class SectionSixController extends Controller
{
    public function create()
    {
        $progress = SectionFive::where('user_id', auth()->id())->whereYear('created_at', '=', now()->year)->first();

        abort_if($progress == '', 403, 'You must complete the previous section');

        $personal = ExtraInformation::where('user_id', auth()->id())->whereYear('created_at', '=', now()->year)->first();
        $info = SectionSix::where('user_id', auth()->id())->whereYear('created_at', '=', now()->year)->first();
        return view('User.section-six', compact('info', 'personal'));
    }

    public function store(Request $request)
    {

        $validated_data = $request->validate([
            "employee_comments"  => "required",
            "supervisor_comments"  => "required",
        ]);

        auth()->user()->section_six()->create($validated_data);
        ExtraInformation::where('user_id', auth()->id())->whereYear('created_at', '=', now()->year)->first()
            ->update(['status' => 'completed']);

        $data = [
            'intro'  => 'Dear HOD ' . auth()->user()->department . ',',
            'content'   => auth()->user()->name . ' has completed his performance evaluation and request your review.',
            'name' => 'HOD ' . auth()->user()->department,
            'email' => auth()->user()->HOD_email,
            'subject'  => 'Successful completion of performance evaluation.'
        ];
        Mail::send('emails.mail', $data, function ($message) use ($data) {
            $message->to($data['email'], $data['name'])
                ->subject($data['subject']);
        });

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
