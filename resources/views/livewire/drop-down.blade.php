<div class="content">
    <div class="container">

        <!-- /.row -->
        <div class="row">
            <div class="col-md-12">
                <div class="card card-default">
                    <div class="card-header">
                        <h3 class="text-green-800 card-title">
                            Add Dropdown Items
                        </h3>
                    </div>
                    <!-- /.card-header -->
                    <div class="card-body px-4 animate__animated animate__zoomIn">
                        <!-- Validation Errors -->
                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                        <div class="callout callout-danger">
                            <div class="flex justify-end px-2 mb-2">
                                <div class="flex justify-center">
                                    <svg class="mt-0.5 stroke-current h-9 w-9 animate-spin text-gray-400" wire:loading="wire:loading" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M10.325 4.317c.426-1.756 2.924-1.756 3.35 0a1.724 1.724 0 002.573 1.066c1.543-.94 3.31.826 2.37 2.37a1.724 1.724 0 001.065 2.572c1.756.426 1.756 2.924 0 3.35a1.724 1.724 0 00-1.066 2.573c.94 1.543-.826 3.31-2.37 2.37a1.724 1.724 0 00-2.572 1.065c-.426 1.756-2.924 1.756-3.35 0a1.724 1.724 0 00-2.573-1.066c-1.543.94-3.31-.826-2.37-2.37a1.724 1.724 0 00-1.065-2.572c-1.756-.426-1.756-2.924 0-3.35a1.724 1.724 0 001.066-2.573c-.94-1.543.826-3.31 2.37-2.37.996.608 2.296.07 2.572-1.065z"></path>
                                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 12a3 3 0 11-6 0 3 3 0 016 0z"></path>
                                    </svg>
                                </div>
                            </div>
                            <div>

                                <div class=" flex justify-between space-x-2 pb-8">
                                    <select wire:model.defer="type" class="btn-blue">
                                        <option value="">-- Select --</option>
                                        <option value="Skill">Skill</option>
                                        <option value="Experience">Experience</option>
                                        <option value="Knowledge">Knowledge</option>
                                        <option value="Other">Other</option>
                                        <option value="achieved">How it will achieved</option>
                                        <option value="responsible">Persons Responsible</option>
                                    </select>
                                    <input type="text" wire:model.defer="dropdown_item" class="btn-blue" />
                                    <x-button type="submit" wire:click.prevent="save()" class="bg-green-700 hover:bg-blue-500">Save</x-button>
                                </div>


                                @foreach($dropdowns as $dropdown)
                                <div class="row mt-3 px-2">
                                    <div class="col-sm-4">
                                        {{$dropdown->type}}
                                    </div>
                                    <div class="col-sm-4">
                                        {{$dropdown->dropdown_item}}
                                    </div>
                                    <div class="col-sm-4">
                                        <i wire:click="remove({{$dropdown->id}})" class="fas fa-trash cursor-pointer text-red-600 hover:text-red-800"></i>
                                    </div>

                                </div>
                                @endforeach

                                <div class="pt-4 flex justify-end">
                                    {{$dropdowns->links()}}
                                </div>
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>