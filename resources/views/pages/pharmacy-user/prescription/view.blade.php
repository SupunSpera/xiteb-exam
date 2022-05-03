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

                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-lg-4">
                                    <h6>Images</h6>
                                    <div style="height:50vh;overflow:scroll">
                                        @foreach ($prescription->prescriptionImages as $image)
                                        <li>
                                           <img class="my-2" src="{{ asset('storage/media/'.$image->image->name) }}" alt="" style="max-width:200px;">
                                        </li>
                                        @endforeach
                                    </div>
                                </div>
                                <div class="col-lg-8">
                                    <h6>
                                       Note:  {{ $prescription->note }}
                                    </h6>
                                    <h6>
                                        Delivery Address:  {{ $prescription->delivery_address }}
                                    </h6>
                                    <h6>
                                        Delivery Time:  {{ $prescription->delivery_time }}
                                    </h6>
                                 </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!--end::Container-->
            </div>
            <!--end::Post-->
        </div>
    </x-slot>
</x-app-layout>
