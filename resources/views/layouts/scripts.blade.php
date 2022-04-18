<!-- jQuery -->
<script src="{{asset('assets1/plugins/jquery/jquery.min.js')}}"></script>
@include('includes.appJS')
<script>
    $("#alert").fadeTo(2000, 500).slideUp(500, function(){
    $("#alert").slideUp(500);
});
</script>
<script src="{{asset('assets1/plugins/select2/js/select2.full.min.js')}}"></script>
<!-- Bootstrap 4 -->
<script src="{{asset('assets1/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{asset('assets1/dist/js/adminlte.min.js')}}"></script>
@yield('scripts')
