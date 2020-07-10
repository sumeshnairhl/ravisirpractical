<!DOCTYPE html>
<html>
<head>
	<title>Blog Main Layout</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
	  <link rel="stylesheet" href="https://code.jquery.com/ui/1.12.1/themes/base/jquery-ui.css">
	  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">

</head>
<body>
	<div class="jumbotron text-center">
	  <h1>My Blog System </h1>
	</div>
	  
	<div class="container">
	    @yield('content')
	</div>
	 <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
	  <script src="https://code.jquery.com/ui/1.12.1/jquery-ui.js"></script>

	  <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>

	  <style type="text/css">
	  		#blogstbl_filter{display: none}
	  </style>
	  <script type="text/javascript">

	  	$(document).ready(function(){


	  		   //var blogdate=$('#blogstbl').dataTable();
	  		   	 var blogdate=jQuery('#blogstbl').DataTable( {
         paging: true,
        responsive: true,
         "lengthMenu": [[50, 100, 500, -1], [50, 100, 500, "All"]],
    "scrollX": true,
    
         
    } );


	  		   $(".datepicker").datepicker({ dateFormat: 'dd/mm/yy'});
	  		   
	  		 $('.datepicker').change(function(){

	  		 	 var getvalusr=$(this).val();
			    	alert(getvalusr);
			    
			      blogdate.columns(1).search('').draw();
				    if(getvalusr!=" "){
			           blogdate.columns(1).search(getvalusr).draw();

				   }
	  		 });
				


	  	});
	  </script>
</body>
</html>