@foreach($data->sig as $sign)
<div class="px-4 pt-2">
    <div class="row mt-2 px-2">
        <div class="form-group col-sm-6">
            <p class="font-bold text-green-700 mb-2">Employee Date</p>
            <span>{{$sign->employee_date}}</span>
        </div>
        <div class="form-group col-sm-6">
            <p class="font-bold text-green-700 mb-2">Employee Signature</p>
            <span><img src="{{ asset('signature/'.$sign->employee) }}" alt="signature" class="w-52"></span>
        </div>
    </div>
    <div class="row mt-2 px-2">
        <div class="form-group col-sm-6">
            <p class="font-bold text-green-700 mb-2">Supervisor Date</p>
            <span>{{$sign->supervisor_date}}</span>
        </div>
        <div class="form-group col-sm-6">
            <p class="font-bold text-green-700 mb-2">Supervisor Signature</p>
            <span><img src="{{ asset('signature/'.$sign->supervisor) }}" alt="signature" class="w-52"></span>
        </div>
    </div>
    <div class="row mt-2 px-2">
        <div class="form-group col-sm-6">
            <p class="font-bold text-green-700 mb-2">HOD Date</p>
            <span>{{$sign->hod_date}}</span>
        </div>
        <div class="form-group col-sm-6">
            <p class="font-bold text-green-700 mb-2">HOD Signature</p>
            <span><img src="{{ asset('signature/'.$sign->hod) }}" alt="signature" class="w-52"></span>
        </div>
    </div>
</div>

@endforeach