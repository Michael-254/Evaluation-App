<x-app-layout>
    <!-- Main content -->
    <div class="content">
        <div class="container">

            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class=" font-bold card-title text-green-600">Follow Up</h3>
                        </div>
                        <div class="card-body px-2">
                            <div class="content animate__animated animate__zoomIn" aria-labelledby="notice-part-trigger">

                                <section class="content">
                                    <div class="container-fluid">
                                        <div class="row">
                                            <div class="col-12 table-responsive">

                                                <table id="example1" class="table-responsive table table-bordered table-striped">
                                                    <thead>
                                                        <td> Employee Name</td>
                                                        <td> Department</td>
                                                        <td> Site</td>
                                                        <td> Designation</td>
                                                        <td> Objective Type</td>
                                                        <td> Objective status</td>
                                                        <td> Employee comments</td>
                                                        <td> Supervisor Comments</td>
                                                        <td> Employee Marks</td>
                                                        <td> Supervisor Marks</td>
                                                        <td> Marks Out Of</td>
                                                        <td> T&D Skill</td>
                                                        <td> T&D Knowledge</td>
                                                        <td> T&D Experience</td>
                                                        <td> T&D Other</td>
                                                        <td> Supervisor Works Well</td>
                                                        <td> Supervisor Needs Improvement</td>
                                                        <td> Org Works Well</td>
                                                        <td> Org Needs Improvement</td>
                                                        <td> Employee Comments</td>
                                                        <td> Supervisor Comments</td>
                                                        <td> HOD Comments</td>
                                                    </thead>
                                                    <tbody>
                                                        @foreach($users as $user)
                                                        <tr>
                                                            <td>{{$user->name}}</td>
                                                            <td>{{$user->department}}</td>
                                                            <td>{{$user->site}}</td>
                                                            <td>{{$user->job_title}}</td>
                                                            <td>
                                                                @foreach($user->items as $item)
                                                                <li>{{$item->Objective}}</li>
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach($user->items as $item)
                                                                <li>{{$item->status}}</li>
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach($user->items as $item)
                                                                <li>{{$item->E_comments}}</li>
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach($user->items as $item)
                                                                <li>{{$item->S_comments}}</li>
                                                                @endforeach
                                                            </td>

                                                            </td>
                                                            <td>{{$user->section_two->sum('Employee_level')}}</td>
                                                            <td>{{$user->section_two->sum('Supervisor_level')}}</td>
                                                            <td>{{$user->section_two->count('Competence_id')*5}}</td>
                                                            <td>
                                                                @foreach($user->section_three as $item)
                                                                @if($item->topic == 'Skill')
                                                                <ul>
                                                                    <li>{{$item->training_required}}</li>
                                                                </ul>
                                                                @endif
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach($user->section_three as $item)
                                                                @if($item->topic == 'Experience')
                                                                <ul>
                                                                    <li>{{$item->training_required}}</li>
                                                                </ul>
                                                                @endif
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach($user->section_three as $item)
                                                                @if($item->topic == 'Knowledge')
                                                                <ul>
                                                                    <li>{{$item->training_required}}</li>
                                                                </ul>
                                                                @endif
                                                                @endforeach
                                                            </td>
                                                            <td>
                                                                @foreach($user->section_three as $item)
                                                                @if($item->topic == 'Other')
                                                                <ul>
                                                                    <li>{{$item->training_required}}</li>
                                                                </ul>
                                                                @endif
                                                                @endforeach
                                                            </td>
                                                            <td>{!!$user->section_four->first()->sup_works_well ?? ''!!}</td>
                                                            <td>{!!$user->section_four->first()->sup_needs_improvement ?? ''!!}</td>
                                                            <td>{!!$user->section_four->first()->org_works_well ?? ''!!}</td>
                                                            <td>{!!$user->section_four->first()->org_needs_improvement ?? ''!!}</td>
                                                            <td>{!!$user->section_six->first()->employee_comments ?? ''!!}</td>
                                                            <td>{!!$user->section_six->first()->supervisor_comments ?? ''!!}</td>
                                                            <td>{!!$user->section_six->first()->hod_comments ?? ''!!}</td>
                                                        </tr>
                                                        @endforeach
                                                    </tbody>
                                                </table>

                                            </div><!-- /.col -->
                                        </div><!-- /.row -->
                                    </div><!-- /.container-fluid -->
                                </section>

                            </div>

                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
            <!-- /.card -->
        </div>
    </div>
    <!-- /.row -->

    </div><!-- /.container-fluid -->
    </div>
    <!-- /.content -->
</x-app-layout>