$(document).ready(function(){
   $('#dashboard,#worktable').DataTable({
	   	"pageLength": 25,
	    "lengthChange": true,
	    "paging": true,
	    "searching": true,
	    "ordering": true,
	    "info": true,
	    "autoWidth": false,
	    "responsive": true,
   });
    $('#reports').DataTable({
	    "lengthChange": false,
	    "paging": false,
	    "searching": false,
	    "ordering": false,
	    "info": false,
	    "autoWidth": false,
	    "responsive": false,
   });

    $('#topit').DataTable({
	    "lengthChange": false,
	    "paging": false,
	    "searching": false,
	    "ordering": false,
	    "info": false,
	    "autoWidth": false,
	    "responsive": false,
   });
});