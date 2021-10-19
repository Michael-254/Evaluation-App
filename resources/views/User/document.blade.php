<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Perfomance Evaluation Report</title>
    <style type="text/css" media="screen">
        html {
            font-family: sans-serif;
            line-height: 1.15;
            margin: 0;
        }


        body {
            font-family: -apple-system, BlinkMacSystemFont, "Segoe UI", Roboto, "Helvetica Neue", Arial, "Noto Sans", sans-serif, "Apple Color Emoji", "Segoe UI Emoji", "Segoe UI Symbol", "Noto Color Emoji";
            font-weight: 400;
            line-height: 1.5;
            color: #212529;
            text-align: left;
            background-color: #fff;
            margin: 36pt;
        }

        h4 {
            margin-top: 0;
            margin-bottom: 0.5rem;
        }

        .mt-1 {
            margin-top: 3;
            margin-bottom: 2rem;
        }

        p {
            margin-top: 0;
            margin-bottom: 1rem;
        }

        strong {
            font-weight: bolder;
        }

        img {
            vertical-align: middle;
            border-style: none;
        }

        table {
            border-collapse: collapse;
        }

        th {
            text-align: inherit;
        }

        h4,
        .h4 {
            margin-bottom: 0.5rem;
            font-weight: 500;
            line-height: 1.2;
        }

        h4,
        .h4 {
            font-size: 1.5rem;
        }

        .table {
            width: 100%;
            margin-bottom: 1rem;
            color: #212529;
        }

        .borderless {
            background-color: white;
            border: white;
        }

        .table th,
        .table td {
            padding: 0.75rem;
            vertical-align: top;
            border-top: 1px solid #dee2e6;
        }

        .table thead th {
            vertical-align: bottom;
            border-bottom: 2px solid #dee2e6;
        }

        .table tbody+tbody {
            border-top: 2px solid #dee2e6;
        }

        .mt-5 {
            margin-top: 3rem !important;
        }

        .pr-0,
        .px-0 {
            padding-right: 0 !important;
        }

        .pl-0,
        .px-0 {
            padding-left: 0 !important;
        }

        .text-right {
            text-align: right !important;
        }

        .text-center {
            text-align: center !important;
        }

        .text-uppercase {
            text-transform: uppercase !important;
        }

        * {
            font-family: "DejaVu Sans";
        }

        body,
        h1,
        h2,
        h3,
        h4,
        h5,
        h6,
        table,
        th,
        tr,
        td,
        p,
        div {
            line-height: 1.1;
        }

        .party-header {
            font-size: 1.5rem;
            font-weight: 400;
        }

        .total-amount {
            font-size: 12px;
            font-weight: 700;
        }

        .border-0 {
            border: none !important;
        }
    </style>
</head>

<body>
    <!-- invoice page -->
    <section class="card">
        <div class="card-body">
            <!-- Invoice Company Details -->
            <div class="row">
                <table style="width: 100%;">
                    <tr>
                        <td>
                            <div class="col-sm-6 col-12 text-left pt-1">
                                <div class="media pt-1">
                                    <img src="https://miti-magazine.betterglobeforestry.com/storage/logo.png" width="100" height="100" alt="company logo" />
                                </div>
                            </div>
                        </td>
                        <td>
                            <div class="col-sm-6 col-12 text-right">
                                <div class="invoice-details mt-2">
                                    <h2 class="text-dark mb-1">Staff Perfomance Evaluation</h2>
                                </div>
                            </div>
                        </td>
                    </tr>
                </table>


            </div>
            <!--/ Invoice Company Details -->

            <!-- Invoice Recipient Details -->
            <div class="row mt-1">
                <table style="width: 100%;">
                    @foreach($data['more_info'] as $personal_data)
                    <tr>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">Employee Name: </h5>
                                <div>{{$data['name']}}</div>
                            </div>
                        </td>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">Department: </h5>
                                <div>{{$data['department']}}</div>
                            </div>
                        </td>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">Academic/Professional qualifications: </h5>
                                <div>{{$personal_data['Academic']}}</div>
                            </div>
                        </td>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">Current Designation: </h5>
                                <div>{{$personal_data['Designation']}}</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">Years of service at BGF: </h5>
                                <div>{{$personal_data['service_years']}}</div>
                            </div>
                        </td>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">Period Under Review: </h5>
                                <div>{{$personal_data['review_period']}}</div>
                            </div>
                        </td>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">Last Appraisal Overall Assesment: </h5>
                                <div>{{$personal_data['last_appraisal']}}</div>
                            </div>
                        </td>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">Reviewing supervisor: </h5>
                                <div>{{App\Models\User::find($personal_data['review_supervisor'])->name}}</div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <!--/ Invoice Recipient Details -->
            <hr>
            <!-- Invoice Recipient Details -->
            <div class="row mt-1">
                <table style="width: 100%;">
                    <tr>
                        <td>
                            <h4 class="text-dark mb-1">Section 1: </h4>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <h5 class="text-dark mb-1">1. What is your major role in your position to achieve the company objective</h5>
                        </td>
                    </tr>
                    @foreach($data['section_one'] as $first_section)
                    <tr>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">(a) Briefly list the main responsibilities and duties of your current job</h5>
                                <div>{!!$first_section['q_oneA']!!}</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">(b) Special tasks (if any)</h5>
                                <div>{!!$first_section['q_oneB']!!}</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">(c) How do you relate to the vision and mission of the company?</h5>
                                <div>{!!$first_section['q_oneC'] !!}</div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <!--/ Invoice Recipient Details -->

            <div class="row">
                <h5 class="text-dark mb-1">2. Review of the Set Quality Objectives </h5>
                <h5 class="text-green-700 text-xs">(Looking back over the period, assess what you have achieved, and what has not gone so well)</h5>
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
                        @foreach(App\Models\SectionOnePartB::where('section_one_id',$first_section['id'])->get()->toArray() as $objective)
                        <tr>
                            <td>{{$objective['Objective']}}</td>
                            <td>{{$objective['status']}}</td>
                            <td>{{$objective['E_comments']}}</td>
                            <td>{{$objective['S_comments']}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row mt-1">
                <table style="width: 100%;">
                    @foreach($data['section_one'] as $first_section)
                    <tr>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">3.What achievements are you most proud of this year?</h5>
                                <div>{!!$first_section['q_three']!!}</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">4.What factors in your considered opinion would contribute to improved performance in your current and future assignments?</h5>
                                <div>{!!$first_section['q_four']!!}</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">5.What major problems did you encounter in your job? Give reasons.</h5>
                                <div>{!!$first_section['q_five'] !!}</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">6.What other additional suggestions do you offer which may help to improve your work performance and efficiency?</h5>
                                <div>{!!$first_section['q_six'] !!}</div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <hr>

            <div class="row mt-1">
                <h4 class="text-dark mb-1">Section 2: Behavioural Competencies</h4>
                <h5 class="text-dark mb-1">The choice for which competencies are relevant to the job should be mutually agreed between the employee and the reviewing supervisor. Not all competencies may be appropriate to every role</h5>
                <h5 class="text-green-700 text-xs">1: Poor 2: Improvable 3: Good 4: Good+ 5: Excellent </h5>
                <table class="table invoice-detail-table">
                    <thead>
                        <tr class="text-green-700">
                            <th>Competence Relevant to job</th>
                            <th>Employee level</th>
                            <th>Supervisor level</th>
                            <th>Comments (How will this be achieved)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['section_two'] as $section_two)
                        <tr>
                            <td class="text-sm">{{App\Models\Competence::find($section_two['Competence_id'])->competence_skill}}</td>
                            <td><span>{{$section_two['Employee_level']}}</span></td>
                            <td><span>{{$section_two['Supervisor_level']}}</span></td>                       
                            <td><span>{{$section_two['Comments']}}</span></td>                           
                        </tr>
                        @endforeach
                      @php 
                       $employee = array_sum(\Arr::pluck($data['section_two'],'Employee_level')); 
                       $supervisor = array_sum(\Arr::pluck($data['section_two'],'Supervisor_level')); 
                         @endphp
                        <tr>
                            <td class="text-sm">Total</td>
                            <td><span class="flex justify-center items-center mt-1">{{$employee}}</span></td>
                            <td><span class="flex justify-center items-center mt-1">{{$supervisor}}</span></td>
                        </tr>
                        <tr>
                            <td class="text-sm">Average</td>
                            <td>
                                <div class="flex justify-center items-center mt-1 space-x-1 text-sm">
                                    <span>{{($employee + $supervisor)/2}}</span> /
                                    <span> {{count($data['section_two']) * 5}}</span>
                                </div>
                            </td>
                        </tr>
                    </tbody>
                </table>
                <table style="width: 100%;">
                    <tr>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">Employee Signature: </h5>
                                <div>{{$data['name']}}</div>
                            </div>
                        </td>
                        @foreach($data['more_info'] as $personal_data)
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">Employee Date: </h5>
                                <div>{{current(explode("T", $personal_data['created_at']))}}</div>
                            </div>
                        </td>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">Supervisor Signature: </h5>
                                <div>{{App\Models\User::find($personal_data['review_supervisor'])->name}}</div>
                            </div>
                        </td>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">Supervisor Date: </h5>
                                <div>{{current(explode("T", $personal_data['created_at']))}}</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">HOD Signature: </h5>
                                <div>{{App\Models\User::find($personal_data['review_hod'])->name}}</div>
                            </div>
                        </td>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">HOD Date: </h5>
                                <div>{{current(explode("T", $personal_data['updated_at']))}}</div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <hr>

            <div class="row">
                <h3 class="text-dark mb-1">Section Three: Training and Development Planning </h3>
                <h5 class="text-green-700 text-xs">To be filled by employee then discussed and agreed with the supervisor & Head of department</h5>
                <table class="table invoice-detail-table">
                    <thead>
                        <tr class="text-green-700">
                            <th>Type</th>
                            <th>Type of Training or development required</th>
                            <th>How will it be achieved</th>
                            <th>Person Responsible</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($data['section_three'] as $training)
                        @if($training['topic'] == 'Skill')
                        <tr>
                            <td>Skill</td>
                            <td>{{$training['training_required']}}</td>
                            <td>{{$training['how_achieved']}}</td>
                            <td>{{$training['person_responsible']}}</td>
                        </tr>
                        @endif
                        @if($training['topic'] == 'Experience')
                        <tr>
                            <td>Experience</td>
                            <td>{{$training['training_required']}}</td>
                            <td>{{$training['how_achieved']}}</td>
                            <td>{{$training['person_responsible']}}</td>
                        </tr>
                        @endif
                        @if($training['topic'] == 'Knowledge')
                        <tr>
                            <td>Knowledge</td>
                            <td>{{$training['training_required']}}</td>
                            <td>{{$training['how_achieved']}}</td>
                            <td>{{$training['person_responsible']}}</td>
                        </tr>
                        @endif
                        @if($training['topic'] == 'Other')
                        <tr>
                            <td>Other</td>
                            <td>{{$training['training_required']}}</td>
                            <td>{{$training['how_achieved']}}</td>
                            <td>{{$training['person_responsible']}}</td>
                        </tr>
                        @endif
                        @endforeach
                    </tbody>
                </table>
            </div>

            <div class="row mt-1">
                <table style="width: 100%;">
                    <tr>
                        <td><h3 class="text-dark mb-1">Section Four: Support Mechanisms</h3></td>
                    </tr>
                    @foreach($data['section_four'] as $section_four)
                    <tr>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">1. What support mechanisms from your supervisor or other parts of the organization have worked well and what can be improved upon</h5>
                                <div>{!!$section_four['sup_works_well']!!}</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">Supervisor: Need for improvement</h5>
                                <div>{!!$section_four['sup_needs_improvement'] !!}</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">Other parts of the Organization: What has worked well</h5>
                                <div>{!!$section_four['org_works_well'] !!}</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">Other parts of the Organization: Need for improvement</h5>
                                <div>{!!$section_four['org_needs_improvement']!!}</div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <hr>

            <div class="row">
                <h3 class="text-dark mb-1">Section Five: Personal Objective </h3>
                <table class="table invoice-detail-table">
                    <thead>
                        <th>Proposed Personal Objective</th>
                        <th>Departmental/Strategic Business Objective it is linked to</th>
                        <th>How will achievement of this objective be measured</th>
                        <th>What steps will be taken to achieve this</th>
                        <th>Completion date</th>
                    </thead>
                    <tbody>
                        @foreach($data['section_five'] as $objective)
                        <tr>
                            <td>{{$objective['proposed_objective']}}</td>
                            <td>{{$objective['department_linked']}}</td>
                            <td>{{$objective['objective_measurement']}}</td>
                            <td>{{$objective['steps_to_achieve']}}</td>
                            <td>{{$objective['completion_date']}}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
            <hr>

            <div class="row mt-1">
                <table style="width: 100%;">
                    <tr>
                        <td><h3 class="text-dark mb-1">Section Six: Overall Comments</h3></td>
                    </tr>
                    <tr>
                        <td><h5 class="text-dark mb-1">Based on discussions on the five sections above</h5></td>
                    </tr>
                    @foreach($data['section_six'] as $section_six)
                    <tr>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">Employee: Comments</h5>
                                <div>{!!$section_six['employee_comments']!!}</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">Supervisor: Comments</h5>
                                <div>{!!$section_six['supervisor_comments'] !!}</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">HOD: Comments</h5>
                                <div>{!!$section_six['hod_comments'] !!}</div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>
            <hr>

            <div class="row mt-1">
                <table style="width: 100%;">
                    <tr>
                        <td><h3 class="text-dark mb-1">Signed as an agreed record</h3></td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">Employee Signature: </h5>
                                <div>{{$data['name']}}</div>
                            </div>
                        </td>
                        @foreach($data['more_info'] as $personal_data)
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">Employee Date: </h5>
                                <div>{{current(explode("T", $personal_data['created_at']))}}</div>
                            </div>
                        </td>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">Supervisor Signature: </h5>
                                <div>{{App\Models\User::find($personal_data['review_supervisor'])->name}}</div>
                            </div>
                        </td>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">Supervisor Date: </h5>
                                <div>{{current(explode("T", $personal_data['created_at']))}}</div>
                            </div>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">HOD Signature: </h5>
                                <div>{{App\Models\User::find($personal_data['review_hod'])->name}}</div>
                            </div>
                        </td>
                        <td>
                            <div>
                                <h5 class="text-dark mb-1">HOD Date: </h5>
                                <div>{{current(explode("T", $personal_data['updated_at']))}}</div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </table>
            </div>

        </div>
    </section>
    <!-- invoice page end -->

</body>

</html>