$("#btn-search").click(function(){
	var WITEL 	= $('#witel').val();
    var F_COOR 	= $('#f_coor').val();
    var F_LOC 	= $('#f_loc').val();
    var F_OLT 	= $('#f_olt').val();
    console.log(WITEL+ "-"+F_COOR+ "-"+F_LOC+ "-"+F_OLT);

	$("#example1").DataTable().destroy();

	$(document).ready(function(){
		$("#example1").DataTable({
			"processing" : true,
			"serverSide" : true,
			oLanguage: {
				sProcessing: "<img id='min' src='ajax-loader.gif'>"
			},
			"ajax" : {
				"url"	: 'library/filter-odp.php',
				"data"	: {
					WITEL: WITEL, F_COOR: F_COOR, F_LOC: F_LOC, F_OLT: F_OLT
				}
			}
		});
		$("#example1").closest("div .col-sm-12").css("overflow-x", "auto");
	});
});