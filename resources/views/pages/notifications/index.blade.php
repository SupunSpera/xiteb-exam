<x-app-layout>
    <x-slot name='title'>
        Notifications | Health-Exam
    </x-slot>
    <x-slot name='breadcrumb'>
        <div class="page-title d-flex flex-column me-5">
            <!--begin::Title-->
            <h1 class="d-flex flex-column text-dark fw-bolder fs-3 mb-0">Notifications</h1>
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
                <li class="breadcrumb-item text-dark">Notifications</li>
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
                    <div class="row">
                        <div class="col-xl-3">
                            <!--begin::Statistics Widget 5-->
                            <a href="{{ route('notifications.index') }}"
                                class="card bg-body-white hoverable card-xl-stretch mb-xl-8">
                                <!--begin::Body-->
                                <div class="card-body">
                                    <!--begin::Svg Icon | path: icons/duotune/ecommerce/ecm002.svg-->
                                    <span class="svg-icon svg-icon-primary svg-icon-3x ms-n1">
                                        <i class="fa-3x fa fa-bell"></i>
                                    </span>
                                    <!--end::Svg Icon-->
                                    <div class="text-gray-900 fw-bolder fs-2 mb-2 mt-5">Notifications</div>
                                    <div class="fw-bold text-gray-400">
                                        <livewire:notifications.notification-count />
                                    </div>
                                </div>
                                <!--end::Body-->
                            </a>
                            <!--end::Statistics Widget 5-->
                        </div>
                        <div class="card">
                            <div class="card-body">
                                <livewire:notifications.notification-data-table />
                            </div>
                        </div>
                    </div>

                </div>
                <!--end::Container-->
            </div>
            <!--end::Post-->
        </div>
        @push('scripts')

        <script>
            function changeStatusNotification(id,status,title = "Do You Want To Change Status!", btnText = "Yes, Change Status ", msg =
            "Status Changed Successfully") {
            $.confirm({
                title: 'Are You Sure,',
                content: title,
                autoClose: 'cancel|8000',
                type: 'red',
                confirmButton: "Yes",
                cancelButton: "Cancel",
                theme: 'material',
                backgroundDismiss: false,
                backgroundDismissAnimation: 'glow',
                buttons: {
                    tryAgain: {
                        text: btnText,
                        action: function () {
                            Livewire.emit('changeStatus', id,status);

                        }
                    },
                    cancel: function () {}
                }
            });
         }
        </script>

        @endpush
    </x-slot>
</x-app-layout>
