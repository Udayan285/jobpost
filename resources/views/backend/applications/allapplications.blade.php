@extends('backend.newlayout')

@section('backendContent')
    

                <h2 class="intro-y fs-lg fw-medium mt-10">
                    Applications List
                </h2>
                <div class="grid columns-12 gap-6 mt-5">
                 
                    <!-- BEGIN: Data List -->
                    <div class="intro-y g-col-12 overflow-auto overflow-lg-visible">
                        <table class="table table-report mt-n2">
                            <thead>
                                <tr>
                                    <th class="text-nowrap">APPLICANT IMAGE</th>
                                    <th class="text-nowrap">NAME</th>
                                    <th class="text-center text-nowrap">EMAIL</th>
                                    <th class="text-center text-nowrap">PHONE</th>
                                    <th class="text-center text-nowrap">JOB POST</th>
                                    @role('admin')
                                    <th class="text-center text-nowrap">ACTIONS</th>
                                    @endrole
                                </tr>
                            </thead>
                            <tbody>

                                @foreach ($applications as $application)                                                                 
                                <tr class="intro-x">
                                    <td class="w-40">
                                        <div class="d-flex">
                                            <div class="w-10 h-10 image-fit zoom-in">
                                                <img alt="udayan-job-post-project" class="tooltip rounded-circle" src="{{ $application->img_url }}" title="Applicant Image">
                                            </div>
                                          
                                        </div>
                                    </td>
                                    <td>
                                        <a href="side-menu-light-crud-data-list.html" class="fw-medium text-nowrap">{{ $application->name }}</a> 

                                    </td>
                                    <td class="text-center">{{ $application->email }}</td>
                                    <td class="w-40">
                                        <div class="d-flex align-items-center justify-content-center text-theme-9"> <i data-feather="phone" class="w-4 h-4 me-2"></i> {{ $application->phone }} </div>
                                    </td>
                                    <td class="w-40">
                                        <div class="d-flex align-items-center justify-content-center ">  {{ $application->post_title }} </div>
                                    </td>
                                    @role('admin')
                                        
                                    <td class="table-report__action w-56">
                                        <div class="d-flex justify-content-center align-items-center">
                                            <a class="d-flex align-items-center text-theme-6" href="{{ route('appications.delete',$application->id) }} " > <i data-feather="trash-2" class="w-4 h-4 me-1"></i> Delete </a>
                                        </div>
                                    </td>
                                    @endrole
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
             
                </div>
                <!-- BEGIN: Delete Confirmation Modal -->
                <div id="delete-confirmation-modal" class="modal fade" tabindex="-1" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-body p-0">
                                <div class="p-5 text-center">
                                    <i data-feather="x-circle" class="w-16 h-16 text-theme-6 mx-auto mt-3"></i> 
                                    <div class="fs-3xl mt-5">Are you sure?</div>
                                    <div class="text-gray-600 mt-2">
                                        Do you really want to delete these records? 
                                        <br>
                                        This process cannot be undone.
                                    </div>
                                </div>
                                <div class="px-5 pb-8 text-center">
                                    <button type="button" data-bs-dismiss="modal" class="btn btn-outline-secondary w-24 me-1">Cancel</button>
                                    <button type="button" class="btn btn-danger w-24">Delete</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- END: Delete Confirmation Modal -->

@endsection