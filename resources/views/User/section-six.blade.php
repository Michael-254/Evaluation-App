<x-app-layout>
    <!-- Main content -->
    <div class="content">
        <div class="container">

            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class=" font-bold card-title text-green-700 mr-1">Section Six: Overal Comments</h3>
                        </div>
                        <div class="card-body px-4 animate__animated animate__fadeInUp">
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form method="POST" action="{{route('sectionSix.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="form-group w-full">
                                        <p class="font-sans font-bold text-green-700 mb-2">Based on discussions on the five sections above</p>
                                        <p class="font-sans text-green-700 mb-2">Employee: Comments</p>
                                        <textarea name="employee_comments" class="summernote bg-green-500">{{$info->sectionSix->employee_comments ?? ''}}{{ old('employee_comments') }}</textarea>
                                    </div>
                                    <div class="form-group w-full">
                                        <p class="font-sans text-green-700 mb-2">Supervisor: Comments</p>
                                        <textarea name="supervisor_comments" class="summernote">{{$info->sectionSix->supervisor_comments ?? ''}}{{ old('supervisor_comments') }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group col-sm-3">
                                        <p class="font-sans text-green-700 mb-2">Employee Signature</p>
                                        <span>{{auth()->user()->name}}</span>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <p class="font-sans text-green-700 mb-2">Employee Date</p>
                                        <span>{{now()->format('d-m-Y')}}</span>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <p class="font-sans text-green-700 mb-2">Supervisor Signature</p>
                                        <span>{{$info->supervisor->name}}</span>
                                    </div>
                                    <div class="form-group col-sm-3">
                                        <p class="font-sans text-green-700 mb-2">Supervisor Date</p>
                                        <span>{{now()->format('d-m-Y')}}</span>
                                    </div>
                                </div>

                                <div class="flex float-right form-group">
                                    @if($info->sectionSix->employee_comments == '')
                                    <button type="submit" class="text-white bg-green-800 font-bold uppercase text-xs px-4 py-2 rounded-full shadow  mr-1 mb-1 hover:bg-blue-500">Save and Continue</button>
                                    @endif
                                </div>
                            </form>
                            
                            @if($info->sectionSix->employee_comments != '')
                            <div class="flex justify-end mt-4">
                                <a href="{{route('final')}}" class="text-green-800 hover:text-blue-600 font-bold px-2">Next <i class="fas fa-arrow-right"></i></a>
                            </div>
                            @endif
                        </div>


                    </div>
                </div>
            </div>
            <!-- /.card-body -->
        </div>
    </div>
    <!-- /.content -->

</x-app-layout>