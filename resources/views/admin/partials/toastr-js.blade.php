<link rel="stylesheet" href="{{asset('assets/plugins/toastr/toastr.min.css')}}">

<script src="{{asset('assets/plugins/toastr/toastr.min.js')}}"></script>

<script type="text/javascript">
    toastr.options = {
        "closeButton": false,
        "debug": false,
        "positionClass": "toast-top-right",
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "5000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "swing",
        "showMethod": "slideDown",
        "hideMethod": "fadeOut"
    };

    @if(Session::has('app_info'))
        toastr.success("{{ Session::get('app_info') }}", "Message");
    @endif

    @if(Session::has('app_message'))
        toastr.success("{{ Session::get('app_message') }}", "Message");
    @endif

    @if(Session::has('app_warning'))
        toastr.success("{{ Session::get('app_warning') }}", "Message");
    @endif

    @if(Session::has('app_error'))
        toastr.success("{{ Session::get('app_error') }}", "Message");
    @endif
</script>
