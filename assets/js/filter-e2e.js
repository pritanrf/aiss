$("#btn-search").click(function(){
	var CONNECT2OLT 	= $('#connect2olt').val();
	var NOTCONNECT2OLT 	= $('#notconnect2olt').val();

	$("#example1").DataTable().destroy();

	$(document).ready(function(){
		$("#example1").DataTable({
			"processing" : true,
			"serverSide" : true,
			oLanguage: {
				sProcessing: "<img id='min' src='ajax-loader.gif'>"
			},
			"ajax" : {
				"url"	: 'library/filter-e2e.php',
				"data"	: {
					CONNECT2OLT: CONNECT2OLT, NOTCONNECT2OLT: NOTCONNECT2OLT
				}
			}
		});
		$("#example1").closest("div .col-sm-12").css("overflow-x", "auto");
	});
});