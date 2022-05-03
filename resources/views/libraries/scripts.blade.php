@livewireScripts
<script>
    var hostUrl = "assets/";

</script>
<!--begin::Global Javascript Bundle(used by all pages)-->
<script src="{{ asset('plugins/global/plugins.bundle.js') }}"></script>
<script src="{{ asset('js/scripts.bundle.js') }}"></script>
<!--end::Global Javascript Bundle-->
<!--begin::Page Vendors Javascript(used by this page)-->
<script src="{{ asset('plugins/custom/fullcalendar/fullcalendar.bundle.js') }}"></script>
<script src="{{ asset('plugins/custom/datatables/datatables.bundle.js') }}"></script>
<!--end::Page Vendors Javascript-->
<!--begin::Page Custom Javascript(used by this page)-->
<script src="{{ asset('js/custom/widgets.js') }}"></script>
<script src="{{ asset('js/custom/apps/chat/chat.js') }}"></script>
<script src="{{ asset('js/custom/modals/users-search.js') }}"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.2/jquery-confirm.min.js"></script>
<!-- select2 js-->
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Dropify/0.2.2/js/dropify.js"></script>
<script src="https://cdn.ckeditor.com/4.14.0/standard/ckeditor.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-datetimepicker/2.5.20/jquery.datetimepicker.full.js">
</script>
<script>
    $(document).ready(function () {
        $(".alert-dismissible").delay(5000).slideUp(300);
    });

    function alertDanger(msg) {
        $.toast({
            heading: 'Oops',
            text: msg,
            icon: 'error',
            loader: true,
            loaderBg: '#fff',
            showHideTransition: 'slide',
            hideAfter: 6000,
            position: 'bottom-right',
        })
    }

    function alertSuccess(msg) {
        $.toast({
            heading: 'Success',
            text: msg,
            icon: 'success',
            loader: true,
            loaderBg: '#fff',
            showHideTransition: 'slide',
            hideAfter: 6000,
            allowToastClose: false,
            position: 'bottom-center',
        })
    }
     // alerts
     window.addEventListener('live-alert', event => {
        switch (event.detail.type) {
            case "success":
                alertSuccess(event.detail.msg);
                break;
            case "danger":
                alertDanger(event.detail.msg);
                break;
            case "warning":
                alertWarning(event.detail.msg);
                break;
            case "info":
                alertInfo(event.detail.msg);
                break;
        }
    });


    function acceptQuotation(id,title = "Do You Want To Change Status!", btnText = "Yes, Change Status ", msg =
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
                        Livewire.emit('acceptQuotation', id);

                    }
                },
                cancel: function () {}
            }
        });
    }
    function rejectQuotation(id,title = "Do You Want To Change Status!", btnText = "Yes, Change Status ", msg =
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
                        Livewire.emit('rejectQuotation', id);

                    }
                },
                cancel: function () {}
            }
        });
    }

</script>
@stack('scripts')
