<?php

namespace App\Http\Controllers;

use App\Models\SectionFive;
use App\Models\SectionFour;
use Illuminate\Http\Request;

class SectionFiveController extends Controller
{
   public function create()
   {
      $progress = SectionFour::where('user_id', auth()->id())->whereYear('created_at', '=', now()->year)->first();

      abort_if($progress == '', 403, 'You must complete the previous section');
      $info = SectionFive::where('user_id', auth()->id())->whereYear('created_at', '=', now()->year)->first();
      return view('user.section-five', compact('info'));
   }
}
