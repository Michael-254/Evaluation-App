<div class="row px-4 pt-2">
    <div class="form-group col-sm-3">
        <p class="font-sans text-green-700 mb-2">Employee Signature</p>
        <span>{{auth()->user()->name}}</span>
    </div>
    <div class="form-group col-sm-3">
        <p class="font-sans text-green-700 mb-2">Employee Date</p>
        <span>{{$data->created_at->format('d-m-Y')}}</span>
    </div>
    <div class="form-group col-sm-3">
        <p class="font-sans text-green-700 mb-2">Supervisor Signature</p>
        <span>{{$data->supervisor->name}}</span>
    </div>
    <div class="form-group col-sm-3">
        <p class="font-sans text-green-700 mb-2">Supervisor Date</p>
        <span>{{$data->created_at->format('d-m-Y')}}</span>
    </div>
    <div class="form-group col-sm-3">
        <p class="font-sans text-green-700 mb-2">HOD Signature</p>
        <span>{{$data->myHod->name ?? ''}}</span>
    </div>
    <div class="form-group col-sm-3">
        <p class="font-sans text-green-700 mb-2">HOD Date</p>
        @if($data->myHod)
        <span>{{$data->updated_at->format('d-m-Y')}}</span>
        @endif
    </div>
</div>