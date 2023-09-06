<!DOCTYPE html>
<html lang="en">
   <head>
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width,initial-scale=1,user-scalable=0,minimal-ui">
		<!-- CSRF Token -->
		<meta name="csrf-token" content="{{ csrf_token() }}">
		
		<title>@yield('title') | {{ config('app.name', 'Laravel') }}</title>
		<meta content="Admin Dashboard" name="description">
		<meta content="Themesbrand" name="author">
		<link rel="shortcut icon" href="{{ asset('assets/images/favicon.png') }}">
		<link href="https://fonts.googleapis.com/css2?family=Lato:wght@400;700&display=swap" rel="stylesheet">
		<!-- DataTables -->
		<link href="{{ asset('plugins/datatables/dataTables.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('plugins/datatables/buttons.bootstrap4.min.css') }}" rel="stylesheet" type="text/css">
		
		<link href="{{ asset('assets/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/css/metismenu.min.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/css/icons.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/css/style.css') }}" rel="stylesheet" type="text/css">
		<link href="{{ asset('assets/css/custom.css') }}" rel="stylesheet" type="text/css">

		<script src="{{ asset('assets/js/jquery.min.js') }}"></script>

		<!-- /*************** Form Validation **************/ -->
		<link href="{{ asset('plugins/jqueryValidation/css/cmxform.css') }}" rel="stylesheet" type="text/css">

		@if((isset($data['slug'])) && ($data['slug'] == 'dashboard'))
		<!-- <link href="{{ asset('assets/css/hicharts_css.css') }}" rel="stylesheet" type="text/css">
		<script src="{{ asset('plugins/highcharts/highcharts.js') }}"></script>
		<script src="{{ asset('plugins/highcharts/modules/data.js') }}"></script>
		<script src="{{ asset('plugins/highcharts/modules/exporting.js') }}"></script>
		<script src="{{ asset('plugins/highcharts/modules/export-data.js') }}"></script>
		<script src="{{ asset('plugins/highcharts/modules/accessibility.js') }}"></script>	 -->
      	@endif
   </head>
   <body>
		<!-- Begin page -->
		<div id="wrapper">
			<!-- Top Bar Start -->
			@include('templates.partials.header')
			<!-- Top Bar End -->
			<!-- ========== Left Sidebar Start ========== -->
			@include('templates.partials.sidebar')
			<!-- Left Sidebar End -->
			<!-- Start right Content here -->		 
			<div class="content-page">
				<!-- Start content -->
				@yield('content')
				<!-- content -->
				@include('templates.partials.footer')
			</div>
			<!-- ============================================================== --><!-- End Right content here --><!-- ============================================================== -->
		</div>
		<!-- END wrapper -->
		<!-- jQuery  -->
		
		<script src="{{ asset('assets/js/bootstrap.bundle.min.js') }}"></script>
		<script src="{{ asset('assets/js/metisMenu.min.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.slimscroll.js') }}"></script>
		<script src="{{ asset('assets/js/waves.min.js') }}"></script>
		
		@if((isset($data['slug'])) && ($data['slug'] != 'dashboard'))
			<!-- Required datatable js -->
			<script src="{{ asset('plugins/datatables/jquery.dataTables.min.js') }}"></script>
			<script src="{{ asset('plugins/datatables/dataTables.bootstrap4.min.js') }}"></script>
			<!-- Datatable init js -->
			<script src="{{ asset('assets/pages/datatables.init.js') }}"></script>
			<script>
				$('#customFile , #customFile2').on('change',function(){
					//get the file name
					var fileName = $(this).val();
					//replace the "Choose a file" label
					$(this).next('.custom-file-label').html(fileName);
				})
			</script>
		@endif
		<!-- /*************** Form Validation **************/ -->
		<script src="{{ asset('plugins/jqueryValidation/js/jquery.validate.js') }}"></script>

		<script src="{{ asset('plugins/bootstrap-maxlength/bootstrap-maxlength.js') }}"></script>
		<script src="{{ asset('assets/js/jquery.inputmask.bundle.js') }}"></script>
		@if((isset($data['slug'])) && ($data['slug'] == 'roles'))
			<script src="{{ asset('plugins/indeterminateCheckbox/indeterminateCheckbox.js') }}"></script>
		@endif
		<!-- App js -->	  
		<script src="{{ asset('assets/js/app.js') }}"></script>
		<script src="{{ asset('assets/js/scripts.js') }}"></script>
   </body>
</html>