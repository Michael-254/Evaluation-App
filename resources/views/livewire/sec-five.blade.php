<div class="content">
    <div class="container">

        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="text-green-800 card-title">
                            Section Five: Personal Objective
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body px-4 animate__animated animate__zoomIn">
                        <p class="text-green-700 text-xs mt-0.5">Indicate at least one personal objective that will specifically address a development need to assist with work performance or career advancement</p>
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />

                        <div class="callout callout-success">
                            <div class="flex justify-end">
                                <svg class="mt-0.5 stroke-current h-9 w-9 animate-spin text-gray-400" wire:loading="wire:loading" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                </svg>
                            </div>
                            <div>
                                <table class="table invoice-detail-table">
                                    <thead>
                                        <tr class="text-green-700">
                                            <th>Proposed Personal Objective</th>
                                            <th>Departmental/Strategic Business Objective it is linked to</th>
                                            <th>How will achievement of this objective be measured</th>
                                            <th>What steps will be taken to achieve this</th>
                                            <th>Completion date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <form wire:submit.prevent="save()">
                                                <td>
                                                    <textarea wire:model.defer="proposed_objective" class="btn-blue"></textarea>
                                                </td>
                                                <td>
                                                    <textarea wire:model.defer="department_linked" class="btn-blue"></textarea>
                                                </td>
                                                <td>
                                                    <textarea wire:model.defer="objective_measurement" class="btn-blue"></textarea>
                                                </td>
                                                <td>
                                                    <textarea wire:model.defer="steps_to_achieve" class="btn-blue"></textarea>
                                                </td>
                                                <td>
                                                    <input wire:model.lazy="completion_date" type="text" class="btn-blue" id="datepicker" autocomplete="false" placeholder="yyyy-mm-dd">
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-success btn-sm">Save</button>
                                                </td>
                                            </form>
                                        </tr>
                                        @foreach($objectives->sectionFive as $objective)
                                        <tr>
                                            <td>{{$objective->proposed_objective}}</td>
                                            <td>{{$objective->department_linked}}</td>
                                            <td>{{$objective->objective_measurement}}</td>
                                            <td>{{$objective->steps_to_achieve}}</td>
                                            <td>{{$objective->completion_date}}</td>
                                            <td><i wire:click="remove({{$objective->id}})" class="fas fa-trash cursor-pointer text-red-600 hover:text-red-800"></i></td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        @if($objectives->sectionFive->count() > 1)
                        <div class="flex float-right form-group">
                            <a href="{{route('section.six')}}" class="text-green-800 hover:text-blue-600 font-bold px-2">Next <i class="fas fa-arrow-right"></i></a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@push('scripts')
<script src="https://cdn.jsdelivr.net/npm/pikaday/pikaday.js"></script>
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/pikaday/css/pikaday.css">
<script src="pikaday.js"></script>
<script>
    var picker = new Pikaday({
        field: document.getElementById('datepicker'),
        format: 'D-MM-YYYY',
        onSelect: function() {
            console.log(this.getMoment().format('Do MM YYYY'));
        }
    });
</script>
@endpush