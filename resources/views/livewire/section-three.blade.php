<div class="content">
    <div class="container">

        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="text-green-800 card-title">
                            Section Three: Training and Development Planning
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body px-4 animate__animated animate__zoomIn">
                        <p class="text-green-700 text-xs mt-0.5">To be filled by employee then discussed and agreed with the supervisor & Head of department</p>
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="callout callout-danger">
                            <div class="flex justify-between">
                                <h5 class="text-red-700 text-sm font-bold mt-1">Skills</h5>
                                <div class="flex justify-center">
                                    <svg class="mt-0.5 stroke-current h-9 w-9 animate-spin text-gray-400" wire:loading="wire:loading" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <table class="table invoice-detail-table">
                                    <thead>
                                        <tr class="text-red-700">
                                            <th>Type of Training or development required</th>
                                            <th>How will it be achieved</th>
                                            <th>Person Responsible</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <form wire:submit.prevent="skill()">
                                                <td>
                                                    <select wire:model.defer="training_required" class="btn-blue">
                                                        <option value="">-- Select --</option>
                                                        @foreach($dropdowns as $dropdown)
                                                        @if($dropdown->type == 'Skill')
                                                        <option value="{{$dropdown->dropdown_item}}">{{$dropdown->dropdown_item}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <select wire:model.defer="how_achieved" class="btn-blue">
                                                        <option value="">-- Select --</option>
                                                        @foreach($dropdowns as $dropdown)
                                                        @if($dropdown->type == 'achieved')
                                                        <option value="{{$dropdown->dropdown_item}}">{{$dropdown->dropdown_item}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <select wire:model.defer="person_responsible" class="btn-blue">
                                                        <option value="">-- Select --</option>
                                                        @foreach($dropdowns as $dropdown)
                                                        @if($dropdown->type == 'responsible')
                                                        <option value="{{$dropdown->dropdown_item}}">{{$dropdown->dropdown_item}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-app bg-info"><i class="fas fa-save"></i> Save</button>
                                                </td>
                                            </form>
                                        </tr>
                                        @foreach($trainings->sectionThree as $training)
                                        @if($training->topic == 'Skill')
                                        <tr>
                                            <td>{{$training->training_required}}</td>
                                            <td>{{$training->how_achieved}}</td>
                                            <td>{{$training->person_responsible}}</td>
                                            <td><i wire:click="remove({{$training->id}})" class="fas fa-trash cursor-pointer text-red-600 hover:text-red-800"></i></td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="callout callout-info">
                            <div class="flex justify-between">
                                <h5 class="text-blue-600 text-sm font-bold mt-1">Experience</h5>
                                <div class="flex justify-center">
                                    <svg class="mt-0.5 stroke-current h-9 w-9 animate-spin text-gray-400" wire:loading="wire:loading" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <table class="table invoice-detail-table">
                                    <thead>
                                        <tr class="text-blue-700">
                                            <th>Type of Training or development required</th>
                                            <th>How will it be achieved</th>
                                            <th>Person Responsible</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <form wire:submit.prevent="experience()">
                                                <td>
                                                    <select wire:model.defer="training_required" class="btn-blue">
                                                        <option value="">-- Select --</option>
                                                        @foreach($dropdowns as $dropdown)
                                                        @if($dropdown->type == 'Skill')
                                                        <option value="{{$dropdown->dropdown_item}}">{{$dropdown->dropdown_item}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <select wire:model.defer="how_achieved" class="btn-blue">
                                                        <option value="">-- Select --</option>
                                                        @foreach($dropdowns as $dropdown)
                                                        @if($dropdown->type == 'achieved')
                                                        <option value="{{$dropdown->dropdown_item}}">{{$dropdown->dropdown_item}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <select wire:model.defer="person_responsible" class="btn-blue">
                                                        <option value="">-- Select --</option>
                                                        @foreach($dropdowns as $dropdown)
                                                        @if($dropdown->type == 'responsible')
                                                        <option value="{{$dropdown->dropdown_item}}">{{$dropdown->dropdown_item}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-app bg-primary"><i class="fas fa-save"></i> Save</button>
                                                </td>
                                            </form>
                                        </tr>
                                        @foreach($trainings->sectionThree as $training)
                                        @if($training->topic == 'Experience')
                                        <tr>
                                            <td>{{$training->training_required}}</td>
                                            <td>{{$training->how_achieved}}</td>
                                            <td>{{$training->person_responsible}}</td>
                                            <td><i wire:click="remove({{$training->id}})" class="fas fa-trash cursor-pointer text-red-600 hover:text-red-800"></i></td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="callout callout-warning">
                            <div class="flex justify-between">
                                <h5 class="text-yellow-300 text-sm font-bold mt-1">Knowledge</h5>
                                <div class="flex justify-center">
                                    <svg class="mt-0.5 stroke-current h-9 w-9 animate-spin text-gray-400" wire:loading="wire:loading" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <table class="table invoice-detail-table">
                                    <thead>
                                        <tr class="text-yellow-300">
                                            <th>Type of Training or development required</th>
                                            <th>How will it be achieved</th>
                                            <th>Person Responsible</th>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <form wire:submit.prevent="Knowledge()">
                                                <td>
                                                    <select wire:model.defer="training_required" class="btn-blue">
                                                        <option value="">-- Select --</option>
                                                        @foreach($dropdowns as $dropdown)
                                                        @if($dropdown->type == 'Skill')
                                                        <option value="{{$dropdown->dropdown_item}}">{{$dropdown->dropdown_item}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <select wire:model.defer="how_achieved" class="btn-blue">
                                                        <option value="">-- Select --</option>
                                                        @foreach($dropdowns as $dropdown)
                                                        @if($dropdown->type == 'achieved')
                                                        <option value="{{$dropdown->dropdown_item}}">{{$dropdown->dropdown_item}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <select wire:model.defer="person_responsible" class="btn-blue">
                                                        <option value="">-- Select --</option>
                                                        @foreach($dropdowns as $dropdown)
                                                        @if($dropdown->type == 'responsible')
                                                        <option value="{{$dropdown->dropdown_item}}">{{$dropdown->dropdown_item}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-app bg-warning"><i class="fas fa-save"></i> Save</button>
                                                </td>
                                            </form>
                                        </tr>
                                        @foreach($trainings->sectionThree as $training)
                                        @if($training->topic == 'Knowledge')
                                        <tr>
                                            <td>{{$training->training_required}}</td>
                                            <td>{{$training->how_achieved}}</td>
                                            <td>{{$training->person_responsible}}</td>
                                            <td><i wire:click="remove({{$training->id}})" class="fas fa-trash cursor-pointer text-red-600 hover:text-red-800"></i></td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        <div class="callout callout-success">
                            <div class="flex justify-between">
                                <h5 class="text-green-700 text-sm font-bold mt-1">Other</h5>
                                <div class="flex justify-center">
                                    <svg class="mt-0.5 stroke-current h-9 w-9 animate-spin text-gray-400" wire:loading="wire:loading" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>
                                <table class="table invoice-detail-table">
                                    <thead>
                                        <tr class="text-green-700">
                                            <th>Type of Training or development required</th>
                                            <th>How will it be achieved</th>
                                            <th>Person Responsible</th>
                                            <td>Action</td>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <form wire:submit.prevent="Other()">
                                                <td>
                                                    <select wire:model.defer="training_required" class="btn-blue">
                                                        <option value="">-- Select --</option>
                                                        @foreach($dropdowns as $dropdown)
                                                        @if($dropdown->type == 'Skill')
                                                        <option value="{{$dropdown->dropdown_item}}">{{$dropdown->dropdown_item}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <select wire:model.defer="how_achieved" class="btn-blue">
                                                        <option value="">-- Select --</option>
                                                        @foreach($dropdowns as $dropdown)
                                                        @if($dropdown->type == 'achieved')
                                                        <option value="{{$dropdown->dropdown_item}}">{{$dropdown->dropdown_item}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <select wire:model.defer="person_responsible" class="btn-blue">
                                                        <option value="">-- Select --</option>
                                                        @foreach($dropdowns as $dropdown)
                                                        @if($dropdown->type == 'responsible')
                                                        <option value="{{$dropdown->dropdown_item}}">{{$dropdown->dropdown_item}}</option>
                                                        @endif
                                                        @endforeach
                                                    </select>
                                                </td>
                                                <td>
                                                    <button type="submit" class="btn btn-app bg-success"><i class="fas fa-save"></i> Save</button>
                                                </td>
                                            </form>
                                        </tr>
                                        @foreach($trainings->sectionThree as $training)
                                        @if($training->topic == 'Other')
                                        <tr>
                                            <td>{{$training->training_required}}</td>
                                            <td>{{$training->how_achieved}}</td>
                                            <td>{{$training->person_responsible}}</td>
                                            <td><i wire:click="remove({{$training->id}})" class="fas fa-trash cursor-pointer text-red-600 hover:text-red-800"></i></td>
                                        </tr>
                                        @endif
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                        @if($trainings->sectionThree->count() > 3)
                        <div class="flex justify-end form-group">
                            <a href="{{route('section.four')}}" class="text-green-800 hover:text-blue-600 font-bold px-2">Next <i class="fas fa-arrow-right"></i></a>
                        </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>