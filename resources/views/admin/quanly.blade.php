<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<meta name="description" content="">
	<meta name="author" content="">

  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/1.10.19/css/dataTables.bootstrap.min.css">
  <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.5.6/css/buttons.bootstrap.min.css">

	<title>@yield('title')</title>

	  <!-- Custom fonts for this template-->
	<link href="{!! asset('admin/vendor/fontawesome-free/css/all.min.css') !!}" rel="stylesheet" type="text/css">
	<link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">

	  <!-- Custom styles for this template-->
	<link href="{!! asset('admin/css/sb-admin-2.min.css') !!}" rel="stylesheet">
	<link href="{!! asset('admin/css/style.css') !!}" rel="stylesheet">


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

 
 

	<title></title>
</head>
<body id="page-top" style="font-family: roboto !important;">
	<div id="wrapper">
		@include('admin.header')
		<div id="content-wrapper" class="d-flex flex-column">
	    	<div id="content">
	    		@include('admin.headertop')	    		
				<div class="container-fluid">
					@yield('content1')
				</div>
			</div>
		</div>		
	</div>
	 <!-- Scroll to Top Button-->
  <a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
  </a>

  	
    
	<!-- Bootstrap core JavaScript-->
  	<script src="{!! asset('admin/vendor/jquery/jquery.min.js') !!}"></script>
  	<script src="{!! asset('admin/vendor/bootstrap/js/bootstrap.bundle.min.js') !!}"></script>

  	<!-- Core plugin JavaScript-->
  	<script src="{!! asset('admin/vendor/jquery-easing/jquery.easing.min.js') !!}"></script>

  	<!-- Custom scripts for all pages-->
  	<script src="{!! asset('admin/js/sb-admin-2.min.js') !!}"></script>

 	<!-- Page level plugins -->
  	<script src="{!! asset('admin/vendor/chart.js/Chart.min.js') !!}"></script>

  	<!-- Page level custom scripts -->
	  <script src="{!! asset('admin/js/demo/chart-area-demo.js') !!}"></script>
	  <script src="{!! asset('admin/js/demo/chart-pie-demo.js') !!}"></script>
  
</body>



<script src="https://code.jquery.com/jquery-3.3.1.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/1.10.19/js/dataTables.bootstrap.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/dataTables.buttons.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.bootstrap.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.print.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.5.6/js/buttons.colVis.min.js"></script>


<script>
    $(document).ready(function() {
        var table = $('#example').DataTable( {
            lengthChange: false,
            buttons: [ 'copy', 'excel', 'pdf', 'colvis' ]
        } );

        table.buttons().container()
            .appendTo( '#example_wrapper .col-sm-6:eq(0)' );
    } );

</script>

</html>