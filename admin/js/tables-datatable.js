$(document).ready(function() {

    /* =================================================================
        Default Table
    ================================================================= */

    $('#table-1').DataTable();
      
    /* =================================================================
       Exporting Table Data
    ================================================================= */

    $('#table-2').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copyHtml5',
            'excelHtml5',
            'csvHtml5',
            'pdfHtml5',
            'print',
            'colvis'
            
            
            
        ]
    } );
    
    var table2 = $table2.DataTable( {
        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );


	 $('#s_i_l').DataTable( {
        dom: 'Bfrtip',
		"bPaginate": false,
        buttons: [
            { extend: 'copyHtml5', footer: true },
            { extend: 'excelHtml5', footer: true },
            { extend: 'csvHtml5', footer: true },
            { extend: 'pdfHtml5', footer: true },
			{ extend: 'print', footer: true }
        ]
    } ); 
    
    
// to show columns button

$('#table-2').DataTable( {
    buttons: [
        {
            extend: 'columnVisibility',
            text: 'Show all',
            visibility: true
        },
        {
            extend: 'columnVisibility',
            text: 'Hide all',
            visibility: false
        }
    ]
} );

$('#s_i_l').DataTable( {
    dom: 'Bfrtip',
    "bPaginate": false,
    buttons: [
        {
            extend: 'columnVisibility',
            text: 'Show secondary',
            visibility: true,
            columns: '.secondary'
        },
        {
            extend: 'columnVisibility',
            text: 'Hide secondary',
            visibility: false,
            columns: '.secondary'
        }
    ]
});






	
    /* =================================================================
       Table with Column Filtering
    ================================================================= */

    var $table3 = jQuery("#table-3");
    
    var table3 = $table3.DataTable( {
        "aLengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]]
    } );
    
    // Setup - add a text input to each footer cell
    $( '#table-3 tfoot th' ).each( function () {
        var title = $('#table-3 thead th').eq( $(this).index() ).text();
        $(this).html( '<input type="text" class="form-control" placeholder="Search ' + title + '" />' );
    } );
    
    // Apply the search
    table3.columns().every( function () {
        var that = this;
        $( 'input', this.footer() ).on( 'keyup change', function () {
            if ( that.search() !== this.value ) {
                that
                    .search( this.value )
                    .draw();
            }
        } );
    } );

});

