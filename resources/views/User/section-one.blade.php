<x-app-layout>
    <!-- Main content -->
    <div class="content">
        <div class="container">

            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class=" font-bold card-title text-green-700 mr-1">Section One </h3>
                            <p class="text-red-600 text-xs mt-0.5">(Put your answers in points where applicable)</p>
                        </div>
                        <div class="card-body px-4 animate__animated animate__fadeInUp">
                            <!-- Session Status -->
                            <x-auth-session-status class="mb-4" :status="session('status')" />

                            <!-- Validation Errors -->
                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                            <form method="POST" action="{{route('sectionOne.store')}}">
                                @csrf
                                <div class="row">
                                    <div class="form-group w-full">
                                        <p class="font-sans font-bold text-green-700 mb-2">1. What is your major role in your position to achieve the company objective</p>
                                        <p class="font-sans text-green-700 mb-2">(a) Briefly list the main responsibilities and duties of your current job</p>
                                        <textarea name="q_oneA" class="summernote bg-green-500">{{$info->sectionOne->q_oneA ?? ''}}{{ old('q_oneA') }}</textarea>
                                    </div>
                                    <div class="form-group w-full">
                                        <p class="font-sans text-green-700 mb-2">(b) Special tasks (if any)</p>
                                        <textarea name="q_oneB" class="summernote">{{$info->sectionOne->q_oneB ?? ''}}{{ old('q_oneB') }}</textarea>
                                    </div>
                                    <div class="form-group w-full">
                                        <p class="font-sans text-green-700 mb-2">(c) How do you relate to the vision and mission of the company?</p>
                                        <textarea name="q_oneC" class="summernote">{{$info->sectionOne->q_oneC ?? ''}}{{ old('q_oneC') }}</textarea>
                                    </div>
                                </div>

                                @if($info->sectionOne->q_oneA != '')
                                <div class="table-responsive">
                                    <table class="table invoice-detail-table">
                                        <thead>
                                            <tr class="text-green-700">
                                                <th>Target Quality Objective Under Review</th>
                                                <th>Achieved/Not Achieved</th>
                                                <th>Employee Comments</th>
                                                <th>Reviewing Supervisor Comments</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($info->sectionOne->partB as $objective)
                                            <tr>
                                                <td>{{$objective->Objective}}</td>
                                                <td>{{$objective->status}}</td>
                                                <td>{{$objective->E_comments}}</td>
                                                <td>{{$objective->S_comments}}</td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                @else
                                <div class="form-group">
                                    <fieldset>
                                        <p class="font-sans text-green-700 mb-2">2.Review of the Set Quality Objectives </p>
                                        <p class="text-green-700 text-xs">Looking back over the period, assess what you have achieved, and what has not gone so well</p>
                                        <div class="mt-2">
                                            <div id="wrapper">
                                                <div id="form_div">
                                                    <div class="table-responsive">
                                                        <table id="employee_table" class="table invoice-detail-table">
                                                            <thead>
                                                                <tr class="text-green-700">
                                                                    <th>Target Quality Objective Under Review</th>
                                                                    <th>Achieved/Not Achieved</th>
                                                                    <th>Employee Comments</th>
                                                                    <th>Reviewing Supervisor Comments</th>
                                                                </tr>
                                                            </thead>
                                                        </table>
                                                    </div>
                                                </div>
                                                <input type="button" class="btn btn-warning btn-sm rounded-md" onclick="add_row();" value="Add New">
                                            </div>
                                        </div>

                                    </fieldset>
                                </div>
                                @endif


                                <div class="row">
                                    <div class="form-group w-full">
                                        <p class="font-sans text-green-700 mb-2">3.What achievements are you most proud of this year?</p>
                                        <textarea name="q_three" class="summernote bg-green-500">{{$info->sectionOne->q_three ?? ''}}{{ old('q_three') }}</textarea>
                                    </div>
                                    <div class="form-group w-full">
                                        <p class="font-sans text-green-700 mb-2">4.What factors in your considered opinion would contribute to improved performance in your current and future assignments?</p>
                                        <textarea name="q_four" class="summernote">{{$info->sectionOne->q_four ?? ''}}{{ old('q_four') }}</textarea>
                                    </div>
                                    <div class="form-group w-full">
                                        <p class="font-sans text-green-700 mb-2">5.What major problems did you encounter in your job? Give reasons.</p>
                                        <textarea name="q_five" class="summernote">{{$info->sectionOne->q_five ?? ''}}{{ old('q_five') }}</textarea>
                                    </div>
                                    <div class="form-group w-full">
                                        <p class="font-sans text-green-700 mb-2">6.What other additional suggestions do you offer which may help to improve your work performance and efficiency?</p>
                                        <textarea name="q_six" class="summernote">{{$info->sectionOne->q_six ?? ''}}{{ old('q_six') }}</textarea>
                                    </div>
                                </div>

                                <div class="flex float-right form-group">
                                    @if($info->sectionOne->q_oneA != '')
                                    <a href="{{route('section.two')}}" class="text-green-800 hover:text-blue-600 font-bold px-2">Next <i class="fas fa-arrow-right"></i></a>
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
    @push('scripts')
    <script type="text/javascript">
        add_row()

        function add_row() {
            $rowno = $("#employee_table tr").length;
            $rowno = $rowno + 1;
            $("#employee_table tr:last").after("<tr id='row" + $rowno + "'><td><textarea  name='Objective[]' class='btn-blue' placeholder='Quality Objective' required></textarea></td>'\
 '<td><select  name='status[]' class='btn-blue' required='required'>'\
 '<option value=''>-- Select Status --</option><option value='Achieved'>Achieved</option><option value='Not Achieved'>Not Achieved</option></select></td>'\
 '<td><textarea  name='E_comments[]' class='btn-blue' placeholder='Employee comments' required></textarea></td>'\
 '<td><textarea  name='S_comments[]' class='btn-blue' placeholder='Supervisor comments' required></textarea><i role='button' class='fas fa-trash mt-1 float-right text-red-600 hover:text-red-400' onclick=delete_row('row" + $rowno + "')></i></td>'</tr>");
        }

        function delete_row(rowno) {
            $('#' + rowno).remove();
        }
    </script>
    @endpush
</x-app-layout>