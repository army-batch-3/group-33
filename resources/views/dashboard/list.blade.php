
@extends('layouts.mainlayout')

@section('content_css')
<link rel="stylesheet" href="{{ URL::asset('editor/DataTables-1.10.20/css/jquery.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('editor/Responsive-2.2.3/css/responsive.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('editor/Buttons-1.6.1/css/buttons.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('editor/Editor-1.9.2/css/editor.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('editor/Select-1.3.1/css/select.dataTables.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('editor/DataTables-1.10.20/css/dataTables.bootstrap4.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets-light/plugin/datepicker/css/bootstrap-datepicker.min.css') }}">
<link rel="stylesheet" href="{{ URL::asset('assets-light/plugin/daterangepicker/daterangepicker.css') }}">




@endsection

@section('content')

<div class="container" style="width:100%">
      <div class="col-xs-12">
          <div class="box-content">

          </div>
      </div>
   </div>



@endsection



@section('content_script')
<script src="{{ URL::asset('editor/DataTables-1.10.20/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::asset('editor/Responsive-2.2.3/js/dataTables.responsive.min.js') }}"></script>
<script src="{{ URL::asset('editor/Editor-1.9.2/js/dataTables.editor.min.js') }}"></script>
<script src="{{ URL::asset('vendor/datatables/buttons.server-side.js') }}"></script>
<script src="{{ URL::asset('editor/Buttons-1.6.1/js/dataTables.buttons.min.js') }}"></script>
<script src="{{ URL::asset('editor/Select-1.3.1/js/dataTables.select.min.js') }}"></script>

@endsection
