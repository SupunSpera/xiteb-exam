<x-app-layout>
    <x-slot name='title'>
        Prescriptions | Health-Exam
    </x-slot>
    <x-slot name='breadcrumb'>
        <div class="page-title d-flex flex-column me-5">
            <!--begin::Title-->
            <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">Prescriptions</h1>
            <!--end::Title-->
            <!--begin::Breadcrumb-->
            <ul class="breadcrumb breadcrumb-separatorless fw-bold fs-7 pt-1">
                <!--begin::Item-->
                <li class="breadcrumb-item text-muted">
                    <a href="{{ route('dashboard') }}" class="text-muted text-hover-primary">Home</a>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item">
                    <span class="bullet bg-gray-200 w-5px h-2px"></span>
                </li>
                <!--end::Item-->
                <!--begin::Item-->
                <li class="breadcrumb-item text-dark">Prescriptions</li>
                <!--end::Item-->
            </ul>
            <!--end::Breadcrumb-->
        </div>
    </x-slot>
    <x-slot name='content'>
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
            <!--begin::Post-->
            <div class="post d-flex flex-column-fluid" id="kt_post">
                <!--begin::Container-->
                <div id="kt_content_container" class="container-xxl">
                    @if(Auth::user()->user_role==2)
                    <div class="row">
                        <div class="col-lg-12 text-end mb-2 mt-3">

                            <a href="{{ route('prescription.create') }}" class="btn btn-info btn-sm">Create</a>
                        </div>
                    </div>
                    @endif
                    <div class="card">
                        <div class="card-body">
                            <livewire:prescription-data-table />
                        </div>
                    </div>
                </div>
                <!--end::Container-->
            </div>
            <!--end::Post-->
        </div>
    </x-slot>
</x-app-layout>
