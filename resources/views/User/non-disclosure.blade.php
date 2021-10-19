<x-app-layout>
    <!-- Main content -->
    <div class="content">
        <div class="container">

            <!-- /.row -->
            <div class="row">
                <div class="col-md-12">
                    <div class="card card-default">
                        <div class="card-header">
                            <h3 class=" font-bold card-title text-green-600">Confidentiality Information</h3>
                        </div>
                        <div class="card-body px-2">
                            <div class="content animate__animated animate__zoomIn" aria-labelledby="notice-part-trigger">
                                <div class="max-w-md mx-auto overflow-hidden md:max-w-md">
                                    <div class="md:flex">
                                        <div class="w-full p-3 py-10">
                                            <div class="flex justify-center">
                                                <i class="fas fa-info-circle fill-current text-4xl text-yellow-400"></i>
                                            </div>
                                            <div class="flex justify-center mt-3"> <span class="text-xl mb-4 font-medium">Kindly note</span> </div>
                                            <p class="px-16 text-center text-gray-400">This document when completed is confidential to the jobholder, the Supervisor, the Head of Department, the Human Resource manager and the Managing Director.</p>
                                            <p class="text-center text-red-600">All fields are mandatory</p>
                                            <div class="px-14 mt-3 flex justify-center"> <a role="button" href="{{route('more.information')}}" class=" flex justify-center items-center bg-green-700 px-2 py-2 w-full text-white text-md rounded-md hover:shadow hover:bg-blue-600">Lets get Started 😁</a> </div>
                                        </div>
                                    </div>
                                </div>
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
</x-app-layout>