<?php

namespace App\Http\Controllers;

use App\Models\ExtraInformation;
use App\Models\SectionSix;
use App\Models\User;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Storage;
use PDF;

class HODController extends Controller
{
    public function IT()
    {
        abort_if(!auth()->user()->role_HOD,404,'Not Found');
        $data = User::where('department', '=', 'IT')
                    ->whereHas('more_info')
                    ->with(['more_info' => function ($query) {
                        $query->where('status', '=', 'completed');
                    }])
                        ->get();
        return view('hod.table', compact('data'));
    }

    public function ME()
    {
        abort_if(!auth()->user()->role_HOD,404,'Not Found');
        $data =  User::where('department', '=', 'M&E')
                    ->whereHas('more_info')
                    ->with(['more_info' => function ($query) {
                        $query->where('status', '=', 'completed');
                    }])
                        ->get();
        return view('hod.table', compact('data'));
    }

    public function Communications()
    {
        abort_if(!auth()->user()->role_HOD,404,'Not Found');
        $data = User::where('department', '=', 'Communications')
                ->whereHas('more_info')
                ->with(['more_info' => function ($query) {
                    $query->where('status', '=', 'completed');
                }])
                    ->get();
        return view('hod.table', compact('data'));
    }

    public function Accounts()
    {
        abort_if(!auth()->user()->role_HOD,404,'Not Found');
        $data = User::where('department', '=', 'Accounts')
                    ->whereHas('more_info')
                    ->with(['more_info' => function ($query) {
                        $query->where('status', '=', 'completed');
                    }])
                        ->get();
        return view('hod.table', compact('data'));
    }

    public function Operations()
    {
        abort_if(!auth()->user()->role_HOD,404,'Not Found');
        $data = User::where('department', '=', 'Operations')
                    ->whereHas('more_info')
                    ->with(['more_info' => function ($query) {
                        $query->where('status', '=', 'completed');
                    }])
                        ->get(); 
        return view('hod.table', compact('data'));
    }

    public function HR()
    {
        abort_if(!auth()->user()->role_HOD,404,'Not Found');
        $data = User::where('department', '=', 'Human Resources')
                ->whereHas('more_info')
                ->with(['more_info' => function ($query) {
                    $query->where('status', '=', 'completed');
                }])
                ->get();           
                        
        return view('hod.table', compact('data'));
    }

    public function Forestry()
    {
        abort_if(!auth()->user()->role_HOD,404,'Not Found');
        $data = User::where('department', '=', 'Forestry')
                ->whereHas('more_info')
                ->with(['more_info' => function ($query) {
                    $query->where('status', '=', 'completed');
                }])
                    ->get();
        return view('hod.table', compact('data'));
    }

    public function MITI()
    {
        abort_if(!auth()->user()->role_HOD,404,'Not Found');
        $data = User::where('department', '=', 'Miti Magazine')
                    ->whereHas('more_info')
                    ->with(['more_info' => function ($query) {
                        $query->where('status', '=', 'completed');
                    }])
                        ->get(); 
        return view('hod.table', compact('data'));
    }

    public function view($id)
    {
        abort_if(!auth()->user()->role_HOD,404,'Not Found');
        $data = User::with(
            'more_info',
            'section_one',
            'section_two',
            'section_three',
            'section_four',
            'section_five',
            'section_six',
        )->find($id);

        return view('hod.report', compact('data'));
    }

    public function comment(Request $request, $id)
    {
        abort_if(!auth()->user()->role_HOD,404,'Not Found');
        $request->validate([
            'hod_comments' => 'required',
        ]);

        $comment = SectionSix::findOrFail($id);
        $comment->update([
            'hod_comments' => $request->hod_comments, 'hod_date' => now()->format('Y-m-d')
        ]);

        ExtraInformation::where('user_id', $comment->user_id)->whereYear('created_at', '=', now()->year)->first()
            ->update(['review_hod' => auth()->id(), 'status' => 'HOD reviewed']);

        $data = User::with(
            'more_info',
            'section_one',
            'section_two',
            'section_three',
            'section_four',
            'section_five',
            'section_six',
        )->find($comment->user_id)->toArray(); 
        view()->share('data',$data);   
 
        $pdf = PDF::loadView('User.document', ['data' => $data]);
        $timestamp = uniqid().$comment->user_id;
        Storage::put('public/pdf/'.$timestamp.'/evaluation.pdf', $pdf->output());

        $link = '127.0.0.1:8000/storage/pdf/'.$timestamp.'/evaluation.pdf';

        $info = [
            'intro'  => 'Dear ' . $data['name'] . ',',
            'content'   => 'Your performance evauation has been reviewed by the HOD and given his remarks',
            'link' => $link,
            'name' => $data['name'],
            'email' => $data['email'],
            'subject'  => 'Successful completion of HOD review on your performance evaluation.'
        ];
        Mail::send('emails.link', $info, function ($message) use ($info, $pdf) {
            $message->to($info['email'], $info['name'])
                ->subject($info['subject']);
        });

        Toastr::success('Saved successfully', 'Success', ["positionClass" => "toast-bottom-right"]);
        return redirect()->route('dashboard');
    }

    public function followUp()
    {
        abort_if(!auth()->user()->role_admin,404,'Not Found');
        return view('hod.follow-up');
    }

    public function report($id)
    {
        abort_if(!auth()->user()->role_admin,404,'Not Found');
        $data = User::with(
            'more_info',
            'section_one',
            'section_two',
            'section_three',
            'section_four',
            'section_five',
            'section_six',
            'sig'
        )->find($id);
        return view('User.final', compact('data'));
    }
}
