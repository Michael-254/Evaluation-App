<x-app-layout>
    <!-- Main content -->
    <div class="content">
        <div class="container">

            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class=" font-bold card-title text-green-700">Employee Information</h3>
                        </div>
                        <div class="card-body px-4 animate__animated animate__zoomIn">
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form method="POST" action="{{route('store.evaluation')}}">
                                @csrf
                                <div class="row">
                                    <div class="form-group col-sm-4">
                                        <p class="font-sans text-green-700 mb-2">Employee Name</p>
                                        <span>{{auth()->user()->name}}</span>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <p class="font-sans text-green-700 mb-2">Department</p>
                                        <span>{{auth()->user()->department}}</span>
                                    </div>
                                    <div class="form-group col-sm-4">
                                        <p class="font-sans text-green-700 mb-2">Current Designation</p>
                                        <span>{{auth()->user()->job_title}}</span>
                                        <input type="hidden" name="Designation" class="btn-blue" value="{{auth()->user()->job_title}}">
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-6">
                                        <p class="font-sans text-green-700 mb-2">Evaluation Type</p>
                                        <select class="btn-blue" name="evaluation_type" required>
                                            <option disabled="disabled" selected="selected">-- Select Evaluation type --</option>
                                            <option value="probation" {{ 'probation' == ($info->evaluation_type ?? '') ? 'selected' : '' }}>Probation</option>
                                            <option value="yearly" {{ 'yearly' == ($info->evaluation_type ?? '') ? 'selected' : '' }}>Yearly</option>
                                        </select>
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <p class="font-sans text-green-700 mb-2">Academic/Professional qualifications</p>
                                        <textarea name="Academic" class="btn-blue" placeholder="Academic/Professional qualifications">{{$info->Academic ?? ''}}</textarea>
                                    </div>
                                </div>
                                <div class="row mt-1">
                                    <div class="form-group col-sm-6">
                                        <p class="font-sans text-green-700 mb-2">Years of service at BGF</p>
                                        <input type="number" name="service_years" step="0.1" class="btn-blue" value="{{$info->service_years ?? ''}}" placeholder="Years">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <p class="font-sans text-green-700 mb-2">Reviewing supervisor</p>
                                        <select class="btn-blue" name="review_supervisor" required>
                                            <option disabled="disabled" selected="selected">-- Choose your supervisor --</option>
                                            @foreach($users as $user)
                                            @if($user->department == auth()->user()->department && $user->site == auth()->user()->site
                                            || $user->department == auth()->user()->department && $user->site == "Head Office" || $user->role_admin)
                                            <option value="{{$user->id}}" {{ ($user->id) == ($info->supervisor->id ?? '') ? 'selected' : '' }}>{{$user->job_title}}</option>
                                            @endif
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                                <div class="row mt-2">
                                    <div class="form-group col-sm-6">
                                        <p class="font-sans text-green-700 mb-2">Period Under Review</p>
                                        <input type="text" name="review_period" class="btn-blue" id="reservation" value="{{$info->review_period ?? ''}}">
                                    </div>
                                    <div class="form-group col-sm-6">
                                        <p class="font-sans text-green-700 mb-2">Last Appraisal Overall Assesment:</p>
                                        <textarea class="btn-blue" name="last_appraisal" placeholder="Last Appraisal Overall Assesment comments">{{$info->last_appraisal ?? ''}}</textarea>
                                    </div>
                                </div>
                                <div class="flex float-right form-group">
                                    @if($info != '')
                                    @if($info->evaluation_type == 'yearly')
                                    <a href="{{route('section.one')}}" class="text-green-800 hover:text-blue-600 font-bold px-2">Next <i class="fas fa-arrow-right"></i></a>
                                    @else
                                    <a href="{{route('section.two')}}" class="text-green-800 hover:text-blue-600 font-bold px-2">Next <i class="fas fa-arrow-right"></i></a>
                                    @endif
                                    @else
                                    <button type="submit" class="text-white bg-green-800 font-bold uppercase text-xs px-4 py-2 rounded-full shadow  mr-1 mb-1 hover:bg-blue-500">Save and Continue</button>
                                    @endif
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.content -->
</x-app-layout>