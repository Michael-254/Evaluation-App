<x-app-layout>
    <!-- Main content -->
    <div class="content">
        <div class="container">

            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class=" font-bold card-title text-green-700 mr-1">Section Four: Support Mechanisms</h3>
                        </div>
                        <div class="card-body px-4 animate__animated animate__fadeInUp">
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form method="POST" action="{{route('sectionFour.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="form-group w-full">
                                        <p class="font-sans font-bold text-green-700 mb-2">1. What support mechanisms from your supervisor or other parts of the organization have worked well and what can be improved upon</p>
                                        <p class="font-sans text-green-700 mb-2">Supervisor: works well</p>
                                        <textarea name="sup_works_well" class="summernote bg-green-500">{{$info->sectionFour->sup_works_well ?? ''}}{{ old('sup_works_well') }}</textarea>
                                    </div>
                                    <div class="form-group w-full">
                                        <p class="font-sans text-green-700 mb-2">Supervisor: Need for improvement</p>
                                        <textarea name="sup_needs_improvement" class="summernote">{{$info->sectionFour->sup_needs_improvement ?? ''}}{{ old('sup_needs_improvement') }}</textarea>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group w-full">
                                        <p class="font-sans text-green-700 mb-2">Other parts of the Organization: What has worked well</p>
                                        <textarea name="org_works_well" class="summernote bg-green-500">{{$info->sectionFour->org_works_well ?? ''}}{{ old('org_works_well') }}</textarea>
                                    </div>
                                    <div class="form-group w-full">
                                        <p class="font-sans text-green-700 mb-2">Other parts of the Organization: Need for improvement</p>
                                        <textarea name="org_needs_improvement" class="summernote">{{$info->sectionFour->org_needs_improvement ?? ''}}{{ old('org_needs_improvement') }}</textarea>
                                    </div>
                                </div>

                                <div class="flex float-right form-group">
                                    @if($info->sectionFour->org_works_well != '')
                                    @if($info->evaluation_type == 'yearly')
                                    <a href="{{route('section.five')}}" class="text-green-800 hover:text-blue-600 font-bold px-2">Next <i class="fas fa-arrow-right"></i></a>
                                    @else
                                    <a href="{{route('section.six')}}" class="text-green-800 hover:text-blue-600 font-bold px-2">Next <i class="fas fa-arrow-right"></i></a>
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