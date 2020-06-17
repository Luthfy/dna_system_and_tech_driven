@extends("adminlte::page")

@section('load_css')
<link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.0.3/css/buttons.dataTables.min.css">
<style>
    .nav-sidebar .nav-header {
        padding: .5rem !important;
    }
</style>
@stop

@section('js')

    {{--    <script> console.log('Hi!'); </script>--}}
    
    <script src="https://cdn.datatables.net/buttons/1.0.3/js/dataTables.buttons.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
    <script src="{{ asset('/vendor/datatables/buttons.server-side.js') }}"></script>

    @yield('js_datatables')

@stop


