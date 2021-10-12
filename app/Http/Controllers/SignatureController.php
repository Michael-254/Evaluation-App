<?php

namespace App\Http\Controllers;

use App\Models\Signature;
use Brian2694\Toastr\Facades\Toastr;
use Illuminate\Http\Request;

class SignatureController extends Controller
{
	public function store(Request $request)
	{
		$request->validate([
			'signature' => 'required',
		]);

		$folderPath = public_path('signature/');

		$image_parts = explode(";base64,", $request->signature);

		$image_type_aux = explode("image/", $image_parts[0]);

		$image_type = $image_type_aux[1];

		$image_base64 = base64_decode($image_parts[1]);

		$file_name = uniqid() . '.' . $image_type;

		$file = $folderPath . $file_name;


		file_put_contents($file, $image_base64);

		if ($request->role == 'employee') {
			Signature::updateOrCreate([
				'user_id' => auth()->id()
			], [
				'employee' => $file_name,
				'employee_date' => $request->date
			]);
		} elseif ($request->role == 'supervisor') {
			Signature::updateOrCreate([
				'user_id' => auth()->id()
			], [
				'supervisor' => $file_name,
				'supervisor_date' => $request->date
			]);
		} else {
			Signature::updateOrCreate([
				'user_id' => auth()->id()
			], [
				'hod' => $file_name,
				'hod_date' => $request->date
			]);
		}

		Toastr::success('Signature saved', 'Success', ["positionClass" => "toast-bottom-right"]);
		return redirect()->back();
	}
}
